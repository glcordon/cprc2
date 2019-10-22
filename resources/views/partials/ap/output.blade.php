<div style="text-align:center">
    <strong>Transition/Reentry Support Form</strong><br>						
    Eastern Carolina Council of Government	<br>							
    Invoice # 402.{{ Carbon\Carbon::now()->year }}.{{ Carbon\Carbon::now()->month }}	<br>						
    1/1/19-1/31/19<br>
    <br>
</div>
<table style="margin:0 auto; width:75%">
    <thead>
        <th style="border:1px solid black; padding:10px;">Client's Name</th>
        <th style="border:1px solid black; padding:10px;" colspan="2">Contract Services</th>
        <th style="border:1px solid black; padding:10px;" colspan="2">Supplies</th>
        <th style="border:1px solid black; padding:10px;" colspan="2">Training</th>
        <th style="border:1px solid black; padding:10px;">Other</th>
        <th style="border:1px solid black; padding:10px;">TOTAL</th>
    </thead>
    <tbody>
        <tr>
            <td>Total</td>
            <td>$Amount</td>
            <td>Code</td>
            <td>$Amount</td>
            <td>Code</td>
            <td>$Amount</td>
            <td>Code</td>
            <td>$Amount</td>
            <td>Total</td>
        </tr>
        @foreach($clientData as $client)
            @foreach($client['service'] as $cs)
        <tr>
            @dump($client)
            <td>{{ $client['last'] }}, {{ $client['first'] }}</td>
            <td> 

            </td>
            <td> {{ $cs['short_code'] ?? ''}}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
            @endforeach
        @endforeach
    </tbody>
</table>

    {{--  {{ $cs['service_name'] }} 
    <div class="form-group">
      <label for="">$</label>
      <input type="text"
        class="form-control" name="authorized_price" id="authorized_price" value="{{ $cs['pivot']['authorized_price'] ?? '0.00'}}" aria-describedby="helpId" placeholder="">
    </div>
    <div class="form-group">
      <label for="">Date Authorized</label>
      <input type="date"
        class="form-control" name="date_authorized" id="date_authorized" value="{{ $cs['pivot']['date_authorized'] ?? 'Not Authorized' }}" aria-describedby="helpId" placeholder="">
    </div>

<hr> --}}
