<?php

namespace App\Providers;

use App\Models\ContactMessage;
use App\Models\WebsiteSetting;
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
        // Share website settings with all views
        try {
            View::share('websiteSetting', WebsiteSetting::first());
        } catch (\Exception $e) {
            // Table doesn't exist yet (during migrations)
            View::share('websiteSetting', null);
        }
        
        View::composer('admin.layouts.app', function ($view) {
            try {
                $unreadMessagesCount = ContactMessage::where('is_read', false)->count();
                // Pass the data to the sidebar component
                $view->with([
                    'unreadMessagesCount' => $unreadMessagesCount,
                ]);
            } catch (\Exception $e) {
                // Table doesn't exist yet (during migrations)
                $view->with([
                    'unreadMessagesCount' => 0,
                ]);
            }
        });
    }
}
