<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = ContactMessage::latest()->paginate(20);
        $newCount  = ContactMessage::where('status', 'new')->count();
        return view('admin.enquiries.index', compact('enquiries', 'newCount'));
    }

    public function show(ContactMessage $enquiry)
    {
        // Auto-mark as viewed (keep status, just noting it was seen)
        return view('admin.enquiries.show', compact('enquiry'));
    }

    public function update(Request $request, ContactMessage $enquiry)
    {
        $validated = $request->validate([
            'status'         => 'required|in:new,contacted,closed',
            'internal_notes' => 'nullable|string|max:2000',
        ]);
        $enquiry->update($validated);
        return back()->with('success', 'Enquiry updated.');
    }

    public function updateStatus(Request $request, ContactMessage $enquiry)
    {
        $enquiry->update(['status' => $request->status]);
        return back()->with('success', 'Status updated.');
    }
}
