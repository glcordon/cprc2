<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Client;
use App\Service;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class AccountsPayableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $today = Carbon::now();
        $thisDate = Carbon::parse($request->searchMonth);
        $clients = Client::whereHas('services', function ($query) use($today) {
            $query->whereMonth('client_service.created_at','=', $today->month);
        })->with('services')->get();
        $clientData = $clients->map(function($x){ 
            $serviceData = collect($x->services)->map(function($y){
                $pd = collect($y->pivot)->toArray();
                $pivotData = collect($pd)->map(function($z){
                        return $z;
                });
               return['service_name' => $y->service_name, 'pivot' => $pivotData]; 
            });
           return [
               'first'=>$x->first_name, 
               'last'=>$x->last_name, 
               'service'=>$serviceData];
        });

        return view('partials.ap.index', compact('clientData'));
        $start = new Carbon('first day of this month');
        $clientsQuery = Client::whereMonth('enrollment_date','=', $thisDate->month)->whereYear('enrollment_date', '=', $thisDate->year);
        $clients = $clientsQuery->get();
        $inactiveClients = $clientsQuery->where('status', '<>', 'active')->get();
        $activeClients = Client::where('status', 'active')->with('services')->get();
        $inactiveClients = Client::where('status','<>', 'active')->where('updated_at', '>=', $start)->get();
        $jobClients = Client::where('status', 'active')->with('jobs')->get();
        $totalActive = $activeClients->count();
        $all = $clients->all();
        $numberOfServices = collect([]);
        $numberOfJobs = collect([]);
        $numberOfInactiveServices = collect([]);

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
       $inactiveCount = array_count_values($inactiveClients->pluck('status')->toArray()); 
       $jobCount = array_count_values($numberOfJobs->sort()->toArray());
       $serviceCount = array_count_values($numberOfServices->sort()->toArray());
        $service = Service::get();
        // $data = ['today' => $today,'thisDate' =>$thisDate, 'service' => $service, 'totalActive' => $totalActive, 'all' => $clients->all()];
        return view('make_pdf', compact('clients', 'totalActive', 'all', 'service','jobCount', 'inactiveCount', 'inactiveClients', 'serviceCount', 'thisDate'));
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
        return $clients;
         
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
