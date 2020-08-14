<!DOCTYPE html>
<html>
<head>
	<title>Report</title>
	<style>
		body {text-align: center;}
		.col-2{margin:10px 0;}
		.row{margin:20px 0; padding: 5px;}
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
	<div class="container">
	<div class="row" style="text-align:center; border-bottom:2px solid #005b96;">
		<div class="col-4">
			<img src="https://www2.ncdps.gov/imgs/dps_logo_rgb_secondary1.25inWhtMarg-100dpi.png" alt="dps_logo">
		</div>
		<div class="col-8" style="text-align:center;">
			<h1>North Carolina Local Reentry Council</h1>
			<h2>Monthly Progress Report</h2>
			<h3>Due by 15th of each Month</h3>
		</div>
	</div>
	<div class="row" style="padding:10px; line-height:30px">
			<div class="col-3">Intermediary Agency:</div>
			<div class="col-3" style="border:1px solid black;">CRAVEN PAMLICO</div>
			<div class="col-3">Reporting Month/Year:</div>
			<div class="col-3"> {{ $thisDate->month }}/{{ $thisDate->year }}</div>
	</div>
	</div>
	<table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th colspan="5" style="border:1px solid black; background:pink;">Identification</th>
                <th colspan="2" style="border:1px solid black; background:coral;">Enrollment</th>
                <th colspan="4" style="border:1px solid black; background:cornsilk">Demographic</th>
                <th colspan="5" style="border:1px solid black; background:greenyellow">Supervision</th>
                <th colspan="3" style="border:1px solid black; background:lightblue">Dismissal</th>
            </tr>
        </thead>
        <thead style="background-color:black; font-size:10px; color:white;">
            <tr>
                {{-- id --}}
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>OPUS/ID Number</th>
                <th>DOB</th>
                {{-- Enrollment --}}
                <th>Enrollment Date</th>
                <th>Referral Source</th>
                {{-- Demographic --}}
                <th>Gender</th>
                <th>Race</th>
                <th>Ethnicity</th>
                <th>Maritial Status</th>
                {{-- Supervision --}}
                <th>Recent Incarseration</th>
                <th>NCDPS/DCC  Supervision TYPE</th>
                <th>NCDPS/DCC Supervision LEVEL</th>
                <th>Risk Level</th>
                <th>Registered Sex Offender</th>
                {{-- dismissal --}}
                <th>Dismissal Date</th>
                <th>LRC Outcome</th>
                <th>Criminal Justice Outcome</th>
            </tr>
        </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        {{-- id  --}}
                        <td>{{ $client->first_name }}</td>
                        <td>{{ $client->middle_name ?? '' }}</td>
                        <td>{{ $client->last_name }}</td>
                        <td>{{ $client->ncdps_id }}</td>
                        <td>{{ $client->dob ?? '' }}</td>
                        {{-- Enrollment --}}
                        <td>
                            {{ $client->enrollment_date }}
                        </td>
                        <td>Referral Source</td>
                        {{-- Demographics --}}
                        <td>Gender</td>
                        <td>Race</td>
                        <td>Ethnicity</td>
                        <td>Maritial Status</td>
                        {{-- Supervision --}}
                        <td>Recent Incarseration</td>
                        <td>NCDPS/DCC  Supervision TYPE</td>
                        <td>NCDPS/DCC Supervision LEVEL</td>
                        <td>{{ $client->risk_level }}</td>
                        <td>Registered Sex Offender</td>
                       {{-- Dismissal  --}}
                       <td>Dismissal Date</td>
                       <td>LRC Outcome</td>
                        <td>{{ $client->status!=='active'? $client->updated_at : 'Active' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </tr>
        </thead>
    </table>
		</div>
		
					
</body>
</html>
