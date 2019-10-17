@foreach($clientData as $client)
{{ $client['first'] }}, {{ $client['last'] }} <br /> 
@foreach($client['service'] as $cs)
    {{ $cs['service_name'] }} 
    @foreach($cs['pivot'] as $piv)
        {{ $piv['created_at'] }}
    @endforeach
@endforeach
<hr>
@endforeach