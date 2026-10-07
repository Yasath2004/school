<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = [
        'parent_name', 'contact_number', 'email', 'school_section',
        'preferred_grade', 'message', 'lang', 'status', 'internal_notes', 'ip_address',
    ];

    public function getSectionLabelAttribute(): string
    {
        return match($this->school_section) {
            'international' => 'International School',
            'preschool' => 'Preschool',
            default => ucfirst($this->school_section),
        };
    }

    public function getStatusBadgeAttribute(): string
    {
        return match($this->status) {
            'new' => 'bg-blue-100 text-blue-800',
            'contacted' => 'bg-yellow-100 text-yellow-800',
            'closed' => 'bg-gray-100 text-gray-600',
            default => 'bg-gray-100 text-gray-600',
        };
    }
}
