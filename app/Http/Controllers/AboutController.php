<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(string $lang = 'en')
    {
        app()->setLocale(in_array($lang, ['en','si']) ? $lang : 'en');
        return view('about.index', compact('lang'));
    }
}
