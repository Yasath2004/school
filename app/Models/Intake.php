<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intake extends Model
{
    protected $fillable = [
        'title_en', 'title_si', 'description_en', 'description_si',
        'section', 'grades_ages_en', 'grades_ages_si',
        'application_open_date', 'application_close_date', 'intake_start_date',
        'academic_year', 'status', 'sort_order',
    ];

    protected $casts = [
        'application_open_date' => 'date',
        'application_close_date' => 'date',
        'intake_start_date' => 'date',
    ];

    public function title(): string
    {
        return app()->getLocale() === 'si' && $this->title_si ? $this->title_si : $this->title_en;
    }

    public function description(): string
    {
        return app()->getLocale() === 'si' && $this->description_si ? $this->description_si : $this->description_en ?? '';
    }

    public function scopePublic($query)
    {
        return $query->whereIn('status', ['open', 'closed'])->orderBy('sort_order');
    }

    public function scopeOpen($query)
    {
        return $query->where('status', 'open');
    }
}
