<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Client;
use PDF;

class ReportController extends Controller
{
    //

    public function index(Request $request)
    {
        $today = Carbon::now();
        $clients = Client::get();
        $totalActive = $clients->where('status', 'active')->count();
        $data = ['today' => $today, 'totalActive' => $totalActive, 'all' => $clients->all()];
        $pdf = PDF::loadView('make_pdf', $data);
  
        return $pdf->download('itsolutionstuff.pdf');
    }
}
