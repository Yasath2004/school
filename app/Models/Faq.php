<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question_en', 'question_si', 'answer_en', 'answer_si',
        'category', 'sort_order', 'is_visible',
    ];

    protected $casts = ['is_visible' => 'boolean'];

    public function question(): string
    {
        return app()->getLocale() === 'si' && $this->question_si ? $this->question_si : $this->question_en;
    }

    public function answer(): string
    {
        return app()->getLocale() === 'si' && $this->answer_si ? $this->answer_si : $this->answer_en;
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true)->orderBy('sort_order');
    }
}
