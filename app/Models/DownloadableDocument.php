<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadableDocument extends Model
{
    protected $fillable = [
        'title_en', 'title_si', 'description_en', 'description_si',
        'file_path', 'file_type', 'category', 'sort_order', 'is_visible',
    ];

    protected $casts = ['is_visible' => 'boolean'];

    public function title(): string
    {
        return app()->getLocale() === 'si' && $this->title_si ? $this->title_si : $this->title_en;
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true)->orderBy('sort_order');
    }
}
