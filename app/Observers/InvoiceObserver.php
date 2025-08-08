<?php

namespace App\Observers;

use App\Models\Invoice;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceCreatedMail;
use App\Models\Student;
use App\Models\Agency;
class InvoiceObserver
{
    /**
     * Handle the Invoice "created" event.
     */
    public function created(Invoice $invoice): void
    {
        $studentMail = Student::where('id',$invoice->student_id)->first()->email;
        $agencyMail = Agency::where('id',$invoice->agency_id)->first()->contact_email;

        Mail::to([$studentMail,$agencyMail])
            ->send(new InvoiceCreatedMail($invoice));

    }

    /**
     * Handle the Invoice "updated" event.
     */
    public function updated(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "deleted" event.
     */
    public function deleted(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "restored" event.
     */
    public function restored(Invoice $invoice): void
    {
        //
    }

    /**
     * Handle the Invoice "force deleted" event.
     */
    public function forceDeleted(Invoice $invoice): void
    {
        //
    }
}
