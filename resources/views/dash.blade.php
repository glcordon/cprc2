@extends('layouts.app')
<style>
		.card-counter{
			box-shadow: 2px 2px 10px #DADADA;
			margin: 5px;
			padding: 20px 10px;
			background-color: #fff;
			height: 190px;
			border-radius: 5px;
			transition: .3s linear all;
		  }
		
		  .card-counter:hover{
			box-shadow: 4px 4px 20px #DADADA;
			transition: .3s linear all;
		  }
		
		  .card-counter.primary{
			background-color: #007bff;
			color: #FFF;
		  }
		
		  .card-counter.danger{
			background-color: #ef5350;
			color: #FFF;
		  }  
		
		  .card-counter.success{
			background-color: #66bb6a;
			color: #FFF;
		  }  
		
		  .card-counter.info{
			background-color: #26c6da;
			color: #FFF;
		  }  
		
		  .card-counter i{
			font-size: 5em;
			opacity: 0.2;
		  }
		
		  .card-counter .count-numbers{
			position: absolute;
			right: 35px;
			top: 20px;
			font-size: 6em;
			display: block;
		  }
		
		  .card-counter .count-name{
			position: absolute;
			right: 35px;
			top: 145px;
			font-style: italic;
			text-transform: capitalize;
			opacity: 0.5;
			display: block;
			font-size: 18px;
		  }
		  .row{
			  border-top:1px solid #ccc;
			  border-bottom:1px solid #ccc;
				padding:10px 0;
		  }
