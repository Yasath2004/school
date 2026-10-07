<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherAdminController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('sort_order')->paginate(20);
        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('admin.teachers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role_en' => 'required|string|max:255',
            'role_si' => 'nullable|string|max:255',
            'section' => 'required|in:international,preschool,both',
            'subject_en' => 'nullable|string|max:255',
            'qualifications_en' => 'nullable|string',
            'bio_en' => 'nullable|string',
            'bio_si' => 'nullable|string',
            'photo' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);
        $data['is_visible'] = $request->has('is_visible');

        Teacher::create($data);
        return redirect()->route('admin.teachers.index')->with('success', 'Teacher profile created.');
    }

    public function edit(Teacher $teacher)
    {
        return view('admin.teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role_en' => 'required|string|max:255',
            'role_si' => 'nullable|string|max:255',
            'section' => 'required|in:international,preschool,both',
            'subject_en' => 'nullable|string|max:255',
            'qualifications_en' => 'nullable|string',
            'bio_en' => 'nullable|string',
            'bio_si' => 'nullable|string',
            'photo' => 'nullable|string',
            'sort_order' => 'nullable|integer',
        ]);
        $data['is_visible'] = $request->has('is_visible');

        $teacher->update($data);
        return redirect()->route('admin.teachers.index')->with('success', 'Teacher updated.');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('admin.teachers.index')->with('success', 'Teacher removed.');
    }

    public function toggle(Teacher $teacher)
    {
        $teacher->update(['is_visible' => !$teacher->is_visible]);
        return back()->with('success', 'Visibility status updated.');
    }
}
