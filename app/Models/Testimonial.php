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
        'case_study_id',
    ];

    public function caseStudy()
    {
        return $this->belongsTo(CaseStudy::class);
    }
}
