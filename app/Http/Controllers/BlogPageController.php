<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogPageController extends Controller
{
    /**
     * Display the blog listing page
     */
    public function index()
    {
        // Fetch all blogs with pagination (9 per page for 3 columns)
        $blogs = Blog::latest()->paginate(9);

        return view('blog', compact('blogs'));
    }
}


