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

       <div class="row">

  <h1>Add A New Client</h1>
<div class="col-md-12">

<form method="post" enctype="multipart/form-data" id="gform_4" action="/client-store">
    {{ @csrf_field() }}
    <div class="gform_heading">
        <h3 class="gform_title">Intake Form</h3>
        <span class="gform_description">Intake form for CP Re-entry Program!</span>
    </div>
    <div class="gform_body"><ul id="gform_fields_4" class="gform_fields top_label form_sublabel_below description_below">
        <li id="field_4_1" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible">
        <label class="gfield_label" for="input_4_1">First Name<span class="gfield_required">*</span></label>
        <div class="ginput_container ginput_container_text"><input autocomplete="off" name="first_name" id="input_4_1" type="text"  class="form-control" value="" class="medium" maxlength="20" tabindex="1" placeholder="Your First Name" aria-required="true" aria-invalid="false">
        <li id="field_4_2" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible">
        <label class="gfield_label" for="input_4_2">Last Name<span class="gfield_required">*</span></label>
        <div class="ginput_container ginput_container_text">
        <input name="last_name" id="input_4_2" type="text"  class="form-control" value="" class="medium" tabindex="2" placeholder="Your Last Name" aria-required="true" aria-invalid="false"></div>
        </li>
        <li id="field_4_3" class="gfield field_sublabel_below field_description_below gfield_visibility_visible">
        <label class="gfield_label" for="input_4_3">Primary Phone</label><div class="ginput_container ginput_container_phone">
        <input name="primary_phone" id="input_4_3" type="text"  class="form-control" value="" class="medium" tabindex="3" placeholder="Primary Phone Number" aria-invalid="false"></div></li>
        <li id="field_4_4" class="gfield field_sublabel_below field_description_below gfield_visibility_visible">
        <label class="gfield_label" for="input_4_4">Secondary Phone</label>
        <div class="ginput_container ginput_container_phone">
        <input name="secondary_phone" id="input_4_4" type="text"  class="form-control" value="" class="medium" tabindex="4" placeholder="Secondary Phone Number" aria-invalid="false">
        </div>
        </li>
        <li id="field_4_4" class="gfield field_sublabel_below field_description_below gfield_visibility_visible">
        <label class="gfield_label" for="input_4_4">Email Address</label>
        <div class="ginput_container ginput_container_phone">
        <input name="email" id="input_4_4" type="email" validate="email"  class="form-control" value="" class="medium" tabindex="4" placeholder="Email Address" aria-invalid="false">
        </div>
        </li>
        <li id="field_4_5" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible">
        <label class="gfield_label" for="input_4_5">Citizenship Status<span class="gfield_required">*</span></label>
        <div class="ginput_container ginput_container_select">
                                                <select class="form-control" name="citizenship" id="input_4_5" class="medium gfield_select" tabindex="5" aria-required="true" aria-invalid="false">
                                                    <option value="" selected="selected" class="gf_placeholder">Your citizenship Status</option>
                                                    <option value="US Citizen">US Citizen</option><option value="Registered Alien">Registered Alien</option>
                                                    <option value="Veteran">Veteran</option></select></div></li>
                                                    <li id="field_4_6" class="gfield gfield_contains_required field_sublabel_below field_description_below gfield_visibility_visible">
                                                        <label class="gfield_label" for="input_4_6">What Forms of ID do you posess?<span class="gfield_required">*</span></label>
                                                        <div class="ginput_container ginput_container_select">
                                                            <select class="form-control" name="citizenship" id="input_4_6" class="medium gfield_select" tabindex="6" aria-required="true" aria-invalid="false">
                                                            <option value="" selected="selected" class="gf_placeholder">Your citizenship Status</option>
                                                            <option value="US Drivers License">US Drivers License</option>
                                                            <option value="Birth Certificate">Birth Certificate</option>
                                                            <option value="Social Security Card">Social Security Card</option>
                                                            <option value="Government ID">Government ID</option>
                                                            <option value="No ID">No ID</option></select></div></li>
            <li>
                    <label class="gfield_label" for="input_4_6">Preferred Sex <span class="gfield_required">*</span></label>

                <select name="sex" id="sex" required="required" class="form-control">
                    <option value="">Select</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="O">Prefer Not To Disclose</option>
                </select>
            </li>
            
       <li><br />
        <div class="ginput_complex ginput_container has_street has_street2 has_city has_state has_zip has_country ginput_container_address gfield_trigger_change" id="input_4_14">
            <span class="ginput_full address_line_1" id="input_4_14_1_container">
                           <label for="input_4_14_1" id="input_4_14_1_label">Street Address</label>
                     <input type="text"  class="form-control" name="street_address" id="input_4_14_1" value="" tabindex="22">
                             </span><span class="ginput_full address_line_2" id="input_4_14_2_container">
                           <label for="input_4_14_2" id="input_4_14_2_label">Address Line 2</label>
                       <input type="text"  class="form-control" name="s treet_address" id="input_4_14_2" value="" tabindex="23">
                           </span><span class="ginput_left address_city" id="input_4_14_3_container">
                      <label for="input_4_14_3" id="input_4_14_3_label">City</label>
                     <input type="text"  class="form-control" name="city" id="input_4_14_3" value="" tabindex="24">
                       </span><span class="ginput_right address_state" id="input_4_14_4_container">
                           <label for="input_4_14_4" id="input_4_14_4_label">State / Province / Region</label>
                         <input type="text"  class="form-control" name="state" id="input_4_14_4" value="" tabindex="26">
                           </span>
                        <span class="ginput_left address_zip" id="input_4_14_5_container">
                            <label for="input_4_14_5" id="input_4_14_5_label">ZIP / Postal Code</label>
                            <input type="text"  class="form-control" name="zip" id="input_4_14_5" value="" tabindex="27">
                        </span>
                        <span class="ginput_left address_zip" id="input_4_14_5_container">
                            <label for="input_4_14_5" id="input_4_14_5_label">Release Date *</label>
                            <input type="date" required="required"  class="form-control" name="release_date" id="input_4_14_5" value="" tabindex="27">
                        </span>
                        <li>
                                <label class="gfield_label" for="input_4_6">Status <span class="gfield_required">*</span></label>
            
                            <select name="sex" id="sex" class="form-control" required="required">
                                <option value="">Select</option>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                                <option value="complete">Complete</option>
                            </select>
                        </li>
        <div>
            @foreach($services as $service)
                <li><input type="checkbox" name="service" value="{{ $service->id }}" id="service_{{ $service->id }}"> <label for="service_{{ $service->id }}">{{ $service->service_name }}</label></li>
            @endforeach
        </div>
       <div class="gf_clear gf_clear_complex"><br /></div>
           <button class="btn btn-lg btn-primary" type="submit">Submit</button>
        </li> 
    </form>
  
</div>

     </div>

   </div>

@endsection
@push('scripts')
<script>
$(document).ready(function(){
    $('input').attr('autocomplete','off');
});
</script>
@endpush
