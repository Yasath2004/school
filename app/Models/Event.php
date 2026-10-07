<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title_en', 'title_si', 'description_en', 'description_si',
        'type', 'event_date', 'location_en', 'location_si',
        'image', 'status', 'sort_order',
    ];

    protected $casts = ['event_date' => 'datetime'];

    public function title(): string
    {
        return app()->getLocale() === 'si' && $this->title_si ? $this->title_si : $this->title_en;
    }

    public function description(): string
    {
        return app()->getLocale() === 'si' && $this->description_si ? $this->description_si : $this->description_en ?? '';
    }

    public function location(): string
    {
        return app()->getLocale() === 'si' && $this->location_si ? $this->location_si : $this->location_en ?? '';
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published')->orderBy('event_date', 'desc');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('status', 'published')
            ->where('event_date', '>=', now())
            ->orderBy('event_date', 'asc');
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }
}
