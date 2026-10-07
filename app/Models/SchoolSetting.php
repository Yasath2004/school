<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolSetting extends Model
{
    protected $fillable = ['key', 'value_en', 'value_si', 'type'];

    public static function get(string $key, string $lang = 'en'): ?string
    {
        $col = 'value_' . $lang;
        $record = static::where('key', $key)->first();
        return $record ? $record->$col : null;
    }

    public static function set(string $key, string $valueEn, ?string $valueSi = null, string $type = 'text'): void
    {
        static::updateOrCreate(
            ['key' => $key],
            ['value_en' => $valueEn, 'value_si' => $valueSi, 'type' => $type]
        );
    }
}
