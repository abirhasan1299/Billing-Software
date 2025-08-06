<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function Home()
    {
        return view('add.agency-add');
    }
    public function addAgency(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|numeric',
            'bank_details' => 'required|string',
            'payment_term' => 'required|string|max:255',
            'fee_per_student' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'notes' => 'string|max:1000'
        ]);

        Agency::create($validateData);

         return redirect()->route('agency.show')->with('success','New Agency Added');
    }
    public function Show()
    {
        $data = Agency::orderBy('id','desc')->get();
        return view('show.agency-show',compact('data'));
    }

    public function Details($id)
    {
        $agency = Agency::findOrFail($id);
        return view('details.agency-details',compact('agency'));
    }

    public function edit($id)
    {
        $agency = Agency::findOrFail($id);
        return view('edit.edit-agency',compact('agency'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'contact_person' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|numeric',
            'bank_details' => 'required|string',
            'payment_term' => 'required|string|max:255',
            'fee_per_student' => 'required|numeric',
            'total_amount' => 'required|numeric',
            'notes' => 'string|max:1000'
        ]);
        $agency = Agency::findOrFail($id);

        $agency->update($validateData);

        return redirect()->route('agency.show')->with('success','Agency Updated');
    }

    public function destroy($id)
    {
        $agency = Agency::findOrFail($id);
        $agency->delete();
        return redirect()->route('agency.show')->with('danger','A agency Deleted');

    }

}
