<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Email;
use App\Models\Transaction;
use App\Models\Agency;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function Home()
    {
        $totalStudent = Student::count();
        $collectedFees = Transaction::sum('amount');
        $dueStudent = Student::sum('total_fee') - Student::sum('fee_paid');
        $dueBoard = Agency::sum('total_amount') - Agency::sum('fee_paid');
        $recentTrans = Transaction::orderBy('id','desc')->take(10)->get();

        return view('open.dashboard',compact('totalStudent','collectedFees','dueStudent','dueBoard','recentTrans'));
    }

    public function LoginVerify(Request $request)
    {
        // Validate input
        $credentials = $request->validate([
            'email' => 'required', 'email',
            'password' => 'required',
        ]);

        // Attempt to log in
        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent fixation
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->with('danger','Invalid Credentials');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
    public function login()
    {
        return view('open.login');
    }
    public function transactionForm()
    {
        return view('form.transaction-tracker');
    }
    public function TransactionTracker(Request $request)
    {
        $transaction = Transaction::where('transaction_id',"TRANS#".$request->id)->first();
        if($transaction)
        {
            return view('open.transaction-tracker', compact('transaction'));
        }else{
            return view('error.not-found');
        }


    }

    public function invoiceForm()
    {
        return view('form.invoice-tracker');
    }
    public function InvoiceTracker(Request $request)
    {
        $invoice = Invoice::where('invoice_number',"INV".$request->id)->first();
        if($invoice)
        {
            return view('open.invoice-tracker', compact('invoice'));
        }else{
            return view('error.not-found');
        }


    }
    public function Setting()
    {
        $data = Email::where('id',1)->first();
        return view('open.settings',compact('data'));
    }
}
