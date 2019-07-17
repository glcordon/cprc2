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
        // $clients = Client::whereHas('services', function ($query) use($thisDate) {
        //     $query->whereMonth('client_service.created_at','=', $thisDate->month);
        // })->get();
        $start = new Carbon('first day of this month');
        $clientsQuery = Client::whereMonth('enrollment_date','=', $thisDate->month)->whereYear('enrollment_date', '=', $thisDate->year);
        $clients = $clientsQuery->get();
        $inactiveClients = $clientsQuery->where('status', '<>', 'active')->get();
        $activeClients = Client::where('status', 'active')->with('services')->get();
        $inactiveClients = Client::where('status','<>', 'active')->with('services')->get();
        $jobClients = Client::where('status', 'active')->with('jobs')->get();
        $totalActive = $activeClients->count();
        $all = $clients->all();
        $numberOfServices = collect([]);
        $numberOfJobs = collect([]);
        dd($inactiveClients);
       foreach($activeClients as $ac)
       {
           foreach($ac->services->groupBy('service_name') as $key => $serv){
            $numberOfServices->push($key);
           } 
           
       } 
       foreach($jobClients as $ac)
       {
        foreach($ac->jobs->groupBy('salary') as $key => $serv){
            $numberOfJobs->push($key);
           } 
           
       } 
       $jobCount = array_count_values($numberOfJobs->sort()->toArray());
       $serviceCount = array_count_values($numberOfServices->sort()->toArray());
        $service = Service::get();
        // $data = ['today' => $today,'thisDate' =>$thisDate, 'service' => $service, 'totalActive' => $totalActive, 'all' => $clients->all()];
        return view('make_pdf', compact('clients', 'totalActive', 'all', 'service','jobCount', 'inactiveClients', 'serviceCount', 'thisDate'));
        $pdf = PDF::loadView('make_pdf', $data);
        return $pdf->download('itsolutionstuff.pdf');
    }
    public function participantReport(Request $request)
    {
        $thisDate = Carbon::parse($request->searchMonth);
        // $clients = Client::whereHas('services', function ($query) use($thisDate) {
        //     $query->whereMonth('client_service.created_at','=', $thisDate->month);
        // })->get();
        $clients = Client::whereMonth('enrollment_date','=', $thisDate->month)->whereYear('enrollment_date', '=', $thisDate->year)->get();
        return view('participation_report', compact('clients', 'thisDate'));
         
    }
}
