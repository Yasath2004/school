<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Intake;
use Illuminate\Http\Request;

class IntakeAdminController extends Controller
{
    public function index()
    {
        $intakes = Intake::orderBy('sort_order')->orderByDesc('created_at')->get();
        return view('admin.intakes.index', compact('intakes'));
    }

    public function create()
    {
        return view('admin.intakes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_en'              => 'required|string|max:200',
            'title_si'              => 'nullable|string|max:200',
            'description_en'        => 'nullable|string',
            'description_si'        => 'nullable|string',
            'section'               => 'required|in:international,preschool,both',
            'grades_ages_en'        => 'nullable|string|max:200',
            'grades_ages_si'        => 'nullable|string|max:200',
            'application_open_date' => 'nullable|date',
            'application_close_date'=> 'nullable|date',
            'intake_start_date'     => 'nullable|date',
            'academic_year'         => 'nullable|string|max:20',
            'status'                => 'required|in:open,closed,hidden',
            'sort_order'            => 'nullable|integer',
        ]);
        Intake::create($data);
        return redirect()->route('admin.intakes.index')->with('success', 'Intake created.');
    }

    public function edit(Intake $intake)
    {
        return view('admin.intakes.edit', compact('intake'));
    }

    public function update(Request $request, Intake $intake)
    {
        $data = $request->validate([
            'title_en'              => 'required|string|max:200',
            'title_si'              => 'nullable|string|max:200',
            'description_en'        => 'nullable|string',
            'description_si'        => 'nullable|string',
            'section'               => 'required|in:international,preschool,both',
            'grades_ages_en'        => 'nullable|string|max:200',
            'grades_ages_si'        => 'nullable|string|max:200',
            'application_open_date' => 'nullable|date',
            'application_close_date'=> 'nullable|date',
            'intake_start_date'     => 'nullable|date',
            'academic_year'         => 'nullable|string|max:20',
            'status'                => 'required|in:open,closed,hidden',
            'sort_order'            => 'nullable|integer',
        ]);
        $intake->update($data);
        return redirect()->route('admin.intakes.index')->with('success', 'Intake updated.');
    }

    public function destroy(Intake $intake)
    {
        $intake->delete();
        return redirect()->route('admin.intakes.index')->with('success', 'Intake deleted.');
    }

    public function updateStatus(Request $request, Intake $intake)
    {
        $intake->update(['status' => $request->status]);
        return back()->with('success', 'Status updated.');
    }
}
