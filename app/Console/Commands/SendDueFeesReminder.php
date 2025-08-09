<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\Invoice;
use Illuminate\Support\Facades\Mail;
use App\Mail\DueDateReminder;

class SendDueFeesReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:due-fees';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Email Reminders for Due Fess';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now()->toDateString();
        $invoice = Invoice::where('due_date',$today)->get();



        foreach ($invoice as $in)
        {
            $data = [
                'invoice_id'=>$in->invoice_number,
                'invoice_created'=>$in->created_at,
                'due_date'=>$in->due_date,
                'student_name'=>$in->students->name,
                'agency_name'=>$in->agencies->name,
                'paytoAgency'=>$in->pay_amount_agency,
                'paytoStudent'=>$in->pay_amount_student
            ];

            if($in->status!=3)
            {
                Mail::to([$in->students->email,$in->agencies->contact_email])->send(new DueDateReminder($data));
            }

        }

        $this->info('Due Fees Reminder Mail Send Successfully');

    }
}
