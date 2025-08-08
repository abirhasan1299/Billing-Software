<?php

namespace App\Providers;

use App\Observers\TransactionObserver;
use Illuminate\Support\ServiceProvider;
use App\Http\Controllers\EmailSettingController;
use App\Observers\InvoiceObserver;
use App\Models\Invoice;
use App\Models\Transaction;
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
        Transaction::observe(TransactionObserver::class);
    }
}
