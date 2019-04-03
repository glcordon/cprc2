@extends('layouts.app')

@section('content1')

     <div class="container">
       <div class="row" style="margin-top:4.5em">

         <h1>List all Clients <small><em>({{ $clients->count() }})</em></small></h1>
            @if($clients->count() == 0)
            <div class="col-md-12">No Clients To List </div> 
            @endif
       </div>
            <div class="row">
                <div class="col-12">
                    <a href="/client">View All Active<a> | <a href="/client/inactive">View all Inactive Clients</a>
                </div>
            <div class="col-12">
                    <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Services</th>
                                    <th>Assigned To</th>
                                    <th>Date Enrolled</th>
                                    <th>Last Contact</th>
                                    <th>Status</th>
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
                                        <td>{{ $client->assignedTo->name ?? 'Not Assigned'}}<br />
                                            {{--  @if(!$client->assignedTo)
                                                <a href="#" id="assign_caseworker" class="btn btn-default">Assign Case Worker</a>
                                            @endif  --}}
                                        </td>
                                        <td>                                            
                                            {{ $client->enrollment_date ?? ' - ' }}
                                        </td>
                                        <td>{{ $client->notes->first()->created_at ?? '' }}</td>
                                        <td>{{ $client->status }}</td>
                                        <td><a href="/client/contact/{{ $client->id }}" class="btn-success btn">Touch</a>
                                                
                                                <a href="/client/{{ $client->id }}/edit" class="btn btn-primary">Edit</a>
                                                {{--  <button class="btn btn-primary"> View Notes</button>  --}}
                                                <a href="/delete-client/{{ $client->id }}" id="delete" class="btn btn-danger"> <span class="glyphicon glyphicon-remove"><strong> X </strong></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                </tr>
                            </tfoot>
                        </table>
            </div>
           
  
</div>

     </div>

   </div>
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
        $('.table').DataTable();
        $('.btn-danger').on('click', function(e){
            if(confirm('Are You Sure') == false)
            {
                return false;
            }else{
                $(this).parent().parent().fadeOut();
                
                return true;
            }
        });
    });
</script>
@endpush

<b></b>
