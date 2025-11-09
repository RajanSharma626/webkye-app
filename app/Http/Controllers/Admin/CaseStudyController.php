<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CaseStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $caseStudies = CaseStudy::latest()->get();
        return view('admin.case-studies.index', compact('caseStudies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.case-studies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:case_studies,title'],
            'service' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'is_ongoing' => ['nullable', 'boolean'],
            'project_brief' => ['required', 'string'],
            'banner' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
        ]);

        // Handle ongoing case
        if ($request->has('is_ongoing')) {
            $validated['is_ongoing'] = true;
            $validated['end_date'] = null;
        } else {
            $validated['is_ongoing'] = false;
        }
        
        // Handle banner image upload
        if ($request->hasFile('banner')) {
            $bannerFile = $request->file('banner');
            $bannerName = time() . '_banner_' . $bannerFile->getClientOriginalName();
            $bannerFile->move(public_path('uploads/case-studies'), $bannerName);
            $validated['banner'] = 'uploads/case-studies/' . $bannerName;
        }
        
        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            $coverFile = $request->file('cover_image');
            $coverName = time() . '_cover_' . $coverFile->getClientOriginalName();
            $coverFile->move(public_path('uploads/case-studies'), $coverName);
            $validated['cover_image'] = 'uploads/case-studies/' . $coverName;
        }

        CaseStudy::create($validated);

        return redirect()->route('admin.case-studies.index')->with('success', 'Case Study created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): RedirectResponse
    {
        return redirect()->route('admin.case-studies.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $caseStudy = CaseStudy::findOrFail($id);
        return view('admin.case-studies.edit', compact('caseStudy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $caseStudy = CaseStudy::findOrFail($id);
        
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('case_studies', 'title')->ignore($caseStudy->id)],
            'service' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after_or_equal:start_date'],
            'is_ongoing' => ['nullable', 'boolean'],
            'project_brief' => ['required', 'string'],
            'banner' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
        ]);

        // Handle ongoing case
        if ($request->has('is_ongoing')) {
            $validated['is_ongoing'] = true;
            $validated['end_date'] = null;
        } else {
            $validated['is_ongoing'] = false;
        }
        
        // Handle banner image upload
        if ($request->hasFile('banner')) {
            // Remove old banner if exists
            if ($caseStudy->banner && file_exists(public_path($caseStudy->banner))) {
                unlink(public_path($caseStudy->banner));
            }
            
            $bannerFile = $request->file('banner');
            $bannerName = time() . '_banner_' . $bannerFile->getClientOriginalName();
            $bannerFile->move(public_path('uploads/case-studies'), $bannerName);
            $validated['banner'] = 'uploads/case-studies/' . $bannerName;
        }
        
        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            // Remove old cover image if exists
            if ($caseStudy->cover_image && file_exists(public_path($caseStudy->cover_image))) {
                unlink(public_path($caseStudy->cover_image));
            }
            
            $coverFile = $request->file('cover_image');
            $coverName = time() . '_cover_' . $coverFile->getClientOriginalName();
            $coverFile->move(public_path('uploads/case-studies'), $coverName);
            $validated['cover_image'] = 'uploads/case-studies/' . $coverName;
        }

        $caseStudy->update($validated);

        return redirect()->route('admin.case-studies.index')->with('success', 'Case Study updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $caseStudy = CaseStudy::findOrFail($id);
        $caseStudy->delete();

        return redirect()->route('admin.case-studies.index')->with('success', 'Case Study deleted successfully.');
    }
}
