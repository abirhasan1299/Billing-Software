<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function Home()
    {
        return view('add.student-add');
    }

    public function createStudent(Request $request)
    {
        $validatedData = $request->validate([
            'name'           => 'required|string|max:255',
            'enrollment'     => 'required|string|max:255',
            'dob'            => 'required|date',
            'email'          => 'required|email|max:255',
            'phone'          => 'required|string|max:255',
            'gender'         => 'required|in:Male,Female,Other',
            'father'         => 'required|string|max:255',
            'mother'         => 'required|string|max:255',
            'status'         => 'required|string|max:255',
            'total_fee'      => 'required|integer|min:0',
            'fee_paid'       => 'nullable|integer|min:0',
            'ref_agency'     => 'nullable|string|max:255',
            'ref_lead'       => 'nullable|string|max:255',
            'address'        => 'nullable|string|max:1000',
            'city'           => 'nullable|string|max:50',
            'state'          => 'nullable|string|max:50',
            'postal_code'    => 'nullable|integer|digits_between:4,10',
            'country'        => 'nullable|string|max:50',
            'course'         => 'required|string|max:50',
            'batch'          => 'required|string|max:50',
            'admission_date' => 'required|date',
            'photo'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = 'uploads/students/' . $filename;

            $file->move(public_path('uploads/students'), $filename);

            $validatedData['photo'] = $filePath;
        }

        Student::create($validatedData);
        return redirect()->route('student.show')->with('success', 'Student Added Successfully');

    }

    public function Show()
    {
        $students = Student::orderBy('id', 'DESC')->get();
        return view('show.student-show',compact('students'));
    }

    public function details($id)
    {
        $student = Student::findOrFail($id);
        $transaction = Transaction::where('student_id',$student->id)->orderBy('id', 'DESC')->get();
        return view('details.student-details',compact('student','transaction'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('edit.edit-student',compact('student'));
    }
    public function update(Request $request,$id)
    {
        $student = Student::findOrFail($id);
        $validatedData = $request->validate([
            'name'           => 'required|string|max:255',
            'enrollment'     => 'required|string|max:255',
            'dob'            => 'required|date',
            'email'          => 'required|email|max:255',
            'phone'          => 'required|string|max:255',
            'gender'         => 'required|in:Male,Female,Other',
            'father'         => 'required|string|max:255',
            'mother'         => 'required|string|max:255',
            'status'         => 'required|string|max:255',
            'total_fee'      => 'required|integer|min:0',
            'fee_paid'       => 'nullable|integer|min:0',
            'ref_agency'     => 'nullable|string|max:255',
            'ref_lead'       => 'nullable|string|max:255',
            'address'        => 'nullable|string|max:1000',
            'city'           => 'nullable|string|max:50',
            'state'          => 'nullable|string|max:50',
            'postal_code'    => 'nullable|integer|digits_between:4,10',
            'country'        => 'nullable|string|max:50',
            'course'         => 'required|string|max:50',
            'batch'          => 'required|string|max:50',
            'admission_date' => 'required|date',
            'photo'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $filePath = 'uploads/students/' . $filename;

            $file->move(public_path('uploads/students'), $filename);

            $validatedData['photo'] = $filePath;
        }

        $student->update($validatedData);

        return redirect()->route('student.show')->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        $data = Student::findorFail($id);
        $data->delete();
        return redirect()->route('student.show')->with('danger', 'Student deleted successfully');
    }
}
