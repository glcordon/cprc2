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
        $today = Carbon::now();
        $data = ['title' => 'Welcome to HDTuto.com', 'today' => $today];
        $pdf = PDF::loadView('make_pdf', $data);
  
        return $pdf->download('itsolutionstuff.pdf');
    }
}
