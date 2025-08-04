<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function Home()
    {
        return view('add.student-add');
    }

    public function Show()
    {
        return view('show.student-show');
    }
}