</style>
@section('content1')
<div class="container">
	<div class="row" style="margin-top:2.5em">
		<div class="col-12">
			<h1>
				Current Activity Summary for This Month
			</h1>
		</div>
	</div>
	{{--  <div class="row">
		
		<div class="col-md-12">
			<div class="card-counter primary">
				<i class="fa fa-code-fork"></i>
				<span class="count-numbers">{{ count($myCaseload) }}</span>
				<span class="count-name"><a class="nav-link" style="color:white" href="/client/{{ \Auth::user()->id }}/my">My Active Caseload</a></span>
			</div>
		</div>
	</div>  --}}
	<div class="row">
		<div class="col-md-6">
			<div class="card-counter primary">
				<i class="fa fa-code-fork"></i>
				<span class="count-numbers">{{ count($all) }}</span>
				<span class="count-name">Enrolled This Month</span>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="card-counter success">
				<i class="fa fa-database"></i>
				<span class="count-numbers">{{ $totalActive }}</span>
				<span class="count-name">Currently Active</span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<h3> Active Ex-Offender Age Demographics: </h3>
		</div>
			<div class="col-md-6">
				<div class="card-counter primary">
				  <i class="fa fa-hashtag"></i>
				  <span class="count-numbers">{{ $under25 }}</span>
				  <span class="count-name">Ex-Offenders 25 and Under</span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card-counter primary">
				  <i class="fa fa-hashtag"></i>
				  <span class="count-numbers">{{ $between28and35 }}</span>
				  <span class="count-name">Ex-Offenders betwen 26 and 35 </span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card-counter primary">
				  <i class="fa fa-hashtag"></i>
				  <span class="count-numbers">{{  $between36and50  }}</span>
				  <span class="count-name">Ex-Offenders betwen 36 and 50  </span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card-counter primary">
				  <i class="fa fa-hashtag"></i>
				  <span class="count-numbers">{{ $over50 }}</span>
				  <span class="count-name">Ex-Offenders over 50  </span>
				</div>
			</div>
		
	</div>
	
	<div class="row">
				<div class="col-8">
						<h3>Number of clients that received supportive services:</h3>
				</div>
				<div class="col-4">
		
				</div>
			</div>
					@foreach($service->sortBy('service_name')->chunk(3) as $chunk)
						<div class="row">
						@foreach($chunk as $serv)
						<div class="col-md-4">
								<div class="card-counter info">
								  <i class="fa fa-database"></i>
								  <span class="count-numbers">{{ $serviceCount[$serv->service_name] ?? '0' }}</span>
								  <span class="count-name">{{ $serv->service_name }}</span>
								</div>
							  </div>
							
						@endforeach
						</div>
					@endforeach
					
					<div class="row">
						<div class="col-4">
								<h5>Employment: Hourly Wage Ranges</h5>
						</div>
						<div class="col-8">
				
						</div>
					</div>
					<div class="row" style="background-color:#eee; color:black; padding:20px">
						<div class="col-2" style="text-align:right">
							Min Wage
						</div>
						<div class="col-1" style="border:1px solid black;padding-top:9px">
							{{ $jobCount['min'] ?? 0 }}
						</div>
						<div class="col-2" style="text-align:right">
							Min Wage - $8.00
						</div>
						<div class="col-1" style="border:1px solid black;padding-top:9px">
							{{ $jobCount['minTo8'] ?? 0 }}
						</div>
						<div class="col-2" style="text-align:right">
							$9.01 - $10.00 
						</div>
						<div class="col-1" style="border:1px solid black;padding-top:9px">
							{{ $jobCount['minTo10'] ?? 0 }}
						</div>
						<div class="col-2" style="text-align:right">
							$10.00+
						</div>
						<div class="col-1" style="border:1px solid black;padding-top:9px">
							{{ $jobCount['over10'] ?? 0 }}
						</div>
					</div>
					<div class="row">
						<h5>Housing: Type</h5>
					</div>
					<div class="row" style="background-color:#ccc color:black; padding:20px;">

						@foreach($service->sortBy('service_name') as $serv)
							@if(strpos($serv->service_name,'Housing') === 0)
								<div class="col-2" style="text-align:right">{{ $serv->service_name }}</div>
								<div style="border:1px solid black"  class="col-2">{{ $serv->client()->count() }}</div>
							@endif
						
					@endforeach
					</div>
					<div class="row">
						<h5>Number of Client Dismissals:</h5>
					</div>
					<div class="row">
						<div class="col-3 text-right">Successfully Completed</div><div class="col-1" style="border:1px solid black">
							{{ $inactiveCount['Successfully Completed'] ?? '0' }}
						</div>
						<div class="col-3 text-right">Non-compliant</div><div class="col-1" style="border:1px solid black">
								{{ $inactiveCount['Non-compliant'] ?? '0' }}
						</div>
						<div class="col-3 text-right">Moved Away</div><div class="col-1" style="border:1px solid black">
								{{ $inactiveCount['Moved Away'] ?? '0' }}
						</div>
					</div>
					<div class="row">
						
						<div class="col-3 text-right">Dropped Out (Quit)</div><div class="col-1" style="border:1px solid black">
								{{ $inactiveCount['Quit'] ?? '0' }}
						</div>
						<div class="col-3 text-right">Re-Arrest</div><div class="col-1" style="border:1px solid black">
								{{ $inactiveCount['Re-Arrest'] ?? '0' }}
						</div>
						<div class="col-3 text-right">Deceased</div><div class="col-1" style="border:1px solid black">
							{{ $inactiveCount['Deceased'] ?? '0' }}
						</div>
					</div>
					<div class="row">
						<div class="col-3 text-right">No Contact</div><div class="col-1" style="border:1px solid black">
							{{ $inactiveCount['No Contact'] ?? '0' }}
						</div>
						<div class="col-3 text-right">Transferred</div><div class="col-1" style="border:1px solid black">
							{{ $inactiveCount['Transferred'] ?? '0' }}
						</div>
						<div class="col-3 text-right">Complete</div><div class="col-1" style="border:1px solid black">
							{{ $inactiveCount['complete'] ?? '0' }}
						</div>
					</div>
					</div>
					

								
			</div>
		</div>
	
	</div>
		
					
@endsection