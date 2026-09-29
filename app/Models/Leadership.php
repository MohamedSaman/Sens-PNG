<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leadership extends Model
{
    protected $table = 'leaderships';

    protected $fillable = [
        'name',
        'role_title',
        'bio',
        'experience_summary',
        'quote',
        'photo',
        'linkedin_url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
