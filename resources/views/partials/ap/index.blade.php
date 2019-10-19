@foreach($clientData as $client)
{{ $client['first'] }}, {{ $client['last'] }} <br /> 
@foreach($client['service'] as $cs)
    {{ $cs['service_name'] }}
    ${{ $cs['pivot']['authorized_price'] ?? ''}}<br /> 
    {{ $cs['pivot']['date_authorized'] ?? '' }}<br /> 
    {{ $cs['pivot']['notes']  ?? ''}}<br /> 
@endforeach
<hr>
@endforeach