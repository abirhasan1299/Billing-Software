<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\DueDateReminder;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ReminderTillDueDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:till_due_date';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Invoice Dues Pending';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::now()->toDateString();
        $invoice = Invoice::whereDate('invoice_date','<',$today)
                    ->whereDate('due_date','>',$today)->get();


        foreach ($invoice as $in)
        {
            $data = [
                'invoice_id'=>$in->invoice_number,
                'invoice_created'=>$in->invoice_date,
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

        $this->info('Due Fees (Before Due Date) Reminder Mail Send Successfully');

    }
}
