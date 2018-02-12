@extends('admin.main')

@section('content')



<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

<!-- Main Content begin -->

<div class="app-content content">
    <div class="content-wrapper">
      
			<div class="content-header row">
				<div class="col-12">
				<h1>Print Inventory Lists</h1>
				</div>
			</div>

			
      <div class="content-body">

        <section id="configuration">
        	<form method="GET" action="{{ route('inventory-list-print-after-search') }}" target="_blank">
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="sel_location" name="vLoc">
									<option value="all">All Locations</option>
									@foreach($locations as $location)
										<option value="{{ $location->fldCode }}" @if(Request::input('vLoc') == $location->fldCode) selected="selected" @endif>{{ $location->fldLocationName }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="sel_inventory" name="vNewUsed">
									<option value="all">All Inventory</option>
									@foreach($statuscodes as $code)
										<option value="{{ $code->fld_code }}" @if(Request::input('vNewUsed') == $code->fld_code) selected="selected" @endif>{{ $code->fld_desc }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="sel_type" name="vType">
									<option value="all">All Types</option>
									@foreach($types as $type)
										<option value="{{ $type->fldCode }}" @if(Request::input('vType') == $type->fldCode) selected="selected" @endif>{{ $type->fldDesc }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="sel_price" name="vRetail">
									<option value="180000" selected="selected">All Prices</option>
									<option value="30000" @if(Request::input('vRetail') == 30000) selected="selected" @endif>Under $30,000</option>
									<option value="25000" @if(Request::input('vRetail') == 25000) selected="selected" @endif>Under $25,000</option>
									<option value="20000" @if(Request::input('vRetail') == 20000) selected="selected" @endif>Under $20,000</option>
									<option value="15000" @if(Request::input('vRetail') == 15000) selected="selected" @endif>Under $15,000</option>
									<option value="10000" @if(Request::input('vRetail') == 10000) selected="selected" @endif>Under $10,000</option>
									<option value="5000" @if(Request::input('vRetail') == 5000) selected="selected" @endif>Under $5,000 </option>
						            
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="sel_ordermeter" name="vOdometer">
									<option value="All">All KM's</option>
									<option value="50000" @if(Request::input('vOdometer') == 50000) selected="selected" @endif>Under 50,000</option>
									<option value="75000" @if(Request::input('vOdometer') == 75000) selected="selected" @endif>Under 75,000</option>
									<option value="100000" @if(Request::input('vOdometer') == 100000) selected="selected" @endif>Under 100,000</option>
									<option value="125000" @if(Request::input('vOdometer') == 125000) selected="selected" @endif>Under 125,000</option>
									<option value="150000" @if(Request::input('vOdometer') == 150000) selected="selected" @endif>Under 150,000</option>
									<option value="200000" @if(Request::input('vOdometer') == 200000) selected="selected" @endif>Under 200,000 </option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="sel_year" name="vYear">
									<option value="all">All Years</option>
          							@foreach(range(date('Y'), date('Y')-20) as $year)
          								<option value="{{ $year }}" @if(Request::input('vYear') == $year) selected="selected" @endif>{{ $year }}</option>
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
          								<option value="{{ $make->fldMake }}" @if(Request::input('vMake') == $make->fldMake) selected="selected" @endif>{{ $make->fldMake }}</option>
          							@endforeach
								</select>
							</div>
						</div>
						
						
						
						
						<div class="col-md-2">
							<button type="submit" class="btn btn-primary" name="filter" value="submitted">
								<i class="fa fa-check-square-o"></i> Filter
							</button>
						</div>
					</div>

			</form>
					
				
        </section>
    </div>
</div>



<script src="{{asset('admin_assets/js/mainjs/inventory_search.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>

<script>


	$('.call-pop-over-function').hover(
		function() {
			var id = $( this ).attr("data-id");
			$("#popover-"+id).popover({ trigger: "hover" });
		}
	);


	$('.call-modal').hover(
		function() {
			var id = $( this ).attr("data-id");
			$("#popover-"+id).popover({ trigger: "hover" });
		}
	);


</script>



@stop