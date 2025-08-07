<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Invoice;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public  function Home()
    {
        $invoice_number = strtoupper('INV'.uniqid());
        $student = Student::latest()->get();
        $agency = Agency::latest()->get();
        return view('add.invoice-add',compact('invoice_number','student','agency'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'invoice_number' => 'required',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date',
            'student_id' => 'required|exists:students,id',
            'pay_amount_student'=>'required|numeric',
            'agency_id'=>'required|exists:agencies,id',
            'pay_amount_agency'=>'required|numeric',
            'lead_ref'=>'nullable|string',
            'notes'=>'nullable|string',
        ]);
        Invoice::create($validate);
        return redirect()->route('invoice.show')->with('success','Invoice Created Successfully');
    }
    public function ajaxStudentInfo(Request $request)
    {
        $data = Student::where('id',$request->student_id)
                ->select('course','total_fee','fee_paid','batch')
                ->get();
        return response()->json($data);
    }
    public  function Show()
    {
        $invoices = Invoice::orderBy('id','desc')->get();
        return view('show.invoice-show',compact('invoices'));
    }

    public function  details($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('details.invoice-details',compact('invoice'));
    }

    public function download($id)
    {
        $invoice = Invoice::with('students','agencies')->findOrFail($id);
        $pdf = Pdf::loadView('open.invoice-download',compact('invoice'));
        return $pdf->download('invoice'.$invoice->invoice_number.".pdf");
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $student = Student::latest()->get();
        $agency = Agency::latest()->get();
        return view('edit.edit-invoice',compact('invoice','student','agency'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'invoice_number' => 'required',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date',
            'student_id' => 'required|exists:students,id',
            'pay_amount_student'=>'required|numeric',
            'agency_id'=>'required|exists:agencies,id',
            'pay_amount_agency'=>'required|numeric',
            'lead_ref'=>'nullable|string',
            'notes'=>'nullable|string',
        ]);

        $model = Invoice::findOrFail($id);
        $model->update($validate);
        return redirect()->route('invoice.show')->with('success','Invoice Updated Successfully');
    }

    public function destroy($id)
    {
        $model= Invoice::findOrFail($id);
        $model->delete();
        return redirect()->route('invoice.show')->with('danger','Invoice Deleted Successfully');
    }

}
