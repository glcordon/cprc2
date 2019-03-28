<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
	<style>
		body {text-align: center;}
	</style>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="row">
		<div class="col-12" style="text-align:center; border-bottom:2px solid blue;">
			<h1>North Carolina Local Reentry Council</h1>
			<h2>Monthly Progress Report</h2>
			<h3>Due by 15th of each Month</h3>
		</div>
	</div>
	<div class="row" style="padding:40px">
			<div class="col-3">Intermediary Agency:</div>
			<div class="col-3">CRAVEN PAMLICO</div>
			<div class="col-3">Reporting Month/Year:</div>
			<div class="col-3"></div>
	</div>
	
	<div class="row" style="background-color:#005b96; color:white">
		<div class="col-12">Activity Summary</div>
	</div>
	<div class="row" style="background-color:#b3cde0;">
		<div >Please enter the number of reentry clients for each category during the reporting period.</div>
	</div>
	<div class="row">
			<div class="col-4">
					Number of reentry clients:
			</div>
			<div class="col-8">
	
			</div>
		</div>
		<div class="row">
			<div class="col-3">Enrolled:</div>
			<div  style="border:1px solid black"class="col-3">{{ count($all) }}</div>
			<div class="col-3">Active</div>
			<div style="border:1px solid black" class="col-3">{{ $totalActive }}</div>
		</div>
		<div class="row">
				<div class="col-4">
						Number of clients that received supportive services:
				</div>
				<div class="col-8">
		
				</div>
			</div>
			<div class="row">
					@foreach($service as $serv)
						@if($loop->iteration%6 == 0)
							<div class="row" style="background-color:#b3cde0; margin:10px;">
						@endif
								<div class="col-2">{{ $serv->service_name }}</div>
								<div class="col-2">{{ $serv->client()->count() }}</div>
						@if($loop->iteration%6 == 0)
							</div>
						@endif
						
					@endforeach
			</div>
					
</body>
</html>
