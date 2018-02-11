@extends('admin.main')

@section('content')



<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

<!-- Main Content begin -->

<div class="app-content content">
    <div class="content-wrapper">
      
			<div class="content-header row">
				<div class="col-12">
				<h1>Trade In List View</h1>
				</div>
			</div>

			
      <div class="content-body">

        <section id="configuration">
        			
          <div class="row">
            <div class="col-12">
              <div class="card">
                
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    {{-- <table class="table table-striped table-bordered zero-configuration scroll-horizontal dataTable table-sm"> --}}
                    <table class="table nowrap table-striped table-bordered scroll-horizontal table-responsive-sm table-xs compact" cellspacing="0" width="100%">
                      <thead>
                        <tr>
							<th>Date</th>
							<th>Stock No</th>
							<th>Year</th>
							<th>Make</th>
							<th>Model</th>
							<th>Color</th>
							<th>KMs</th>
							<th>VIN</th>
                        </tr>
                      </thead>
                      <tbody>
						
							@if( count($deliveries) > 0 )
								@foreach($deliveries as $delivery)
			                      	<tr>
			                          	<td class="text-center">
			                          		{{ $delivery->fld_date }}
			                          	</td>
										<td class="text-center">
											{{ $delivery->fld_trade_stock }}
										</td>
										<td class="text-center">
											{{ $delivery->fld_trade_year }}
										</td>
										<td class="text-center">{{ $delivery->fld_trade_make }}</td>
										<td class="text-center">{{ $delivery->fld_trade_model }}</td>
										<td class="text-center">{{ $delivery->fld_trade_colour }}</td>
										<td class="text-center">{{ $delivery->fld_trade_mileage }}</td>
										<td class="text-center">{{ $delivery->fld_trade_vin }}</td>
			                        </tr>
		                       	@endforeach
	                        @endif
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Date</th>
							<th>Stock No</th>
							<th>Year</th>
							<th>Make</th>
							<th>Model</th>
							<th>Color</th>
							<th>KMs</th>
							<th>VIN</th>
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