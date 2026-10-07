<?php
namespace App\Http\Controllers;
use App\Models\Intake;
use App\Models\ContactMessage;
use App\Models\DownloadableDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class AdmissionController extends Controller
{
    public function index(string $lang = 'en')
    {
        app()->setLocale(in_array($lang, ['en','si']) ? $lang : 'en');
        $intakes = Intake::public()->get();
        $documents = DownloadableDocument::visible()->get();
        return view('admissions.index', compact('intakes', 'documents', 'lang'));
    }

    public function submit(Request $request, string $lang = 'en')
    {
        app()->setLocale(in_array($lang, ['en','si']) ? $lang : 'en');

        // Rate limit
        $key = 'enquiry.' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 3)) {
            return back()->withErrors(['rate' => 'Too many submissions. Please try again later.']);
        }
        RateLimiter::hit($key, 3600);

        $validated = $request->validate([
            'parent_name'    => 'required|string|max:120',
            'contact_number' => 'required|string|max:30',
            'email'          => 'nullable|email|max:120',
            'school_section' => 'required|in:international,preschool',
            'preferred_grade'=> 'nullable|string|max:80',
            'message'        => 'nullable|string|max:1000',
            'honeypot'       => 'max:0', // spam trap
        ]);

        ContactMessage::create([
            'parent_name'    => $validated['parent_name'],
            'contact_number' => $validated['contact_number'],
            'email'          => $validated['email'] ?? null,
            'school_section' => $validated['school_section'],
            'preferred_grade'=> $validated['preferred_grade'] ?? null,
            'message'        => $validated['message'] ?? null,
            'lang'           => $lang,
            'status'         => 'new',
            'ip_address'     => $request->ip(),
        ]);

        return redirect()->route('admissions', ['lang' => $lang])
            ->with('enquiry_success', true);
    }
}
