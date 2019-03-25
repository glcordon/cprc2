@extends('layouts.app')
@push('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<style>
    ul{list-style-type: none}
    .gfield_radio li, .gfield_checkbox li {display: inline-block; padding:0 10px;}
    label{margin-top:20px;font-size: 1.1em}
    .gfield_checkbox label, .gfield_radio label{font-size:1em; margin-top:10px;}
</style>
@endpush
@section('content1')

     <div class="container" style="margin-top:4.5em">

  <h1>Add A New Client</h1>
<form method="post" enctype="multipart/form-data" id="gform_4" action="{{ isset($client) ? '/client/'.$client->id .'/update': '/client-store' }}">
    {{ @csrf_field() }}
        <h3 class="gform_title">Intake Form</h3>
        <span class="gform_description">Intake form for CP Re-entry Program!</span><br><br>
 
        <label>Assign Caseworker:</label>
        <select name="caseworker" id="caseworker" class="form-control">
            <option value="">Select Caseworker</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ isset($client) ? ($user->id == $client->assigned_to ? 'selected="selected"' : '') : ''}}>{{ $user->name }}</option>
            @endforeach
        </select>
        <div class="form-group">
           <div class="row"> <div class="col-12">
                <input type="text" name="ncdps-id" class="form-control">
            </div></div>
            
        </div>
<div class="form-group">
    <div class="row">
        <div class="col-6">
        <label class="gfield_label" for="input_4_1">First Name<span class="gfield_required">*</span></label>
        <input name="first_name" id="input_4_1" type="text"  class="form-control" value="{{ isset($client) ? $client->first_name : ''}}"  maxlength="20" tabindex="1" placeholder="Your First Name" aria-required="true" aria-invalid="false"> 
    </div>
    <div class="col-6">
        <label class="gfield_label" for="input_4_2">Last Name<span class="gfield_required">*</span></label>
        <input name="last_name" required id="input_4_2" type="text"  class="form-control" value="{{ isset($client) ? $client->last_name : ''}}"  tabindex="2" placeholder="Your Last Name" aria-required="true" aria-invalid="false">
    </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-4"><label for="maritial_status">Maritial Status</label>
            <select name="maritial_status" id="maritial_status">
                <option value="">Select One</option>
                <option value="single">single</option>
                <option value="married">married</option>
                <option value="widowed">widowed</option>
                <option value="separated">separated</option>
                <option value="divorced">divorced</option>
                <option value="domestic">domestic partner</option>
                <option value="common_law">common law</option>
            </select>
        </div>
        <div class="col-4"><label for="race"></label>
            <select name="race" id="race">
                <option value="">Select One</option>
                <option value="african_american">African American</option>
                <option value="asian">Asin</option>
                <option value="bi-racial">Bi-Racial</option>
                <option value="latino">Latino</option>
                <option value="caucasian">Caucasian</option>
                <option value="multi">Multi-Racial</option>
                <option value="native-american">Native American</option>
                <option value="hawiian">Hawiian/Pacific Outlander</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="col-4"><label for="ethnicity">ethnicity</label>
            <select name="ethnicity" id="ethnicity">
                <option value="">Select One</option>
                <option value="hispanic">Hispanic</option>
                <option value="non-hispanic">Non-Hispanic</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-4"><label for="education">Highest Level of Education</label>
            <select name="education" id="education">
                <option value="">Select One</option>
            </select>
        </div>
        <div class="col-4"><label for="dob">DOB</label>
            <input type="date" name="dob" id="dob" value="{{ isset($client) ? $client->dob : ''}}">
                </div>
        <div class="col-4"><label for="ethnicity">ethnicity</label>
            <select name="ethnicity" id="ethnicity">
                <option value="">Select One</option>
                <option value="grade-school">Grade School</option>
                <option value="some-high">Some High School</option>
                <option value="diplom">High School Diploma</option>
                <option value="high-school-equiv">High School Equivalent</option>
                <option value="associates">Associates</option>
                <option value="bachelors">Bachelors Degree</option>
                <option value="grad">Grad School</option>
                <option value="trade">Trade School</option>
            </select>
        </div>
    </div>
