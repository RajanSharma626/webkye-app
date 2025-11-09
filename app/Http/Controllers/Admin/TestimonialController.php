<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $testimonials = Testimonial::with('caseStudy')
            ->orderBy('position')
            ->orderByDesc('created_at')
            ->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $caseStudies = CaseStudy::orderBy('title')->get(['id', 'title']);

        return view('admin.testimonials.create', compact('caseStudies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'star' => ['required', 'integer', 'min:1', 'max:5'],
            'title' => ['required', 'string', 'max:255'],
            'comment' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'], 
            'designation' => ['nullable', 'string', 'max:255'],
            'position' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'profile' => ['nullable', 'image', 'max:2048'],
            'case_study_id' => ['nullable', 'exists:case_studies,id'],
        ]);

        if ($request->hasFile('profile')) {
            $profileFile = $request->file('profile'); 
            $profileName = time() . '_profile_' . $profileFile->getClientOriginalName();
            $profileFile->move(public_path('uploads/testimonials'), $profileName);
            $validated['profile'] = 'uploads/testimonials/' . $profileName;
        }

        $validated['is_active'] = (bool) ($request->boolean('is_active'));
        $validated['position'] = $validated['position'] ?? 0;
        $validated['case_study_id'] = $validated['case_study_id'] ?? null;

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): RedirectResponse
    {
        return redirect()->route('admin.testimonials.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $testimonial = Testimonial::findOrFail($id);
        $caseStudies = CaseStudy::orderBy('title')->get(['id', 'title']);

        return view('admin.testimonials.edit', compact('testimonial', 'caseStudies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $testimonial = Testimonial::findOrFail($id);

        $validated = $request->validate([
            'star' => ['required', 'integer', 'min:1', 'max:5'],
            'title' => ['required', 'string', 'max:255'],
            'comment' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['nullable', 'string', 'max:255'],
            'position' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
            'profile' => ['nullable', 'image', 'max:2048'],
            'case_study_id' => ['nullable', 'exists:case_studies,id'],
        ]);

        if ($request->hasFile('profile')) {
            if ($testimonial->profile && file_exists(public_path($testimonial->profile))) {
                unlink(public_path($testimonial->profile));
            }
            $profileFile = $request->file('profile');
            $profileName = time() . '_profile_' . $profileFile->getClientOriginalName();
            $profileFile->move(public_path('uploads/testimonials'), $profileName);
            $validated['profile'] = 'uploads/testimonials/' . $profileName;
        }

        $validated['is_active'] = (bool) ($request->boolean('is_active'));
        $validated['position'] = $validated['position'] ?? 0;
        $validated['case_study_id'] = $validated['case_study_id'] ?? null;

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $testimonial = Testimonial::findOrFail($id);
        if ($testimonial->profile && file_exists(public_path($testimonial->profile))) {
            unlink(public_path($testimonial->profile));
        }
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
