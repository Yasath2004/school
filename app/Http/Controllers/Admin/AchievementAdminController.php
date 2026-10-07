<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class AchievementAdminController extends Controller
{
    public function index()
    {
        $achievements = Event::where('type', 'achievement')->latest()->paginate(15);
        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_si' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_si' => 'nullable|string',
            'event_date' => 'nullable|date',
            'status' => 'required|in:draft,published,archived',
        ]);
        $data['type'] = 'achievement';

        Event::create($data);
        return redirect()->route('admin.achievements.index')->with('success', 'Achievement recorded.');
    }

    public function edit(Event $event)
    {
        return view('admin.achievements.edit', ['achievement' => $event]);
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_si' => 'nullable|string|max:255',
            'description_en' => 'nullable|string',
            'description_si' => 'nullable|string',
            'event_date' => 'nullable|date',
            'status' => 'required|in:draft,published,archived',
        ]);

        $event->update($data);
        return redirect()->route('admin.achievements.index')->with('success', 'Achievement updated.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.achievements.index')->with('success', 'Achievement removed.');
    }
}
