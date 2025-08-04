<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public  function Home()
    {
        return view('add.invoice-add');
    }
    public  function Show()
    {
        return view('show.invoice-show');
    }
}