</div>                  
<div class="form-group">
    <div class="row">
        <div class="col-6">
                <label for="input_4_14_1" id="input_4_14_1_label">Street Address</label>
                <input type="text"  class="form-control" name="street_address" id="input_4_14_1" value="{{ isset($client) ? $client->address_1 : ''}}" tabindex="22">                           
        </div>
        <div class="col-6">
                <label for="input_4_14_2" id="input_4_14_2_label">Address Line 2</label>
                <input type="text"  class="form-control" name="s treet_address" id="input_4_14_2" value="{{ isset($client) ? $client->address_2 : ''}}" tabindex="23">
                 
        </div>
        <div class="col-4">
                <label for="input_4_14_3" id="input_4_14_3_label">City</label>
                <input type="text"  class="form-control" name="city" id="input_4_14_3" value="{{ isset($client) ? $client->city : ''}}" tabindex="24">
                 
        </div>
        <div class="col-4">
                <label for="input_4_14_4" id="input_4_14_4_label">State / Province / Region</label>
                <input type="text" class="form-control" name="state" id="input_4_14_4" value="{{ isset($client) ? $client->state : 'NC'}}" tabindex="26">
        </div>
        <div class="col-4">
                <label for="input_4_14_5" id="input_4_14_5_label">ZIP / Postal Code</label>
                <input type="text"  class="form-control" name="zip" id="input_4_14_5" value="{{ isset($client) ? $client->zip : ''}}" tabindex="27">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-4">
            <label class="gfield_label" for="input_4_3">Primary Phone</label>
            <input name="primary_phone" id="input_4_3" type="tel"  class="form-control" value="{{ isset($client) ? $client->primary_phone : ''}}"  tabindex="3" placeholder="Primary Phone Number" aria-invalid="false">
        </div>
        <div class="col-4">
            <label class="gfield_label" for="input_4_4">Secondary Phone</label>
            <input name="secondary_phone" id="input_4_4" type="tel"  class="form-control" value="{{ isset($client) ? $client->secondary_phone : ''}}"  tabindex="4" placeholder="Secondary Phone Number" aria-invalid="false">

        </div>
        <div class="col-4">
            <label class="gfield_label" for="input_4_4">Email Address</label>
            <input name="email" id="input_4_4" type="email" validate="email"  class="form-control" value="{{ isset($client) ? $client->email_address : ''}}"  tabindex="4" placeholder="Email Address" aria-invalid="false">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-4">
            <label class="gfield_label" for="input_4_5">Citizenship Status<span class="gfield_required">*</span></label>
            <select class="form-control" name="citizenship" id="input_4_5" class="medium gfield_select" tabindex="5" aria-required="true" aria-invalid="false">
                <option value="" class="gf_placeholder">Your citizenship Status</option>
                <option value="US Citizen" {{ isset($client) ? ($client->citizenship == 'US Citizen' ? 'selected="selected"' : '') : ''}}>US Citizen</option>
                <option value="Registered Alien" {{ isset($client) ? ($client->citizenship == 'Registered Alien' ? 'selected="selected"' : '') : ''}}>Registered Alien</option>
                <option value="Veteran" {{ isset($client) ? ($client->citizenship == 'Veteran' ? 'selected="selected"' : '') : ''}}>Veteran</option>
            </select>
        </div>
        <div class="col-4">
            <label class="gfield_label" for="input_4_6">What Forms of ID do you posess?<span class="gfield_required">*</span></label>
            <select class="form-control" name="form_of_id" id="input_4_6" class="medium gfield_select" tabindex="6" aria-required="true" aria-invalid="false">
                <option value="" selected="selected" class="gf_placeholder">Your citizenship Status</option>
                <option value="US Drivers License" {{ isset($client) ? ($client->form_of_id == 'US Drivers License' ? 'selected="selected"' : '') : ''}}>US Drivers License</option>
                <option value="Birth Certificate" {{ isset($client) ? ($client->form_of_id == 'Birth Certificate' ? 'selected="selected"' : '') : ''}}>Birth Certificate</option>
                <option value="Social Security Card" {{ isset($client) ? ($client->form_of_id == 'Social Security Card' ? 'selected="selected"' : '') : ''}}>Social Security Card</option>
                <option value="Government ID" {{ isset($client) ? ($client->form_of_id == 'Government ID' ? 'selected="selected"' : '') : ''}}>Government ID</option>
                <option value="No ID" {{ isset($client) ? ($client->form_of_id == 'No ID' ? 'selected="selected"' : '') : ''}}>No ID</option>
            </select>
        </div>
        <div class="col-4">
            <label class="gfield_label" for="input_4_6">Preferred Sex<span class="gfield_required">*</span></label>
            
            <select name="sex" id="sex" required="required" class="form-control">
                <option value="">Select</option>
                <option value="M" {{ isset($client) ? ($client->sex == 'F' ? 'selected="selected"' : '') : ''}}>Male</option>
                <option value="F" {{ isset($client) ? ($client->sex == 'M' ? 'selected="selected"' : '') : ''}}>Female</option>
                <option value="O" {{ isset($client) ? ($client->sex == 'O' ? 'selected="selected"' : '') : ''}}>Prefer Not To Disclose</option>
            </select>
        </div>
    </div>
</div>      

            <label for="input_4_14_5" id="input_4_14_5_label">Release Date *</label>
            <input type="date" required="required"  class="form-control" name="release_date" id="input_4_14_5" value="{{ isset($client) ? $client->release_date : ''}}" tabindex="27">
                <label class="gfield_label" for="input_4_6">Status <span class="gfield_required">*</span></label>

            <select name="status" id="sex" class="form-control" required="required">
                <option value="">Select</option>
                <option value="active" {{ isset($client) ? ($client->status == 'active' ? 'selected="selected"' : '') : ''}}>Active</option>
                <option value="inactive" {{ isset($client) ? ($client->status == 'inactive' ? 'selected="selected"' : '') : ''}}>Inactive</option>
                <option value="complete" {{ isset($client) ? ($client->status == 'complete' ? 'selected="selected"' : '') : ''}}>Complete</option>
            </select>
             <hr>
             <h5>Services</h5>
             
                @foreach($services as $service)
                    <div class="form-check form-check-inline" style="margin:3px 10px; display: -webkit-inline-box"><input type="checkbox" class="form-check-input" name="services[]" value="{{ $service->id }}" id="service_{{ $service->id }}" {{ isset($client) ? (in_array($service->id, $client->services->pluck('id')->toArray()) ? 'checked="checked"' : '') : ''}}> <label  class="form-check-label" for="service_{{ $service->id }}">{{ $service->service_name }}</label></div>
                @endforeach
            <br><br>
       <button class="btn btn-lg btn-primary" type="submit" value="add" name="add">Add Client</button>
       <button class="btn btn-lg btn-primary" type="submit" value="add-new" name="add">Add And Create New </button>
        </form>

   </div>

@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
$(document).ready(function(){
    $('input').attr('autocomplete','off');
});
</script>
@endpush
