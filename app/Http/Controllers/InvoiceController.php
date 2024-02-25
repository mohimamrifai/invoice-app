<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index ()
    {
        $title = "Create Your Invoice";
        return view('pages.invoice', compact('title'));
    }
}
