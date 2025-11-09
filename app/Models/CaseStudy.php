<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class CaseStudy extends Model
{
    protected $fillable = [
        'title',
        'slug',
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

    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $caseStudy) {
            $caseStudy->slug = Str::slug($caseStudy->title);
        });

        static::updating(function (self $caseStudy) {
            if ($caseStudy->isDirty('title')) {
                $caseStudy->slug = Str::slug($caseStudy->title);
            }
        });
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
