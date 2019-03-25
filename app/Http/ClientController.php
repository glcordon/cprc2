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
        //
        $clients = Client::paginate('15');
        return view('partials.clients.client-index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()       
    {
        //
        return view('partials.clients.client-add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email ?? $request->first_name.str_random(5).'@cpreentrync.org';
        $user->password = bcrypt(str_random(40));
        // $user->name = 0;
        $user->save();

        Client::updateOrCreate(['user_id' => $user->id]);
        
        ClientProfile::updateOrCreate(['user_id' => $user->id], 
            [
                'address_1' => $request->street_address, 
                'address_2' => $request->s_treet_address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'primary_phone' =>$request->primary_phone,
                'secondary_phone' => $request->secondary_phone,
                'sex' => $request->preferred_sex,
                'release_date' => $request->release_date,
                'status' => $request->status,
            ]);
        $client = Client::find($user->id);

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
        dd($id);
        $client = Client::find($id);
        return view('partials.clients.client-add', compact('client'));
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

