@foreach($clientData as $client)
{{ $client['first'] }}, {{ $client['last'] }} <br /> 
@foreach($client['service'] as $cs)
    {{ $cs['service_name'] }} -
    {{ $cs['service_price'] }} -
   {{ $cs['pivot']['updated_at'] }}<br /> 
@endforeach
<hr>
@endforeach