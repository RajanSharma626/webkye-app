<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'short_description',
        'detail',
        'banner',
        'icon',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (self $service) {
            $service->slug = Str::slug($service->title);
        });

        static::updating(function (self $service) {
            if ($service->isDirty('title')) {
                $service->slug = Str::slug($service->title);
            }
        });
    }
}
