<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\CaseStudy;
use App\Models\Testimonial;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the homepage with dynamic data
     */
    public function index()
    {
        // Fetch services (limit to 6 for homepage)
        $services = Service::get();

        // Fetch latest case studies (limit to 4 for homepage)
        $caseStudies = CaseStudy::latest()->take(4)->get();

        // Fetch active testimonials
        $testimonials = Testimonial::where('is_active', true)
            ->orderBy('position', 'asc')
            ->get();

        // Fetch latest blogs (limit to 3 for homepage)
        $blogs = Blog::latest()->take(3)->get();

        return view('home', compact('services', 'caseStudies', 'testimonials', 'blogs'));
    }
}

