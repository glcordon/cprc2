@foreach($clientData as $client)
{{ $client['first'] }}, {{ $client['last'] }} <br /> 
@foreach($client['service'] as $cs)
    {{ $cs['service_name'] }} 
    @foreach($cs['pivot'] as $piv)
        {{ dump($piv) }}<br />
    @endforeach
@endforeach
<hr>
@endforeach