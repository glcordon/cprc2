@foreach($clientData as $client)
{{ $client['first'] }}, {{ $client['last'] }} <br /> 
@foreach($client['service'] as $cs)
    {{ $cs['service_name'] }} 
   {{ $cs['pivot']['updated_at'] }}
@endforeach
<hr>
@endforeach