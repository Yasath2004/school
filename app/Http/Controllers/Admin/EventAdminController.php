<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventAdminController extends Controller
{
    public function index()
    {
        $events = Event::latest('event_date')->paginate(15);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_si' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_si' => 'nullable|string',
            'type' => 'required|in:event,news,achievement',
            'event_date' => 'nullable|date',
            'location_en' => 'nullable|string|max:255',
            'location_si' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
        ]);

        Event::create($data);
        return redirect()->route('admin.events.index')->with('success', 'Event/Post created.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_si' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_si' => 'nullable|string',
            'type' => 'required|in:event,news,achievement',
            'event_date' => 'nullable|date',
            'location_en' => 'nullable|string|max:255',
            'location_si' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
        ]);

        $event->update($data);
        return redirect()->route('admin.events.index')->with('success', 'Event/Post updated.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted.');
    }
}
