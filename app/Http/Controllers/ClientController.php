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
    public function __construct()
    {
        $this->middleware('auth');
    }
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

        $users = User::whereIn('role_id', [3,4])->get();
        $services = Services::orderBy('service_name', 'ASC')->get();
        return view('partials.clients.client-add', compact('services','users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $client = new Client;
            $client->enrollment_date = $request->enrollment_date;
            $client->first_name = $request->first_name; 
            $client->middle_name = $request->middle_name;
            $client->last_name = $request->last_name;
            $client->suffix = $request->suffix;
            $client->address_1 = $request->street_address; 
            $client->city = $request->city;
            $client->state = $request->state;
            $client->zip = $request->zip;
            $client->primary_phone =$request->primary_phone;
            $client->secondary_phone = $request->secondary_phone;
            $client->email_address = $request->email;
            $client->citizenship = $request->citizenship;
            $client->form_of_id = $request->form_of_id;
            $client->sex = $request->sex;
            $client->release_date = $request->release_date;
            $client->status = $request->status;
            $client->full_name = $request->last_name. ', '. $request->first_name;
            $client->assigned_to = $request->caseworker;
            $client->ncdps_id = $request->ncdps_id;
            $client->maritial_status = $request->maritial_status;           
            $client->race = $request->race;
            $client->ethnicity = $request->ethnicity;
            $client->education = $request->education;
            $client->dob = $request->dob;
            $client->supervisors_name = $request->supervisors_name;
            $client->charge = $request->charge;
            $client->supervisors_phone = $request->supervisors_phone;
            $client->supervisors_email = $request->supervisors_email;
            $client->supervisors_end_date = $request->supervisors_end_date;
            $client->supervision_level = $request->supervision_level;
            $client->sex_offender = $request->sex_offender;
            $client->county_registered = $request->county_registered;
            $client->released_from = $request->released_from;
            $client->under_supervision = $request->under_supervision;
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
        $client = Client::find($id);
        $users = User::whereIn('role_id', [3,4])->get();
        $services = Services::orderBy('service_name', 'ASC')->get();
        return view('partials.clients.client-add', compact('client', 'users', 'services'));
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
            $client = Client::find($id);
            $client->enrollment_date = $request->enrollment_date;
            $client->first_name = $request->first_name; 
            $client->middle_name = $request->middle_name;
            $client->last_name = $request->last_name;
            $client->suffix = $request->suffix;
            $client->address_1 = $request->street_address; 
            $client->city = $request->city;
            $client->state = $request->state;
            $client->zip = $request->zip;
            $client->primary_phone =$request->primary_phone;
            $client->secondary_phone = $request->secondary_phone;
            $client->email_address = $request->email;
            $client->citizenship = $request->citizenship;
            $client->form_of_id = $request->form_of_id;
            $client->sex = $request->sex;
            $client->release_date = $request->release_date;
            $client->status = $request->status;
            $client->full_name = $request->last_name. ', '. $request->first_name;
            $client->assigned_to = $request->caseworker;
            $client->ncdps_id = $request->ncdps_id;
            $client->maritial_status = $request->maritial_status;           
            $client->race = $request->race;
            $client->ethnicity = $request->ethnicity;
            $client->education = $request->education;
            $client->dob = $request->dob;
            $client->supervisors_name = $request->supervisors_name;
            $client->charge = $request->charge;
            $client->supervisors_phone = $request->supervisors_phone;
            $client->supervisors_email = $request->supervisors_email;
            $client->supervisors_end_date = $request->supervisors_end_date;
            $client->supervision_level = $request->supervision_level;
            $client->sex_offender = $request->sex_offender;
            $client->county_registered = $request->county_registered;
            $client->released_from = $request->released_from;
            $client->under_supervision = $request->under_supervision;
            $client->save();

            $client->services()->sync($request->services);
            

        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->services()->detach();
        $client->delete();
        return redirect()->back()->withInput();
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

    public function myCaseload(int $id)
    {

        $clients = Client::where('assigned_to', $id)->paginate('15');
        // return view('vendor.voyager.clients.browse');
        return view('partials.clients.client-index', compact('clients'));
    }

    public function assignCaseWorker(Request $request)
    {
        
    }
}

