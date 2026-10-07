<?php
namespace App\Http\Controllers;

class InternationalSchoolController extends Controller
{
    public function index(string $lang = 'en')
    {
        app()->setLocale(in_array($lang, ['en','si']) ? $lang : 'en');
        return view('international-school.index', compact('lang'));
    }
}
