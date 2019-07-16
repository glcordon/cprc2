@extends('layouts.app')

@section('content1')
<style>
        .round { border-radius: 50%; margin:20px auto}
        ul.timeline {
            list-style-type: none;
            position: relative;
        }
        h2{font-size:1.1em; text-decoration: underline; text-transform:uppercase; display: inline-block; margin-right: 5px}
        ul.timeline:before {
            content: ' ';
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }
        ul.timeline > li {
            margin: 20px 0;
            padding-left: 20px;
        }
        ul.timeline > li:before {
            content: ' ';
            background: white;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid #22c0e8;
            left: 20px;
            width: 20px;
            height: 20px;
            z-index: 400;
        }
        a#title_type
        {
            font-size:18px;
            text-transform:uppercase;
            text-decoration: underline;
            font-weight: 700;
        }
</style>
   <div class="album text-muted">

     <div class="container">
       <div class="row" style="margin-top:4.5em">
    <div class="card-column col-3">
        <div class="card">
         <img class="round" width="150" height="150" avatar="{{ $clients->first_name ?? ''}} {{ $clients->last_name ?? ''}}">
         <a href="/client/{{ $clients->id }}/edit" class="btn btn-default">Edit/View</a>
        <div class="card-title success"><h1>{{ $clients->last_name ?? ''}}, {{ $clients->first_name ?? ''}}</h1></div>
        <div class="card-body">
            <div class="card-text"> 
                    {{ $clients->address_1 }} <br>
                    {{ $clients->city }}, {{ $clients->state }}, {{ $clients->zip }} <br>
                    <a href="tel:{{ $clients->primary_phone }}">{{ $clients->primary_phone }}</a><br />
                    <a href="mailTo:{{ $clients->email }}">{{ $clients->email }}</a>
                    <small><em>Created: {{ $clients->updated_at->toDateTimeString() }}</em></small>
                
            </div>
            <div class="card-footer">
                
            </div>
        </div>
        </div>
        </div>
        <div class="card-column col-9">
        <div class="col-12 card padding-bottom-3">
            <div class="card-title"><h3>Services</h3>
            @foreach($services as $srv)
            {{ $srv['service_name'] ?? '' }}, 
            @endforeach
            </div>
            <div class="row">
                <div class="col-6">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Add New Touch Point
                        </button>   
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addJobModal">
                                Add Job Data
                            </button>            
                </div>
                <div class="col-6">Last Contact: @if($last_contact !=''){{ $last_contact->toDateTimeString() ?? '' }}@endif</div>
                <div class="touchpoint col-12"></div>
                <div class="col-12">
                        <div class="container mt-5 mb-5">
                              
                                        <h4>Timeline</h4>
                                        <ul class="timeline">
                                            @foreach($notes as $note)
                                            <li>
                                                <a id="title_type" target="_blank" href="#">{{ $note->contact_type ?? '' }}</a>
                                                <a href="#" class="float-right">{{ \Carbon\Carbon::parse($note->note_date)->toDateTimeString() }}</a>
                                                <p>{!! $note->note !!}</p>
                                            </li>
                                           @endforeach
                                           <li>
                                                <a id="title_type" target="_blank" href="#">User Created </a>
                                                <a href="#" class="float-right">{{ $clients->updated_at->toDateTimeString()}}</a>
                                                
                                            </li>
                                        </ul> 
                            </div>
                </div>
                </div>
            </div>
                 
            <br>
            
        </div>
    </div>
   
        </div>

     </div>

   </div> 
