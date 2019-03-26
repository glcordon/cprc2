<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class ReportController extends Controller
{
    //

    public function index(Request $request)
    {
        $data = ['title' => 'Welcome to HDTuto.com'];
        $pdf = PDF::loadView('make_pdf', $data);
  
        return $pdf->download('itsolutionstuff.pdf');
    }
}
