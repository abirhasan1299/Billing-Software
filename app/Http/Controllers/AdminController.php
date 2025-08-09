<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Home()
    {
        return view('add.add-admin');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
           'name' => 'required',
           'email' => 'required|unique:users',
           'password' => 'required|min:6',
           'role' => 'required',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // bcrypt hashed
            'role'=>$request->role
        ]);

        return redirect()->route('admin.show')->with('success', 'Admin added successfully');
    }
    public function Show()
    {
        $data = User::orderBy('id', 'DESC')->get();
        return view('show.admin-show',compact('data'));
    }

    public function details($id)
    {
        $data = User::findOrFail($id);
        return view('details.admin-details',compact('data'));
    }
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.show')->with('danger', 'Admin deleted successfully');
    }
}
