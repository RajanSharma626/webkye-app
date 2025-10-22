<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'contact_phone',
        'contact_email',
        'logo',
        'footer_logo',
        'favicon',
        'location_url',
        'facebook_url',
        'linkedin_url',
        'instagram_url',
        'address',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image'
    ];
}