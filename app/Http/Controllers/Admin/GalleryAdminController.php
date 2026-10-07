<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryAlbum;
use App\Models\GalleryImage;
use Illuminate\Http\Request;

class GalleryAdminController extends Controller
{
    public function index()
    {
        $albums = GalleryAlbum::withCount('images')->latest()->paginate(15);
        return view('admin.gallery.index', compact('albums'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_si' => 'nullable|string|max:255',
            'category' => 'required|string|max:50',
            'description_en' => 'nullable|string',
            'description_si' => 'nullable|string',
            'cover_image' => 'nullable|string',
        ]);
        $data['is_visible'] = $request->has('is_visible');

        GalleryAlbum::create($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Album created.');
    }

    public function edit(GalleryAlbum $gallery)
    {
        $gallery->load('images');
        return view('admin.gallery.edit', ['album' => $gallery]);
    }

    public function update(Request $request, GalleryAlbum $gallery)
    {
        $data = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_si' => 'nullable|string|max:255',
            'category' => 'required|string|max:50',
            'description_en' => 'nullable|string',
            'description_si' => 'nullable|string',
            'cover_image' => 'nullable|string',
        ]);
        $data['is_visible'] = $request->has('is_visible');

        $gallery->update($data);
        return redirect()->route('admin.gallery.index')->with('success', 'Album updated.');
    }

    public function destroy(GalleryAlbum $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Album deleted.');
    }

    public function uploadImages(Request $request, GalleryAlbum $album)
    {
        $request->validate([
            'image_url' => 'required|string',
            'caption_en' => 'nullable|string',
        ]);

        $album->images()->create([
            'image_path' => $request->image_url,
            'caption_en' => $request->caption_en,
        ]);

        return back()->with('success', 'Image added to album.');
    }

    public function deleteImage(GalleryAlbum $album, GalleryImage $image)
    {
        $image->delete();
        return back()->with('success', 'Image removed.');
    }
}
