<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $services = \App\Models\Service::latest()->get();
        return view("admin.services.index", compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string'],
            'detail' => ['required', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
            'banner' => ['nullable', 'image', 'max:2048'],
            'icon' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('banner')) {
            $bannerFile = $request->file('banner');
            $bannerName = time() . '_banner_' . $bannerFile->getClientOriginalName();
            $bannerFile->move(public_path('uploads/services'), $bannerName);
            $validated['banner'] = 'uploads/services/' . $bannerName;
        }

        \App\Models\Service::create($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): RedirectResponse
    {
        return redirect()->route('admin.services.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $service = \App\Models\Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $service = \App\Models\Service::findOrFail($id);

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string'],
            'detail' => ['required', 'string'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
            'banner' => ['nullable', 'image', 'max:2048'],
            'icon' => ['nullable', 'string'],
        ]);

        if ($request->hasFile('banner')) {
            if ($service->banner) {
                unlink(public_path($service->banner));
            }
            $bannerFile = $request->file('banner');
            $bannerName = time() . '_banner_' . $bannerFile->getClientOriginalName();
            $bannerFile->move(public_path('uploads/services'), $bannerName);
            $validated['banner'] = 'uploads/services/' . $bannerName;
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $service = \App\Models\Service::findOrFail($id);
        if ($service->banner) {
            unlink(public_path($service->banner));
        }
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
