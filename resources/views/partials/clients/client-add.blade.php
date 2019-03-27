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

  <h1>{{ !isset($client) ? "Add A New Client" : 'Edit/View ' .$client->last_name. ', ' .$client->first_name}}</h1>
<form method="post" enctype="multipart/form-data" id="gform_4" action="{{ isset($client) ? '/client/'.$client->id .'/update': '/client-store' }}">
    {{ @csrf_field() }}
        <h3 class="gform_title">Intake Form</h3>
        <span class="gform_description">Intake form for CP Re-entry Program!</span><br><br>
        <div class="row">
            <div class="form-group">
                <div class="row">
                    <label for="enrollment_date">Enrollment Date</label>
                    <div class="col-12"><input type="date" value="{{ isset($client) ? $client->enrollment_date : ''}}" name="enrollment_date" id="enrollment_date" class="form-control"></div>
                </div>
            </div>
        </div>
        <label>Assign Caseworker:</label>
        <select name="caseworker" id="caseworker" class="form-control">
            <option value="">Select Caseworker</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}" {{ isset($client) ? ($user->id == $client->assigned_to ? 'selected="selected"' : '') : ''}}>{{ $user->name }}</option>
            @endforeach
        </select>
        <div class="form-group">
           <div class="row"> <div class="col-12">
               <label for="ncdps_id">NCDPS ID</label>
                <input type="text" name="ncdps_id" value="{{ isset($client) ? $client->ncdps_id : ''}}"  class="form-control">
            </div></div>
            
        </div>
        
