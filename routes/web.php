<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController as ControllersFaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CaseStudyPageController;
use App\Http\Controllers\BlogPageController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\ServicePageController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index']);

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

// Newsletter subscription (rate limited to 3 attempts per minute)
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])
    ->middleware('throttle:3,1')
    ->name('newsletter.subscribe');

Route::get('/services', [ServicePageController::class, 'index'])->name('services');

Route::get('/services/service-details', function () {
    return redirect()->route('services');
});

Route::get('/service-details.html', function () {
    return redirect()->route('services');
});

Route::get('/case-studies', [CaseStudyPageController::class, 'index'])->name('case-studies');

Route::get('/case-studies/case-study-details', function () {
    return redirect()->route('case-studies');
});

Route::get('/case-study-details.html', function () {
    return redirect()->route('case-studies');
});

Route::get('/faq',[ControllersFaqController::class,'index'])->name('faq');

Route::get('/blogs', [BlogPageController::class, 'index'])->name('blogs');

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

Route::get('/services/{service:slug}', [ServicePageController::class, 'show'])->name('services.show');

Route::get('/case-studies/{caseStudy:slug}', [CaseStudyPageController::class, 'show'])->name('case-studies.show');




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

    //Blogs
    Route::resource('/admin-panel/blogs', App\Http\Controllers\Admin\BlogController::class)->names('admin.blogs');
    
    //Website Settings
    Route::get('/admin-panel/website-settings', [WebsiteSettingController::class, 'index'])->name('admin.website-settings.index');
    Route::post('/admin-panel/website-settings', [WebsiteSettingController::class, 'update'])->name('admin.website-settings.update');

    //Newsletter Subscribers
    Route::get('/admin-panel/newsletters', [App\Http\Controllers\Admin\NewsletterController::class, 'index'])->name('admin.newsletters.index');
    Route::delete('/admin-panel/newsletters/{id}', [App\Http\Controllers\Admin\NewsletterController::class, 'destroy'])->name('admin.newsletters.destroy');

    //logout
    Route::post('/admin-panel/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});
