<?php
namespace App\Http\Controllers;
use App\Models\GalleryAlbum;

class GalleryController extends Controller
{
    public function index(string $lang = 'en')
    {
        app()->setLocale(in_array($lang, ['en','si']) ? $lang : 'en');
        $albums = GalleryAlbum::visible()->with('images')->get();
        $categories = $albums->pluck('category')->unique()->values();
        return view('gallery.index', compact('albums', 'categories', 'lang'));
    }
}
