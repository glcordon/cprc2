<div style="text-align:center">
    <strong>Transition/Reentry Support Form</strong><br>						
    Eastern Carolina Council of Government	<br>							
    Invoice # 402.{{ Carbon\Carbon::now()->year }}.{{ Carbon\Carbon::now()->month }}	<br>						
    1/1/19-1/31/19<br>
    <br>
</div>
<table>
    <thead>
        <th>Client's Name</th>
        <th colspan="2">Contract Services</th>
        <th colspan="2">Supplies</th>
        <th colspan="2">Training</th>
        <th>Other</th>
        <th>TOTAL</th>
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
            <td>{{ $client['last'] }}, {{ $client['first'] }}</td>
            <td>{{ $cs['pivot']['authorized_price'] ?? '0.00'}}</td>
            <td>{{ $cs['short_code'] ?? ''}}</td>
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
