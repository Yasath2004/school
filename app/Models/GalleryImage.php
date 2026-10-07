<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $fillable = ['gallery_album_id', 'image_path', 'caption_en', 'caption_si', 'sort_order'];

    public function album()
    {
        return $this->belongsTo(GalleryAlbum::class, 'gallery_album_id');
    }

    public function caption(): string
    {
        return app()->getLocale() === 'si' && $this->caption_si ? $this->caption_si : $this->caption_en ?? '';
    }
}
