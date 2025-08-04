<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Home()
    {
        return view('add.add-admin');
    }
    public function Show()
    {
        return view('show.admin-show');
    }
}
