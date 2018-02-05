@extends('admin.main')

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

<!-- Main Content begin -->

<div class="app-content content">
    <div class="content-wrapper">
      
			<div class="content-header row">
				<div class="col-12">
				<h1>Vehicle Inventory</h1>
				</div>
			</div>
			
			<div class="row breadcrumbs-top">
				<div class="breadcrumb-wrapper col-12">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{ ENV('BASE_URL') }}admin">Home</a>
						</li>
						<li class="breadcrumb-item"><a href="{{ ENV('BASE_URL') }}admin/inventory/search">Inventory</a>
						</li>
						<li class="breadcrumb-item active">Vehicle Inventory
						</li>
					</ol>
				</div>
			</div>
			
      <div class="content-body">

        <section id="configuration">
        	<form method="GET" action="{{ route('admin-search') }}">
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="sel_location" name="vLoc">
									<option value="all">All Locations</option>
									@foreach($locations as $location)
										<option value="{{ $location->fldCode }}">{{ $location->fldLocationName }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="sel_inventory" name="vNewUsed">
									<option value="all">All Inventory</option>
									@foreach($statuscodes as $code)
										<option value="{{ $code->fld_code }}">{{ $code->fld_desc }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="sel_type" name="vType">
									<option value="all">All Types</option>
									@foreach($types as $type)
										<option value="{{ $type->fldCode }}">{{ $type->fldDesc }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="sel_price" name="vRetail">
									<option value="180000" selected="selected">All Prices</option>
									<option value="30000">Under $30,000</option>
									<option value="25000">Under $25,000</option>
									<option value="20000">Under $20,000</option>
									<option value="15000">Under $15,000</option>
									<option value="10000">Under $10,000</option>
									<option value="5000">Under $5,000 </option>
						            
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="sel_ordermeter" name="vOdometer">
									<option value="All">All KM's</option>
									<option value="50000">Under 50,000</option>
									<option value="75000">Under 75,000</option>
									<option value="100000">Under 100,000</option>
									<option value="125000">Under 125,000</option>
									<option value="150000">Under 150,000</option>
									<option value="200000">Under 200,000 </option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="sel_year" name="vYear">
									<option value="all">All Years</option>
          							@foreach(range(date('Y'), date('Y')-20) as $year)
          								<option value="{{ $year }}">{{ $year }}</option>
          							@endforeach
								</select>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="sel_make" name="vMake">
									<option value="all">All Makes</option>
									@foreach($makes as $make)
          								<option value="{{ $make->fldMake }}">{{ $make->fldMake }}</option>
          							@endforeach
								</select>
							</div>
						</div>
						
						<div class="col-md-2">
								<input type="text" class="form-control" id="sel_model" placeholder="Model" name="vModel">
						</div>
						
						<div class="col-md-2">
								<input type="text" class="form-control" id="sel_stocknum" placeholder="Stock#" name="vStock">
						</div>
						
						<div class="col-md-2">
							<button type="submit" class="btn btn-primary" name="filter" value="submitted">
								<i class="fa fa-check-square-o"></i> Filter
							</button>
						</div>
					</div>

			</form>
					
					
          <div class="row">
            <div class="col-12">
              <div class="card">
                
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <table class="table table-striped table-bordered zero-configuration">
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
		                          	<th></th>
									<th>{{ $vehicle->fldYear }} {{ $vehicle->fldMake }} {{ $vehicle->fldModel }} {{ $vehicle->fldModelNo }} </th>
									<th></th>
									<th>{{ $vehicle->fldStockNo }} </th>
									<th>{{ $vehicle->fldLocationCode }} </th>
									<th>-</th>
									<th>{{ $vehicle->fldShortVINNo }}</th>
									<th>{{ $vehicle->fldCyl }}</th>
									<th>{{ $vehicle->fldTransmission }}</th>
									<th>{{ $vehicle->fldExteriorColor }}</th>
									<th>{{ $vehicle->fldAllCodes }}</th>
									<th>{{ $vehicle->fldOdometer }}</th>
									<th>{{ $vehicle->fldRetail }}</th>
		                        </tr>
	                       	@endforeach
                        @endif
                        
                      </tbody>
                      <tfoot>
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
                      </tfoot>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
				
				
			</div>
    </div>
</div>



<script src="{{asset('admin_assets/js/mainjs/inventory_search.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>

@stop