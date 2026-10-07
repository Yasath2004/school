<?php
namespace App\Http\Controllers;
use App\Models\Event;

class EventController extends Controller
{
    public function index(string $lang = 'en')
    {
        app()->setLocale(in_array($lang, ['en','si']) ? $lang : 'en');
        $events       = Event::published()->ofType('event')->upcoming()->paginate(9);
        $news         = Event::published()->ofType('news')->latest('event_date')->take(6)->get();
        $achievements = Event::published()->ofType('achievement')->latest('event_date')->take(6)->get();
        return view('events.index', compact('events', 'news', 'achievements', 'lang'));
    }
}
