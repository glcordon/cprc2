@foreach($clientData as $client)
{{ $client['first'] }}, {{ $client['last'] }} <br /> 
@foreach($client['service'] as $cs)
    {{ $cs['service_name'] }}
    <div class="form-group">
      <label for="">$</label>
      <input type="text"
        class="form-control" name="authorized_price" id="authorized_price" value="{{ $cs['pivot']['authorized_price'] ?? '0.00'}}" aria-describedby="helpId" placeholder="">
    </div>
    {{ $cs['pivot']['date_authorized'] ?? 'Not Authorized' }}<br /> 
@endforeach
<hr>
@endforeach