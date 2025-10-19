<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    protected $fillable = [
        'title',
        'service',
        'start_date',
        'end_date',
        'is_ongoing',
        'project_brief',
        'banner',
        'cover_image',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_ongoing' => 'boolean'
    ];
}
