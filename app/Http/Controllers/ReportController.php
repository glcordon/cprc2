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
        $all = $clients->all();
        $data = ['today' => $today, 'totalActive' => $totalActive, 'all' => $clients->all()];
        return view('make_pdf', compact('clients', 'totalActive', 'all'));
        $pdf = PDF::loadView('make_pdf', $data);
  
        return $pdf->download('itsolutionstuff.pdf');
    }
}