<div class="form-group">
    <div class="row">
            <div class="col-3">
                <label class="gfield_label" for="input_4_1">First Name<span class="gfield_required">*</span></label>
                <input name="first_name" id="input_4_1" type="text"  class="form-control" value="{{ isset($client) ? $client->first_name : ''}}"  maxlength="20" "1" placeholder="Your First Name" aria-required="true" aria-invalid="false"> 
            </div>
            <div class="col-3">
                <label class="gfield_label" for="input_4_1">Middle Name<span class="gfield_required"></span></label>
                <input name="middle_name" id="input_4_1" type="text"  class="form-control" value="{{ isset($client) ? $client->middle_name : ''}}"  maxlength="20" "1" placeholder="Middle Name" aria-invalid="false"> 
            </div>
            <div class="col-3">
                <label class="gfield_label" for="input_4_2">Last Name<span class="gfield_required">*</span></label>
                <input name="last_name" required id="input_4_2" type="text"  class="form-control" value="{{ isset($client) ? $client->last_name : ''}}"  "2" placeholder="Your Last Name" aria-required="true" aria-invalid="false">
            </div>
            <div class="col-3">
                <label class="gfield_label" for="input_4_2">Suffix<span class="gfield_required"></span></label>
                <input name="suffix" id="input_4_2" type="text"  class="form-control" value="{{ isset($client) ? $client->suffix : ''}}"  "2" placeholder="Suffix" aria-invalid="false">
            </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-4"><label for="maritial_status">Maritial Status</label>
            <select name="maritial_status" id="maritial_status" class="form-control">
                <option value="">Select One</option>
                <option value="single" {{ isset($client) ? ($client->maritial_status == 'single' ? 'selected="selected"' : '') : ''}}>single</option>
                <option value="married" {{ isset($client) ? ($client->maritial_status == 'married' ? 'selected="selected"' : '') : ''}}>married</option>
                <option value="widowed" {{ isset($client) ? ($client->maritial_status == 'widowed' ? 'selected="selected"' : '') : ''}}>widowed</option>
                <option value="separated" {{ isset($client) ? ($client->maritial_status == 'separated' ? 'selected="selected"' : '') : ''}}>separated</option>
                <option value="divorced" {{ isset($client) ? ($client->maritial_status == 'divorced' ? 'selected="selected"' : '') : ''}}>divorced</option>
                <option value="domestic" {{ isset($client) ? ($client->maritial_status == 'domestic' ? 'selected="selected"' : '') : ''}}>domestic partner</option>
                <option value="common_law" {{ isset($client) ? ($client->maritial_status == 'common_law' ? 'selected="selected"' : '') : ''}}>common law</option>
            </select>
        </div>
        <div class="col-4"><label for="race">Race</label>
            <select name="race" id="race" class="form-control">
                <option value="">Select One</option>
                <option value="african_american" {{ isset($client) ? ($client->race == 'african_american' ? 'selected="selected"' : '') : ''}}>African American</option>
                <option value="asian" {{ isset($client) ? ($client->race == 'asian' ? 'selected="selected"' : '') : ''}}>Asin</option>
                <option value="bi_racial" {{ isset($client) ? ($client->race == 'bi_racial' ? 'selected="selected"' : '') : ''}}>Bi-Racial</option>
                <option value="latino" {{ isset($client) ? ($client->race == 'latino' ? 'selected="selected"' : '') : ''}}>Latino</option>
                <option value="caucasian" {{ isset($client) ? ($client->race == 'caucasian' ? 'selected="selected"' : '') : ''}}>Caucasian</option>
                <option value="multi" {{ isset($client) ? ($client->race == 'multi' ? 'selected="selected"' : '') : ''}}>Multi-Racial</option>
                <option value="native_american" {{ isset($client) ? ($client->race == 'native_american' ? 'selected="selected"' : '') : ''}}>Native American</option>
                <option value="hawiian" {{ isset($client) ? ($client->race == 'hawiian' ? 'selected="selected"' : '') : ''}}>Hawiian/Pacific Outlander</option>
                <option value="other" {{ isset($client) ? ($client->race == 'other' ? 'selected="selected"' : '') : ''}}>Other</option>
            </select>
        </div>
        <div class="col-4"><label for="ethnicity">ethnicity</label>
            <select name="ethnicity" id="ethnicity" class="form-control">
                <option value="">Select One</option>
                <option value="hispanic" {{ isset($client) ? ($client->ethnicity == 'hispanic' ? 'selected="selected"' : '') : ''}}>Hispanic</option>
                <option value="non-hispanic" {{ isset($client) ? ($client->ethnicity == 'non-hispanic' ? 'selected="selected"' : '') : ''}}>Non-Hispanic</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-6"><label for="education">Highest Level of Education</label>
            <select name="education" id="education" class="form-control">
                <option value="">Select One</option>
                <option value="grade-school" {{ isset($client) ? ($client->education == 'grade-school' ? 'selected="selected"' : '') : ''}}>Grade School</option>
                <option value="some-high" {{ isset($client) ? ($client->education == 'some-high' ? 'selected="selected"' : '') : ''}}>Some High School</option>
                <option value="diploma" {{ isset($client) ? ($client->education == 'diploma' ? 'selected="selected"' : '') : ''}}>High School Diploma</option>
                <option value="high-school-equiv" {{ isset($client) ? ($client->education == 'high-school-equiv' ? 'selected="selected"' : '') : ''}}>High School Equivalent</option>
                <option value="associates" {{ isset($client) ? ($client->education == 'associates' ? 'selected="selected"' : '') : ''}}>Associates</option>
                <option value="bachelors" {{ isset($client) ? ($client->education == 'bachelors' ? 'selected="selected"' : '') : ''}}>Bachelors Degree</option>
                <option value="grad" {{ isset($client) ? ($client->education == 'grad' ? 'selected="selected"' : '') : ''}}>Grad School</option>
                <option value="trade" {{ isset($client) ? ($client->education == 'trade' ? 'selected="selected"' : '') : ''}}>Trade School</option>
            </select>
        </div>
        <div class="col-6"><label for="dob">DOB</label>
            <input type="date" name="dob" id="dob" value="{{ isset($client) ? $client->dob : ''}}" class="form-control">
                </div>
        
    </div>
