<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use Illuminate\Http\Request;

class CaseStudyPageController extends Controller
{
    /**
     * Display the case study page with all case studies
     */
    public function index()
    {
        // Fetch all case studies
        $caseStudies = CaseStudy::latest()->get();

        return view('case-study', compact('caseStudies'));
    }
}

