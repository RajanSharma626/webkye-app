<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use Illuminate\View\View;

class CaseStudyPageController extends Controller
{
    /**
     * Display the case study page with all case studies
     */
    public function index(): View
    {
        $caseStudies = CaseStudy::latest()->get();

        return view('case-study', compact('caseStudies'));
    }

    /**
     * Display a single case study detail page.
     */
    public function show(CaseStudy $caseStudy): View
    {
        $caseStudy->load(['testimonials' => function ($query) {
            $query->where('is_active', true)
                ->orderBy('position')
                ->orderByDesc('created_at');
        }]);

        $otherCaseStudies = CaseStudy::where('id', '!=', $caseStudy->id)
            ->latest()
            ->take(2)
            ->get();

        return view('case-study-details', compact('caseStudy', 'otherCaseStudies'));
    }
}

