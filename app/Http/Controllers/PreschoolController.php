<?php
namespace App\Http\Controllers;

class PreschoolController extends Controller
{
    public function index(string $lang = 'en')
    {
        app()->setLocale(in_array($lang, ['en','si']) ? $lang : 'en');
        return view('preschool.index', compact('lang'));
    }
}
