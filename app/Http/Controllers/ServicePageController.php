<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\View\View;

class ServicePageController extends Controller
{
    /**
     * Display a listing of all services.
     */
    public function index(): View
    {
        $services = Service::latest()->get();

        return view('service', compact('services'));
    }

    /**
     * Display the specified service detail.
     */
    public function show(Service $service): View
    {
        return view('service-details', compact('service'));
    }
}

