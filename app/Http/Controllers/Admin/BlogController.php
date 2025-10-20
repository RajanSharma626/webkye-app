<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'tags' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'banner' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
        ]);
        
        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            $coverFile = $request->file('cover_image');
            $coverName = time() . '_cover_' . $coverFile->getClientOriginalName();
            $coverFile->move(public_path('uploads/blogs'), $coverName);
            $validated['cover_image'] = 'uploads/blogs/' . $coverName;
        }
        
        // Handle banner image upload
        if ($request->hasFile('banner')) {
            $bannerFile = $request->file('banner');
            $bannerName = time() . '_banner_' . $bannerFile->getClientOriginalName();
            $bannerFile->move(public_path('uploads/blogs'), $bannerName);
            $validated['banner'] = 'uploads/blogs/' . $bannerName;
        }

        Blog::create($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): RedirectResponse
    {
        return redirect()->route('admin.blogs.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);
        
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'tags' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'cover_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'banner' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
        ]);
        
        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            // Remove old image if exists
            if ($blog->cover_image && file_exists(public_path($blog->cover_image))) {
                unlink(public_path($blog->cover_image));
            }
            
            $coverFile = $request->file('cover_image');
            $coverName = time() . '_cover_' . $coverFile->getClientOriginalName();
            $coverFile->move(public_path('uploads/blogs'), $coverName);
            $validated['cover_image'] = 'uploads/blogs/' . $coverName;
        }
        
        // Handle banner image upload
        if ($request->hasFile('banner')) {
            // Remove old image if exists
            if ($blog->banner && file_exists(public_path($blog->banner))) {
                unlink(public_path($blog->banner));
            }
            
            $bannerFile = $request->file('banner');
            $bannerName = time() . '_banner_' . $bannerFile->getClientOriginalName();
            $bannerFile->move(public_path('uploads/blogs'), $bannerName);
            $validated['banner'] = 'uploads/blogs/' . $bannerName;
        }

        $blog->update($validated);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $blog = Blog::findOrFail($id);
        
        // Remove images if they exist
        if ($blog->cover_image && file_exists(public_path($blog->cover_image))) {
            unlink(public_path($blog->cover_image));
        }
        
        if ($blog->banner && file_exists(public_path($blog->banner))) {
            unlink(public_path($blog->banner));
        }
        
        $blog->delete();
        
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
