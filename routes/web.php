<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\InternationalSchoolController;
use App\Http\Controllers\PreschoolController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IntakeAdminController;
use App\Http\Controllers\Admin\EventAdminController;
use App\Http\Controllers\Admin\GalleryAdminController;
use App\Http\Controllers\Admin\TeacherAdminController;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\AchievementAdminController;
use App\Http\Controllers\Admin\SettingsController;

/*
|--------------------------------------------------------------------------
| Public Routes — Bilingual (/{lang}/...)
|--------------------------------------------------------------------------
*/

// Redirect root to default locale
Route::get('/', fn() => redirect('/en'));

// Localized public routes
Route::prefix('{lang}')->where(['lang' => 'en|si'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/international-school', [InternationalSchoolController::class, 'index'])->name('international-school');
    Route::get('/preschool', [PreschoolController::class, 'index'])->name('preschool');
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');
    Route::get('/admissions', [AdmissionController::class, 'index'])->name('admissions');
    Route::post('/admissions/enquiry', [AdmissionController::class, 'submit'])->name('admissions.submit');
    Route::get('/events', [EventController::class, 'index'])->name('events');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])
    ->name('login');
Route::post('/admin/login', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

/*
|--------------------------------------------------------------------------
| Admin Routes — Protected
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->middleware(['auth'])
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // Enquiries
        Route::resource('enquiries', EnquiryController::class)->only(['index', 'show', 'update']);
        Route::patch('enquiries/{enquiry}/status', [EnquiryController::class, 'updateStatus'])->name('enquiries.status');

        // Intakes
        Route::resource('intakes', IntakeAdminController::class);
        Route::patch('intakes/{intake}/status', [IntakeAdminController::class, 'updateStatus'])->name('intakes.status');

        // Events / News / Achievements
        Route::resource('events', EventAdminController::class);

        // Gallery Albums
        Route::resource('gallery', GalleryAdminController::class);
        Route::post('gallery/{album}/images', [GalleryAdminController::class, 'uploadImages'])->name('gallery.images.upload');
        Route::delete('gallery/{album}/images/{image}', [GalleryAdminController::class, 'deleteImage'])->name('gallery.images.delete');

        // Teachers
        Route::resource('teachers', TeacherAdminController::class);
        Route::patch('teachers/{teacher}/toggle', [TeacherAdminController::class, 'toggle'])->name('teachers.toggle');

        // Achievements (shorthand to events filtered by type)
        Route::get('achievements', [AchievementAdminController::class, 'index'])->name('achievements.index');
        Route::get('achievements/create', [AchievementAdminController::class, 'create'])->name('achievements.create');
        Route::post('achievements', [AchievementAdminController::class, 'store'])->name('achievements.store');
        Route::get('achievements/{event}/edit', [AchievementAdminController::class, 'edit'])->name('achievements.edit');
        Route::put('achievements/{event}', [AchievementAdminController::class, 'update'])->name('achievements.update');
        Route::delete('achievements/{event}', [AchievementAdminController::class, 'destroy'])->name('achievements.destroy');

        // Settings
        Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
        Route::post('settings', [SettingsController::class, 'update'])->name('settings.update');
    });
