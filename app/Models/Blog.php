<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'tags',
        'cover_image',
        'banner',
        'content',
        'meta_title',
        'meta_description',
        'meta_keywords'
    ];
}
