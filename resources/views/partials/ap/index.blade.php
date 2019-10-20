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
<table class="table table-striped">
@foreach($client['service'] as $cs)
    
        <tr>
            <td>{{ $cs['service_name'] }}</td>
            <td><label for="">$</label>
                <input type="text"
                class="form-control" name="authorized_price" id="authorized_price" value="{{ $cs['pivot']['authorized_price'] ?? '0.00'}}" aria-describedby="helpId" placeholder="">
            </td>
            <td><label for="">Date Authorized</label>
                <input type="date"
                    class="form-control" name="date_authorized" id="date_authorized" value="{{ $cs['pivot']['date_authorized'] ?? 'Not Authorized' }}" aria-describedby="helpId" placeholder="">
            </td>
            <td colspan="4"><button id="updateClient" data-id="{{ $client['id']}}">Update</button></td>
        </tr>
    
      
@endforeach
<tr></tr>
</table>
<hr>
@endforeach
@endsection