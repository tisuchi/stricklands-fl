@extends('admin.main')

@section('content')



<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

<!-- Main Content begin -->

<div class="app-content content">
    <div class="content-wrapper">
      
			<div class="content-header row">
				<div class="col-12">
				<h1>Inventory Count</h1>
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
        			
					
          <div class="row">
            <div class="col-12">
              <div class="card">
                
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    
                    <h3 class="text-uppercase">New Vehicle</h3>
                    <hr>
                    <span class="text-bold-600">For Sale - Ready</span></p>
	                  <div class="table-responsive">
	                    <table class="table table-bordered">
	                      <thead>
	                        <tr>
	                          <th>Cars</th>
	                          <th>SUVs</th>
	                          <th>Minivans</th>
	                          <th>Trucks</th>
	                          <th>Total</th>
	                        </tr>
	                      </thead>
	                      <tbody>
	                        <tr>
	                          <th scope="row">1</th>
	                          <td>Mark</td>
	                          <td>Otto</td>
	                          <td>@mdo</td>
	                          <td>@mdo</td>
	                        </tr>
	                      </tbody>
	                    </table>
	                  </div>

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