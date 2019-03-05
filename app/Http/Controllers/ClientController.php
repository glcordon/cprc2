<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\User;
use App\ClientProfile;
use App\Services;
use Illuminate\Support\Facades\Auth;
use App\ClientService;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $clients = Client::paginate('15');
 	// return view('vendor.voyager.clients.browse');
       return view('partials.clients.client-index', compact('clients'));
          }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()       
    {
        $services = Services::orderBy('service_name', 'ASC')->get();
        return view('partials.clients.client-add', compact('services'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        $client = new Client;
        
            $client->first_name = $request->first_name; 
            $client->last_name = $request->last_name;
            $client->address_1 = $request->street_address; 
            $client->address_2 = $request->s_treet_address;
            $client->city = $request->city;
            $client->state = $request->state;
            $client->zip = $request->zip;
            $client->primary_phone =$request->primary_phone;
            $client->secondary_phone = $request->secondary_phone;
            $client->sex = $request->preferred_sex;
            $client->release_date = $request->release_date;
            $client->status = $request->status;
            $client->full_name = $request->last_name. ', '. $request->first_name;
            $client->save();

            $client->services()->attach($request->services);
            

        return redirect()->route('client.index');
        
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
        $clients = Client::find($id);
        $services = $clients->services;
        $additional_service = Services::get();
        $allServices = collect($additional_service->toArray());
        $otherServices = $additional_service->diff($services)->toArray();
    //     $mine = [];
    //         foreach($services as $srv)
    //         {
    //             $myServices = $allServices->reject(function ($value, $key) use ($srv) {
            
    //         // dd($services);
    //         dump($srv);
    //         dump($value);
    //          return $value['service_name'] == $srv['service_name'];
                
           
            
    //     }); 
    // }
        $notes = $clients->notes;
        $last_contact = $clients->notes->first()->created_at ?? '';
        // dd(Services::select('id', 'service_name')->pluck('id'));
        return view('partials.clients.client-contact', compact('clients', 'services','notes', 'otherServices', 'last_contact'));
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
    public function addService(Request $request)
    {
        if($request)
        {
            $client = Client::find($request->client_id);
           ClientService::updateOrCreate(['service_id' => $request->service_id, 'client_id' => $client->id]);
           return 'done';
        }
    }
}

