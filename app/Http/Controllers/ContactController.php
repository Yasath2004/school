<?php
namespace App\Http\Controllers;
use App\Models\Faq;

class ContactController extends Controller
{
    public function index(string $lang = 'en')
    {
        app()->setLocale(in_array($lang, ['en','si']) ? $lang : 'en');
        $faqs = Faq::visible()->get()->groupBy('category');
        return view('contact.index', compact('faqs', 'lang'));
    }
}
