@extends('layouts.app')
@push('styles')
<style>
    ul{list-style-type: none}
    .gfield_radio li, .gfield_checkbox li {display: inline-block; padding:0 10px;}
    label{margin-top:20px;font-size: 1.6em}
    .gfield_checkbox label, .gfield_radio label{font-size:1em; margin-top:10px;}
</style>
@endpush
@section('content1')

     <div class="container" style="margin-top:4.5em">

  <h1>Add A New Client</h1>

<form method="post" enctype="multipart/form-data" id="gform_4" action="/client-store">
    {{ @csrf_field() }}
        <h3 class="gform_title">Intake Form</h3>
        <span class="gform_description">Intake form for CP Re-entry Program!</span><br><br>
 
        <label>Assign Caseworker:</label>
        <select name="caseworker" id="caseworker" class="form-control">
            <option value="">Select Caseworker</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
<div class="form-group">
    <div class="col-6">
        <label class="gfield_label" for="input_4_1">First Name<span class="gfield_required">*</span></label>
        <input name="first_name" id="input_4_1" type="text"  class="form-control" value=""  maxlength="20" tabindex="1" placeholder="Your First Name" aria-required="true" aria-invalid="false">
        
    </div>
    <div class="col-6">
        <label class="gfield_label" for="input_4_2">Last Name<span class="gfield_required">*</span></label>
        <input name="last_name" required id="input_4_2" type="text"  class="form-control" value=""  tabindex="2" placeholder="Your Last Name" aria-required="true" aria-invalid="false">
        
    </div>
        
        
</div>
        
        <label class="gfield_label" for="input_4_3">Primary Phone</label><div class="ginput_container ginput_container_phone">
        <input name="primary_phone" id="input_4_3" type="tel"  class="form-control" value=""  tabindex="3" placeholder="Primary Phone Number" aria-invalid="false">

        <label class="gfield_label" for="input_4_4">Secondary Phone</label>
        <input name="secondary_phone" id="input_4_4" type="tel"  class="form-control" value=""  tabindex="4" placeholder="Secondary Phone Number" aria-invalid="false">

        <label class="gfield_label" for="input_4_4">Email Address</label>
        <input name="email" id="input_4_4" type="email" validate="email"  class="form-control" value=""  tabindex="4" placeholder="Email Address" aria-invalid="false">
   
        <label class="gfield_label" for="input_4_5">Citizenship Status<span class="gfield_required">*</span></label>
        <select class="form-control" name="citizenship" id="input_4_5" class="medium gfield_select" tabindex="5" aria-required="true" aria-invalid="false">
            <option value="" selected="selected" class="gf_placeholder">Your citizenship Status</option>
            <option value="US Citizen">US Citizen</option><option value="Registered Alien">Registered Alien</option>
            <option value="Veteran">Veteran</option></select>
                <label class="gfield_label" for="input_4_6">What Forms of ID do you posess?<span class="gfield_required">*</span></label>
                <div class="ginput_container ginput_container_select">
                    <select class="form-control" name="citizenship" id="input_4_6" class="medium gfield_select" tabindex="6" aria-required="true" aria-invalid="false">
                    <option value="" selected="selected" class="gf_placeholder">Your citizenship Status</option>
                    <option value="US Drivers License">US Drivers License</option>
                    <option value="Birth Certificate">Birth Certificate</option>
                    <option value="Social Security Card">Social Security Card</option>
                    <option value="Government ID">Government ID</option>
                    <option value="No ID">No ID</option>
                </select>
                <label class="gfield_label" for="input_4_6">Preferred Sex<span class="gfield_required">*</span></label>
               
                <select name="sex" id="sex" required="required" class="form-control">
                    <option value="">Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="O">Prefer Not To Disclose</option>
                </select>
                <label for="input_4_14_1" id="input_4_14_1_label">Street Address</label>
                    <input type="text"  class="form-control" name="street_address" id="input_4_14_1" value="" tabindex="22">                           
                    <label for="input_4_14_2" id="input_4_14_2_label">Address Line 2</label>
                    <input type="text"  class="form-control" name="s treet_address" id="input_4_14_2" value="" tabindex="23">
                      <label for="input_4_14_3" id="input_4_14_3_label">City</label>
                     <input type="text"  class="form-control" name="city" id="input_4_14_3" value="" tabindex="24">
                           <label for="input_4_14_4" id="input_4_14_4_label">State / Province / Region</label>
                         <input type="text"  class="form-control" name="state" id="input_4_14_4" value="" tabindex="26">
                  
                            <label for="input_4_14_5" id="input_4_14_5_label">ZIP / Postal Code</label>
                            <input type="text"  class="form-control" name="zip" id="input_4_14_5" value="" tabindex="27">
              
                            <label for="input_4_14_5" id="input_4_14_5_label">Release Date *</label>
                            <input type="date" required="required"  class="form-control" name="release_date" id="input_4_14_5" value="" tabindex="27">
                                <label class="gfield_label" for="input_4_6">Status <span class="gfield_required">*</span></label>
            
                            <select name="sex" id="sex" class="form-control" required="required">
                                <option value="">Select</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="complete">Complete</option>
                            </select>
             <hr>
             <h5>Services</h5>
            <ul>
                @foreach($services as $service)
                    <li><input type="checkbox" name="services[]" value="{{ $service->id }}" id="service_{{ $service->id }}"> <label for="service_{{ $service->id }}">{{ $service->service_name }}</label>
                @endforeach
            </ul>
       <button class="btn btn-lg btn-primary" type="submit" value="add" name="add">Add Client</button>
       <button class="btn btn-lg btn-primary" type="submit" value="add-new" name="add">Add And Create New </button>
        </form>

   </div>

@endsection
@push('scripts')
<script>
$(document).ready(function(){
    $('input').attr('autocomplete','off');
});
</script>
@endpush
