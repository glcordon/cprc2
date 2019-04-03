<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Client;
use App\Service;
use PDF;

class ReportController extends Controller
{
    //

    public function index(Request $request)
    {
        $today = Carbon::now();
        $thisDate = $request->year.'-'.$request->month;
        dd($thisDate);
        $clients = Client::whereHas('services', function ($query) use($thisDate) {
            $query->where('client_service.created_at', 'like', '{$thisDate}%');
        })->get();
        $totalActive = $clients->where('status', 'active')->count();
        $all = $clients->all();
        $service = Service::get();
        $data = ['today' => $today, 'totalActive' => $totalActive, 'all' => $clients->all()];
        return view('make_pdf', compact('clients', 'totalActive', 'all', 'service'));
        $pdf = PDF::loadView('make_pdf', $data);
        return $pdf->download('itsolutionstuff.pdf');
    }
}
