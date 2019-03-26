<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    //

    public function index(Request $request)
    {
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('welcome', $data);
  
        return $pdf->download('itsolutionstuff.pdf');
    }
}
