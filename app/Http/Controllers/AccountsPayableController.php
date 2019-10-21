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
            $query->whereMonth('client_service.date_authorized','=', $today->month);
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
               'id'=>$x->id,
               'first'=>$x->first_name, 
               'last'=>$x->last_name, 
               'service'=>$serviceData];
        });

        return view('partials.ap.index', compact('clientData'));
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
    public function updateService(Request $request)
    {
        $client = Client::find($request->client_id);
        $services = $client->services->filter(function($data) use($request){
            return $data->pivot->service_id == $request->service_id;
        });
        return $services['pivot'];
        $client->services()->attach([$request->service_id =>['date_authorized'=>$request->date_authorized, 'authorized_price'=>$request->authorized_price]]);
        return $client->services;
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