</div>                  
<div class="form-group">
    <div class="row">
        <div class="col-12">
                <label for="input_4_14_1" id="input_4_14_1_label">Street Address</label>
                <input type="text"  class="form-control" name="street_address" id="input_4_14_1" value="{{ isset($client) ? $client->address_1 : ''}}" "22">                           
        </div>
        <div class="col-4">
                <label for="input_4_14_3" id="input_4_14_3_label">City</label>
                <input type="text"  class="form-control" name="city" id="input_4_14_3" value="{{ isset($client) ? $client->city : ''}}" "24">
                 
        </div>
        <div class="col-4">
                <label for="input_4_14_4" id="input_4_14_4_label">State / Province / Region</label>
                <input type="text" class="form-control" name="state" id="input_4_14_4" value="{{ isset($client) ? $client->state : 'NC'}}" "26">
        </div>
        <div class="col-4">
                <label for="input_4_14_5" id="input_4_14_5_label">ZIP / Postal Code</label>
                <input type="text"  class="form-control" name="zip" id="input_4_14_5" value="{{ isset($client) ? $client->zip : ''}}" "27">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-4">
            <label class="gfield_label" for="input_4_3">Primary Phone</label>
            <input name="primary_phone" id="input_4_3" type="tel"  class="form-control" value="{{ isset($client) ? $client->primary_phone : ''}}"  "3" placeholder="Primary Phone Number" aria-invalid="false">
        </div>
        <div class="col-4">
            <label class="gfield_label" for="input_4_4">Secondary Phone</label>
            <input name="secondary_phone" id="input_4_4" type="tel"  class="form-control" value="{{ isset($client) ? $client->secondary_phone : ''}}"  "4" placeholder="Secondary Phone Number" aria-invalid="false">

        </div>
        <div class="col-4">
            <label class="gfield_label" for="input_4_4">Email Address</label>
            <input name="email" id="input_4_4" type="email" validate="email"  class="form-control" value="{{ isset($client) ? $client->email_address : ''}}"  "4" placeholder="Email Address" aria-invalid="false">
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-4">
            <label class="gfield_label" for="input_4_5">Citizenship Status<span class="gfield_required">*</span></label>
            <select class="form-control" name="citizenship" id="input_4_5" class="medium gfield_select" "5" aria-required="true" aria-invalid="false">
                <option value="" class="gf_placeholder">Your citizenship Status</option>
                <option value="US Citizen" {{ isset($client) ? ($client->citizenship == 'US Citizen' ? 'selected="selected"' : '') : ''}}>US Citizen</option>
                <option value="Registered Alien" {{ isset($client) ? ($client->citizenship == 'Registered Alien' ? 'selected="selected"' : '') : ''}}>Registered Alien</option>
                <option value="Veteran" {{ isset($client) ? ($client->citizenship == 'Veteran' ? 'selected="selected"' : '') : ''}}>Veteran</option>
            </select>
        </div>
        <div class="col-4">
            <label class="gfield_label" for="input_4_6">What Forms of ID do you posess?<span class="gfield_required">*</span><br /> <small><em>Hold Control Key and Click to Select Multiple</em></small></label>
            <select multiple class="form-control" name="form_of_id[]" id="input_4_6" class="medium gfield_select" "6" aria-required="true" aria-invalid="false">
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
                <option value="F" {{ isset($client) ? ($client->sex == 'TMF' ? 'selected="selected"' : '') : ''}}>Trans Male-Female</option>
                <option value="F" {{ isset($client) ? ($client->sex == 'TFM' ? 'selected="selected"' : '') : ''}}>Trans Female-Male</option>
                <option value="O" {{ isset($client) ? ($client->sex == 'O' ? 'selected="selected"' : '') : ''}}>Prefer Not To Disclose</option>
            </select>
        </div>
    </div>
