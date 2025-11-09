<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'tags',
        'cover_image',
        'banner',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $blog) {
            $blog->slug = Str::slug($blog->title);
        });

        static::updating(function (self $blog) {
            if ($blog->isDirty('title')) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }
}
