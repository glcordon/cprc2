@extends('layouts.app')

@section('content1')

     <div class="container">
       <div class="row" style="margin-top:4.5em">

         <h1>List all Clients <small><em>({{ $clients->count() }})</em></small></h1>
            @if($clients->count() == 0)
            <div class="col-md-12">No Clients To List </div> 
            @endif
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Client Name</th>
                        <th>Services</th>
                        <th>Assigned To</th>
                        <th>Date Assigned</th>
                        <th><a href="/client-add" class="btn btn-primary">Add New</a> </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{ $client->last_name ?? ''}}, {{ $client->first_name ?? ''}}</td>
                            <td>
                                {{-- {{ dump($client->services) }} --}}
                                @if(isset($client->services))
                                    @foreach ($client->services as $service)
                                        <small><em>{{ $service->service_name }}</em></small><br />
                                    @endforeach
                                @endif

                            </td>
                            <td>{{ $client->assignedTo->name ?? ''}}
                                {{--  @if(!$client->assignedTo)
                                    <a href="#" id="assign_caseworker" class="btn btn-default">Assign Case Worker</a>
                                @endif  --}}
                            </td>
                            <td>{{ $client->assignedTo->updated_at ?? '' }}</td>
                            <td>
                                    <button class="btn btn-default"> View Profile</button>
                                    <a href="/client/contact/{{ $client->id }}" class="btn-success btn">Touch</a>
                                    {{--  <button class="btn btn-primary"> View Notes</button>  --}}
                                    <a href="/delete-client/{{ $client->id }}" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"><strong> X </strong></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">{{ $clients->links() }}</td>
                    </tr>
                </tfoot>
            </table>
  
</div>

     </div>

   </div>

@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('.btn-danger').on('click', function(){
            e.preventDefault();
            if(confirm('Are You Sure') !== true)
            {
                return false;
            }else{
                $(this).parent().parent().fadeOut();
                
                return true;
            }
        })
        $('#assign_caseworker').on('click', function(){
            
        });
    });
</script>
@endpush

<b></b>
