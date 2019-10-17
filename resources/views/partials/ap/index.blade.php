@foreach($clientData as $client)
{{ $client['first'] }}, {{ $client['last'] }} <br /> 
@foreach($client['service'] as $cs)
    {{ $cs->service_name }} <hr>
    {{ $cs->pivot }}
@endforeach
<hr>
@endforeach