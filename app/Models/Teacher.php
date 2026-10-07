<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'name', 'role_en', 'role_si', 'section',
        'subject_en', 'subject_si',
        'qualifications_en', 'qualifications_si',
        'bio_en', 'bio_si',
        'photo', 'sort_order', 'is_visible',
    ];

    protected $casts = ['is_visible' => 'boolean'];

    public function role(): string
    {
        return app()->getLocale() === 'si' && $this->role_si ? $this->role_si : $this->role_en;
    }

    public function bio(): string
    {
        return app()->getLocale() === 'si' && $this->bio_si ? $this->bio_si : $this->bio_en ?? '';
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true)->orderBy('sort_order');
    }
}
