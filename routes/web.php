<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact-us', function () {
    return view('contact');
});

Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');


Route::get('/services', function () {
    return view('service');
});

Route::get('/case-studies', function () {
    return view('case-study');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/blogs', function () {
    return view('blog');
});

Route::get('/blog/blog-detail', function () {
    return view('blog-details');
});

Route::get('/testimonials', function () {
    return view('testimonial');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('/term-condition', function () {
    return view('term-condition');
});

Route::get('/services/service-details', function () {
    return view('service-details');
});

Route::get('/case-studies/case-study-details', function () {
    return view('case-study-details');
});



Route::middleware('guest')->group(function () {
    Route::get('/admin-panel/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/admin-panel/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
});


Route::middleware('auth')->group(function () {
    Route::get('/admin-panel', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

    //FAQs  
    Route::resource('/admin-panel/faqs', FaqController::class)->names('admin.faqs');

    //Testimonials
    Route::resource('/admin-panel/testimonials', TestimonialController::class)->names('admin.testimonials');

    //Contact Messages
    Route::get('/admin-panel/messages', [ContactMessageController::class, 'index'])->name('admin.messages.index');
    Route::patch('/admin-panel/messages/{id}/read', [ContactMessageController::class, 'markRead'])->name('admin.messages.read');
    Route::patch('/admin-panel/messages/{id}/unread', [ContactMessageController::class, 'markUnread'])->name('admin.messages.unread');
    Route::delete('/admin-panel/messages/{id}', [ContactMessageController::class, 'destroy'])->name('admin.messages.destroy');

    //Services
    Route::resource('/admin-panel/services', ServiceController::class)->names('admin.services');

    //Case Studies
    Route::resource('/admin-panel/case-studies', App\Http\Controllers\Admin\CaseStudyController::class)->names('admin.case-studies');


    //logout
    Route::post('/admin-panel/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});
