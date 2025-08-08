<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Student;
use App\Models\Invoice;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function Home()
    {
        $student = Student::latest()->get();
        $agency = Agency::latest()->get();
        $invoice = Invoice::latest()->get();
        $idTrans = "TRANS#".uniqid();
        return view('add.transaction-add',compact('student','agency','invoice','idTrans'));
    }

    public function details($id)
    {
        $transaction = Transaction::findOrFail($id);

        return view('details.transaction-details',compact('transaction'));
    }
    public function Show()
    {
        $payments = Transaction::orderBy('id','desc')->get();
        return view('show.transaction-show',compact('payments'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'type' => 'required',
            'transaction_id' => 'required',
            'student_id' => 'nullable|exists:students,id',
            'agency_id' => 'nullable|exists:agencies,id',
            'custom_payer'=>'nullable',
            'amount'=>'required|numeric',
            'method'=>'required|string',
            'date' => 'required|date',
            'invoice_id'=>'required|exists:invoices,id',
            'note'=>'nullable'
        ]);
        try{

            DB::beginTransaction();

            if ($validatedData['type']=='0')
            {
                //=====Student Update============
                DB::table('students')->where('id',$validatedData['student_id'])
                    ->update([
                        'fee_paid'=>DB::raw('fee_paid+'.$validatedData['amount'])
                    ]);
                //=====Invoice Update============
                DB::table('invoices')->where('id',$validatedData['invoice_id'])
                    ->update([
                        'status'=>DB::raw('status+'. 1)
                    ]);

            }elseif ($validatedData['type']=='1')
            {
                //=====Agency Update============
                DB::table('agencies')->where('id',$validatedData['agency_id'])
                    ->update([
                        'fee_paid'=>DB::raw('fee_paid+'.$validatedData['amount'])
                    ]);

                //=====Invoice Update============
                DB::table('invoices')->where('id',$validatedData['invoice_id'])
                    ->update([
                        'status'=>DB::raw('status+'. 1)
                    ]);
            }
            Transaction::create($validatedData);
            DB::commit();

            return redirect()->route('trans.show')->with('success','Transaction & Mail Send Successfull');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->route('trans.show')->with('danger',throw $e);

        }
    }
    public function destroy($id)
    {
        $model = Transaction::findOrFail($id);
        $model->delete();
        return redirect()->route('trans.show')->with('danger','Transaction Deleted Successfully');
    }
}
