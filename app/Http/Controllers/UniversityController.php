<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function Home()
    {
        return view('add.agency-add');
    }

    public function Show()
    {
        return view('show.agency-show');
    }
}
