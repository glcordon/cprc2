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
        $thisDate = Carbon::parse($request->searchMonth);
        $clients = Client::whereHas('services', function ($query) use($thisDate) {
            $query->whereMonth('client_service.created_at','=', $thisDate->month);
        })->get();
        $totalActive = $clients->where('status', 'active')->count();
        $all = $clients->all();
        $service = Service::get();
        $data = ['today' => $today, 'totalActive' => $totalActive, 'all' => $clients->all()];
        return view('make_pdf', compact('clients', 'totalActive', 'all', 'service', 'thisDate'));
        $pdf = PDF::loadView('make_pdf', $data);
        return $pdf->download('itsolutionstuff.pdf');
    }
}
