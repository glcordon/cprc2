@foreach($clientData as $client)
{{ $client['first'] }}, {{ $client['last'] }} <br /> {{ $client['service'] }} <hr>
@endforeach