@push('modals')
<!-- Modal Add Service-->
<div class="modal fade" id="serviceModal" tabindex="-1" role="dialog" aria-labelledby="serviceModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Service</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="client_id" id="client_id" value="{{ $clients->id }}">
        <select name="service_name" id="service_name" class="form-control">
            <option value="">Add A Service To Add</option>
           
            @foreach($otherServices as $service)
            
            <option value="{{ $service['id'] }}">{{ $service['service_name'] }}</option>
            @endforeach
        </select><br>
        {{--  <input type="number" id="service_duration" name="service_duration" class="form-control" placeholder="Service duration in days"><br>  --}}
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveService" data-dismiss="modal"  data-target="#exampleModal">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal referral Service-->
<div class="modal fade" id="addReferral" tabindex="-1" role="dialog" aria-labelledby="serviceModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Referral</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="client_id" id="client_id" value="{{ $clients->id }}">
        <select name="service_name" id="service_name" class="form-control">
            <option value="">Select A Service</option>
           
            @foreach($otherServices as $service)
            
            <option value="{{ $service['id'] }}">{{ $service['service_name'] }}</option>
            @endforeach
        </select><br>
        {{--  <input type="number" id="service_duration" name="service_duration" class="form-control" placeholder="Service duration in days"><br>  --}}
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveService" data-dismiss="modal"  data-target="#exampleModal">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal referral Service-->
<div class="modal fade" id="addJobModal" tabindex="-1" role="dialog" aria-labelledby="addJobModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Job Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="client_id" id="client_id" value="{{ $clients->id }}">
        <select name="job_salary" id="job_salary" class="form-control">
            <option value="">Select A Salary Range</option>
            <option value="min">Minimum Wage</option>
            <option value="minTo8">Up to $8.99</option>
            <option value="upTo10">Up to $10.00</option>
            <option value="over10">Over $10.00</option>
        </select><br>
        Start Date: <br>
        <input type="date" name="job_start_date" id="job_start_date" class="form-control" placeholder="Enter Start Date">
        {{--  <input type="number" id="service_duration" name="service_duration" class="form-control" placeholder="Service duration in days"><br>  --}}
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="saveJobData" data-dismiss="modal"  data-target="#exampleModal">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Touchpoint-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Touch Point</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="hidden" name="client_id" id="client_id" value="{{ $clients->id }}">
        <input type="text" id="input_title" name="contact_type" class="form-control" placeholder="Touchpoint Title"><br>
        <select name="type" id="input_type" class="form-control">
            <option value="">Select Contact Type</option>
            <option value="Phone Call">Phone</option>
            <option value="Email">Email</option>
            <option value="In Person">In Person</option>
            <option value="By Mail">By Mail</option>
            <option value="Other Contact">Other - Leave Details In Note</option>
        </select>
        <label for="note_date">Date of Service</label>
        <input type="date" name="note_date" id="note_date" class="form-control" required value="{{ \Carbon\Carbon::now() ?? '' }}">
        <input type="number" min="0" max="12" placeholder="Hr" id="hr" name="hr">:<input type="number" min="0" max="59" id="min" value="00"  placeholder="Min" name="min"><select name="am_pm" id="am_pm"><option value="">AM</option><option value="pm">PM</option></select>
        <a href="#" class="btn btn-sm btn-default" data-dismiss="modal" data-toggle="modal" data-target="#serviceModal">Add New Service</a>
        <select name="service_id" id="service_id" class="form-control" style="margin-bottom:10px;" required="required">
            <option value="">Select A Service</option>
            @foreach($services as $srv)
                <option value="{{ $srv['id'] }}">{{ $srv['service_name'] ?? '' }}</option>
            @endforeach
            
        </select>
        <textarea name="note" id="note" cols="30" rows="10" class="form-control" placeholder="Enter Notes"></textarea>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endpush
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('.btn-danger').on('click', function(){
            e.preventDefault();
            if(confirm('Are You Sure') !== true)
            {
                return false;
            }else{
                $(this).parent().parent().fadeOut();
                
                return true;
            }
        });
        $(document).on('click','#save', function(e){
            let card = '<div class="card col-12">'+$('#input_type').val()+'</div>'
            var note = $('#note').val();
            var title = $('#input_title').val();
            var type = $('#input_type').val();
            var token = "{{ @csrf_token() }}";
            var client_id = $('#client_id').val();
            var service_id = $('#service_id').val();
            var note_date = $('#note_date').val();
            var hr =  $('#hr').val();
            var min =  $('#min').val();
            var am_pm =  $('#am_pm').val();
            
            $.ajax({
                method: "POST",
                url: "/add-note",
                data: { hr: hr, min:min, am_pm:am_pm, note_date: note_date, note: note, type: type, _token: token, service_id: service_id, title: title, client_id: client_id },
              })
              .done(function(data){
                console.log(data);
                $('.timeline').prepend('<li><a id="title_type" target="_blank" href="#">'+type+' </a><a href="#" class="float-right">' +note_date +'</a><p>'+note+'</p></li>');
              });
                //.done(function() {
                 // alert( "Data Saved: ");
               // });
        });

        $('#saveService').on('click', function(e){
            e.preventDefault();
            let service_id = $('select#service_name').val();
            var service_name = $('select#service_name  option:selected').text();
            var token = "{{ @csrf_token() }}";
            var client_id = $('#client_id').val();
            $.ajax({
                method: "POST",
                url: "/add-service",
                data: { _token:token, service_id: service_id, client_id: client_id}
              })
              .done(function(data){
                console.log(data);
                $('select#service_name  option:selected').hide();
                $('select#service_id').append('<option value="'+service_id+'">'+service_name+'</option>');
                // $('.timeline').prepend('<li><a id="title_type" target="_blank" href="#">'+type+'</a><a href="#" class="float-right">Now</a><p>'+note+'</p></li>');
              });
            
        });
        $('#saveJobData').on('click', function(e){
            e.preventDefault();
            let service_id = $('select#service_name').val();
            var service_name = $('select#service_name  option:selected').text();
            var token = "{{ @csrf_token() }}";
            var client_id = $('#client_id').val();
            $.ajax({
                method: "POST",
                url: "/add-service",
                data: { _token:token, service_id: service_id, client_id: client_id}
              })
              .done(function(data){
                console.log(data);
                $('select#service_name  option:selected').hide();
                $('select#service_id').append('<option value="'+service_id+'">'+service_name+'</option>');
                // $('.timeline').prepend('<li><a id="title_type" target="_blank" href="#">'+type+'</a><a href="#" class="float-right">Now</a><p>'+note+'</p></li>');
              });
            
        });
    });

      //  });
    
</script>
@endpush

<b></b>
