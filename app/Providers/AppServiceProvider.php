<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\EmailSettingController;
use App\Observers\InvoiceObserver;
use App\Models\Invoice;
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
        EmailSettingController::setMailConfig();
        Invoice::observe(InvoiceObserver::class);
    }
}
