<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'star',
        'title',
        'comment',
        'profile',
        'name',
        'designation',
        'is_active',
        'position',
    ];
}
