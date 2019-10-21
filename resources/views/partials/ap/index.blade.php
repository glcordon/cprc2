@extends('layouts.app')

@section('content1')
<br>
<br>
<br>
<div style="text-align:center">
    <form action="/ap/get-month" method="post">
        @csrf
        <select name="searchMonth" id="Search Month">
            <option value="">Select Month</option>
            <option value="1">Jan</option>
            <option value="2">Feb</option>
            <option value="3">Mar</option>
            <option value="4">Apr</option>
            <option value="5">May</option>
            <option value="6">Jun</option>
            <option value="7">Jul</option>
            <option value="8">Aug</option>
            <option value="9">Sep</option>
            <option value="10">Oct</option>
            <option value="11">Nov</option>
            <option value="12">Dec</option>
        </select>
        <button type="submit">Switch Month</button>
    </form>
    <strong>Transition/Reentry Support Form</strong><br>						
    Eastern Carolina Council of Government	<br>							
    Invoice # 402.{{ Carbon\Carbon::now()->year }}.{{ Carbon\Carbon::now()->month }}	<br>						
    {{ Carbon\Carbon::create()->month($thisDate)->startOfMonth()->format('m/d/Y') }} - {{ Carbon\Carbon::create()->month($thisDate)->endOfMonth()->format('m/d/Y')  }}<br>
    <br>
</div>
<button class="btn-raised mr-0">Export</button>
@foreach($clientData as $client)
<h4>{{ $client['first'] }}, {{ $client['last'] }}</h4>
<table class="table table-sm table-striped">
@foreach($client['service'] as $cs)
    
        <tr>
            <td>{{ $cs['service_name'] }}</td>
            <td><label for="">$</label>
                <input type="text" name="authorized_price" id="authorized_price" value="{{ $cs['pivot']['authorized_price'] ?? '0.00'}}" aria-describedby="helpId" placeholder="">
            </td>
            <td><label for="">Date Authorized</label>
                <input type="date" name="date_authorized" id="date_authorized" value="{{ $cs['pivot']['date_authorized'] ?? 'Not Authorized' }}" aria-describedby="helpId" placeholder="">
            </td>
            <td colspan="4">
                <button id="updateClient" service-id="{{ $cs['pivot']['service_id'] }}" data-id="{{ $cs['pivot']['id']}}" class="mr-1 btn btn-primary btn-sm">Update</button>
                <button data-id="{{ $cs['pivot']['id']}}" id="deleteThis" class="btn btn-sm btn-danger">X</button>
            </td>
        </tr>
    
      
@endforeach
<tr></tr>
</table>
<hr>
@endforeach
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $(document).on('click','#updateClient', function(){
            let pivot_id = $(this).attr('data-id')
            let service_id = $(this).attr('service-id')
            var authorized_price = $(this).parent().parent().find('#authorized_price').val()
            var date_authorized = $(this).parent().parent().find('#date_authorized').val()
            var token = "{{ @csrf_token() }}"
            axios.post('/ap/update-service', {
                _token:token,
                pivot_id: pivot_id,
                service_id: service_id,
                authorized_price:authorized_price,
                date_authorized:date_authorized,
            })
            .then(response =>{
                console.log(response.data)
            })
        })
        $(document).on('click', '#deleteThis', function(){
            let id = $(this).attr('data-id')
            axios.get('/ap/'+id+'/delete/')
            .then(response =>{
                $(this).parent().parent().fadeOut()
            })
        })
    });
</script>
@endpush