</div>      

            <label for="input_4_14_5" id="input_4_14_5_label">Release Date *</label>
            <input type="date" class="form-control" name="release_date" id="input_4_14_5" value="{{ isset($client) ? $client->release_date : ''}}" "27">
            <label for="released_from">Released From</label>
            <select name="released_from" id="released_from" class="form-control">
                <option value="no-jail-time" {{ isset($client) ? ($client->released_from == 'no-jail-time' ? 'selected="selected"' : '') : ''}}>No Jail Time</option>
                <option value="ncdps-prison" {{ isset($client) ? ($client->released_from == 'ncdps-prison' ? 'selected="selected"' : '') : ''}}>NCDPS Prison</option>
                <option value="ncdps-parole" {{ isset($client) ? ($client->released_from == 'ncdps-parole' ? 'selected="selected"' : '') : ''}}>NCDPS Parole</option>
                <option value="county-jail" {{ isset($client) ? ($client->released_from == 'county-jail' ? 'selected="selected"' : '') : ''}}>County Jail</option>
                <option value="another-state" {{ isset($client) ? ($client->released_from == 'another-state' ? 'selected="selected"' : '') : ''}}>Another State</option>
                <option value="community-agency" {{ isset($client) ? ($client->released_from == 'community-agency' ? 'selected="selected"' : '') : ''}}>Community Agency</option>
                <option value="self" {{ isset($client) ? ($client->released_from == 'self' ? 'selected="selected"' : '') : ''}}>Self Referral</option>
                <option value="relative" {{ isset($client) ? ($client->released_from == 'relative' ? 'selected="selected"' : '') : ''}}>Relative</option>
            </select>
            <label for="under_supervision">Under Supervision</label><input type="checkbox" name="under_supervision" id="under_supervision" {{ isset($client) ? ($client->under_supervision == 'on' ? 'checked="checked"' : '') : ''}}>
            <div class="row">
                <div class="col-3">
                    <label for="supervisor-name">Supervisors Name</label>
                    <input type="text" name="supervisors_name" value="{{ isset($client) ? $client->supervisors_name : ''}}" id="supervisors-name" class="form-control">
                </div>
                <div class="col-3">
                    <label for="supervisors-phone">Phone</label>
                    <input type="text" name="supervisors_phone" value="{{ isset($client) ? $client->supervisors_phone : ''}}" id="supervisors-phone" class="form-control">
                </div>
                <div class="col-3">
                    <label for="supervisors-email">Email</label>
                    <input type="email" name="supervisors_email" value="{{ isset($client) ? $client->supervisors_email : ''}}" id="supervisors-email" class="form-control">
                </div>
                <div class="col-3">
                    <label for="supervisors-end-date">Supervisor End Date</label>
                    <input type="date" name="supervisors_end_date" value="{{ isset($client) ? $client->supervisors_end_date : ''}}" id="supervisors-end-date" class="form-control">
                </div>
                            
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="supervision-level">Supervision Level</label>
                    <select name="supervision_level" id="supervision-level" class="form-control">
                        <option value="">Select</option>
                        <option value="l1" {{ isset($client) ? ($client->supervision_level == 'l1' ? 'selected="selected"' : '') : ''}}>L1</option>
                        <option value="l2" {{ isset($client) ? ($client->supervision_level == 'l2' ? 'selected="selected"' : '') : ''}}>L2</option>
                        <option value="l3" {{ isset($client) ? ($client->supervision_level == 'l3' ? 'selected="selected"' : '') : ''}}>L3</option>
                        <option value="unknown" {{ isset($client) ? ($client->supervision_level == 'unknown' ? 'selected="selected"' : '') : ''}}>Unknown</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="sex-offender">Sex Offender</label>
                    <select name="sex_offender" id="sex-offender" class="form-control">
                        <option value="no" {{ isset($client) ? ($client->sex_offender == 'no' ? 'selected="selected"' : '') : ''}}>No</option>
                        <option value="yes" {{ isset($client) ? ($client->sex_offender == 'yes' ? 'selected="selected"' : '') : ''}}>Yes</option>
                    </select>
                    <input type="text" name="county_registered" id="county-registerd" value="{{ isset($client) ? $client->county_registered : ''}}" placeholder="If So What County" class="form-control">
                </div>
            </div>
            
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
       <button class="btn btn-lg btn-primary" type="submit" value="add" name="add">{{ !isset($client) ? "Add A New Client" : 'Update ' .$client->last_name. ', ' .$client->first_name}}</button>
       <button class="btn btn-lg btn-primary" type="submit" value="add-new" name="add">{{ !isset($client) ? "Add A New Client" : 'Update ' .$client->last_name. ', ' .$client->first_name}} And Create New </button>
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
