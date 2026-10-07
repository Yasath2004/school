<?php
namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Intake;
use App\Models\Teacher;
use App\Models\GalleryAlbum;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(string $lang = 'en')
    {
        $this->setLocale($lang);
        $upcomingEvents = Event::published()->ofType('event')->upcoming()->take(3)->get();
        $openIntakes = Intake::open()->get();
        $teachers = Teacher::visible()->take(4)->get();
        $albums = GalleryAlbum::visible()->with(['images' => fn($q) => $q->limit(1)])->take(6)->get();
        return view('home.index', compact('upcomingEvents', 'openIntakes', 'teachers', 'albums', 'lang'));
    }

    private function setLocale(string $lang): void
    {
        $allowed = ['en', 'si'];
        app()->setLocale(in_array($lang, $allowed) ? $lang : 'en');
    }
}
