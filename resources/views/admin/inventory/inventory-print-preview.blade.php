<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Print Preview</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		table{
			font-size: 12px;
		}
		table > tr {
			padding: 2px auto;
		}
		.table td{
			padding: 0 10px !important;
			margin: 0;
			
		}
	</style>
</head>
<body>

<div class="row px-5" style="background: #CCCCCC;">
		<div class="col-sm-12" style="padding: 10px;">
			<br>
			<br>
			<div style="background: #fff;">
				<div class="row" style="margin: 10px;">
					<div class="col-sm-12">
						<br>
						<div style="font-size: 12px;">
							<a href="{{ route('inventory-list-print-after-search') }}">Year/Make/Model - Back to List- {{ $vehicles->count() }} Vehicles</a>
						</div>
						<br>
						<table class="table nowrap table-striped table-bordered table-hover scroll-horizontal table-responsive-sm table-xs compact" cellspacing="0" width="100%" border="1" style="">
						  <thead>
						    <tr>
								<th>Trader</th>
								<th>STK</th>
								<th>Loc</th>
								<th>VIN</th>
								<th>Color</th>
								<th>KM</th>
								<th>Price</th>
						    </tr>
						  </thead>
						  <tbody>
								@if( count($vehicles) > 0 )
									@foreach($vehicles as $vehicle)
						              	<tr>
						                  	<td class="text-left">{{ $vehicle->fldYear }} {{ $vehicle->fldMake }} {{ $vehicle->fldModel }} {{ $vehicle->fldModelNo }}</td>
											<td>{{ $vehicle->fldStockNo }}</td>
											<td>{{ $vehicle->fldLocationCode }}</td>
											<td>{{ $vehicle->fldShortVINNo }}</td>
											<td>{{ $vehicle->fldExteriorColor }}</td>
											<td>{{ $vehicle->fldOdometer }}</td>
											<td>${{ $vehicle->fldRetail }}</td>
						                </tr>
						           	@endforeach
						        @endif
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
</div>
	
</body>
</html>