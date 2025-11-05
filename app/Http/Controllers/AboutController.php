<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display the about page with testimonials
     */
    public function index()
    {
        // Fetch active testimonials
        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('position', 'asc')
            ->get();

        return view('about', compact('testimonials'));
    }
}

