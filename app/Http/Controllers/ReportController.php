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
        $totalActive = $clients->where('status', '1')->count();
        dd($clients->services->where('service_name', 'Education'));
        $data = ['title' => 'Welcome to HDTuto.com', 'today' => $today];
        $pdf = PDF::loadView('make_pdf', $data);
  
        return $pdf->download('itsolutionstuff.pdf');
    }
}
