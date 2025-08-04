<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Home()
    {
        return view('open.dashboard');
    }
    public function Setting()
    {
        return view('open.settings');
    }
}
