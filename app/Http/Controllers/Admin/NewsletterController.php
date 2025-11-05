<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of newsletter subscribers
     */
    public function index()
    {
        $newsletters = Newsletter::latest()->paginate(20);
        return view('admin.newsletters.index', compact('newsletters'));
    }

    /**
     * Remove the specified subscriber from storage
     */
    public function destroy($id)
    {
        try {
            $newsletter = Newsletter::findOrFail($id);
            $newsletter->delete();

            return redirect()->route('admin.newsletters.index')
                ->with('success', 'Subscriber deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.newsletters.index')
                ->with('error', 'Failed to delete subscriber');
        }
    }
}

