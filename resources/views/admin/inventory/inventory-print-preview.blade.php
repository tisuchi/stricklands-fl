<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Print Preview</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="row">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
		<table class="table nowrap table-striped table-bordered scroll-horizontal table-responsive-sm table-xs compact" cellspacing="0" width="100%" border="1">
		  <thead>
		    <tr>
				<th></th>
				<th>Vehicle</th>
				<th></th>
				<th>Stock</th>
				<th>L</th>
				<th>Days</th>
				<th>Vin</th>
				<th>Engine</th>
				<th>Trans</th>
				<th>Colour</th>
				<th>Features</th>
				<th>KM's</th>
				<th>Price</th>
		    </tr>
		  </thead>
		  <tbody>
				@if( count($vehicles) > 0 )
					@foreach($vehicles as $vehicle)
		              	<tr>
		                  	<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							
		                </tr>
		           	@endforeach
		        @endif
		  </tbody>
		</table>


	</div>
	<div class="col-sm-2"></div>
</div>
	
</body>
</html>