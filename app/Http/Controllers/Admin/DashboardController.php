<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Intake;
use App\Models\Teacher;
use App\Models\Event;
use App\Models\GalleryAlbum;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'new_enquiries'  => ContactMessage::where('status', 'new')->count(),
            'total_enquiries'=> ContactMessage::count(),
            'open_intakes'   => Intake::where('status', 'open')->count(),
            'teachers'       => Teacher::where('is_visible', true)->count(),
            'events'         => Event::where('status', 'published')->count(),
            'albums'         => GalleryAlbum::where('is_visible', true)->count(),
        ];

        $recentEnquiries = ContactMessage::latest()->take(8)->get();
        $upcomingEvents  = Event::where('status', 'published')
            ->where('event_date', '>=', now())
            ->orderBy('event_date')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentEnquiries', 'upcomingEvents'));
    }
}
