<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function Home()
    {
        return view('add.transaction-add');
    }

    public function Show()
    {
        return view('show.transaction-show');
    }
}
