@foreach($clientData as $client)
{{ $client['first'] }}, {{ $client['last'] }} <br /> 
@foreach($client['service'] as $cs)
    {{ $cs['service_name'] }}
    ${{ $cs['pivot']['authorized_price'] ?? '0.00'}}<br /> 
    {{ $cs['pivot']['date_authorized'] ?? 'Not Authorized' }}<br /> 
    {{ $cs['pivot']['notes']  ?? 'No Notes'}}<br /> 
@endforeach
<hr>
@endforeach