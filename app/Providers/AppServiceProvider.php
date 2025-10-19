<?php

namespace App\Providers;

use App\Models\ContactMessage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('admin.layouts.app', function ($view) {
            $unreadMessagesCount = ContactMessage::where('is_read', false)->count();
            // Pass the data to the sidebar component
            $view->with([
                'unreadMessagesCount' => $unreadMessagesCount,
            ],);
        });
    }
}
