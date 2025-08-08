<?php

namespace App\Observers;

use App\Mail\TransactionMail;
use App\Models\Student;
use App\Models\Agency;
use App\Models\Transaction;
use Illuminate\Support\Facades\Mail;

class TransactionObserver
{
    /**
     * Handle the Transaction "created" event.
     */
    public function created(Transaction $transaction): void
    {
       try{
           if($transaction->type=='0')
           {
               $mail = Student::where('id',$transaction->student_id)->first()->email;

           }elseif ($transaction->type=='1')
           {
               $mail = Agency::where('id',$transaction->agency_id)->first()->contact_email;
           }else{
               $mail = $transaction->custom_payer;
           }

           Mail::to($mail)->send(new TransactionMail($transaction));

       }catch (\Exception $e){
            redirect()->route('trans.show')->with('danger',throw $e);
       }

    }

    /**
     * Handle the Transaction "updated" event.
     */
    public function updated(Transaction $transaction): void
    {
        //
    }

    /**
     * Handle the Transaction "deleted" event.
     */
    public function deleted(Transaction $transaction): void
    {
        //
    }

    /**
     * Handle the Transaction "restored" event.
     */
    public function restored(Transaction $transaction): void
    {
        //
    }

    /**
     * Handle the Transaction "force deleted" event.
     */
    public function forceDeleted(Transaction $transaction): void
    {
        //
    }
}
