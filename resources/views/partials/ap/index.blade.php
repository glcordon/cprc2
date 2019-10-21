@extends('layouts.app')

@section('content1')

<div style="text-align:center">
    <strong>Transition/Reentry Support Form</strong><br>						
    Eastern Carolina Council of Government	<br>							
    Invoice # 402.{{ Carbon\Carbon::now()->year }}.{{ Carbon\Carbon::now()->month }}	<br>						
    {{ Carbon\Carbon::parse(now())->startOfMonth()->format('m/d/Y') }} - {{ Carbon\Carbon::parse(now())->endOfMonth()->format('m/d/Y')  }}<br>
    <br>
</div>

@foreach($clientData as $client)
{{ $client['first'] }}, {{ $client['last'] }} <br /> 
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
            <td colspan="4"><button id="updateClient" service-id="{{ $cs['pivot']['service_id'] }}" data-id="{{ $cs['pivot']['id']}}">Update</button></td>
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
    });
</script>
@endpush