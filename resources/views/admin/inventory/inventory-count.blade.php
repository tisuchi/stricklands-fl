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
			
      <div class="content-body">

        <section id="configuration">
        			
					
          <div class="row">
            <div class="col-12">
              	
              	<div class="card">    
	                <div class="card-body card-dashboard">
	                    
	                    <h3 class="text-uppercase">New Vehicle</h3>
	                    <hr>
	                    <span class="text-bold-600">For Sale - Ready</span>
	                  	<div class="table-responsive">
		                    <table class="table table-bordered table-striped">
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
		                          <th>{{ $newreadyforsale['newreadycars'] }}</th>
		                          <td>{{ $newreadyforsale['newreadysuvs'] }}</td>
		                          <td>{{ $newreadyforsale['newreadyvans'] }}</td>
		                          <td>{{ $newreadyforsale['newreadytrucks'] }}</td>
		                          <td>
		                          		{{ $newreadyforsale['newreadycars'] + $newreadyforsale['newreadysuvs'] + $newreadyforsale['newreadyvans'] + $newreadyforsale['newreadytrucks']}}
		                          </td>
		                        </tr>
		                      </tbody>
		                    </table>
	                  	</div>

						<br>
	                  	<span class="text-bold-600">Sold</span>
	                  	<div class="table-responsive">
		                    <table class="table table-bordered table-striped">
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
		                          <th>{{ $newsold['newsoldcars'] }}</th>
		                          <td>{{ $newsold['newsoldsuvs'] }}</td>
		                          <td>{{ $newsold['newsoldvans'] }}</td>
		                          <td>{{ $newsold['newsoldtrucks'] }}</td>
		                          <td>
		                          		{{ $newsold['newsoldcars'] + $newsold['newsoldsuvs'] + $newsold['newsoldvans'] + $newsold['newsoldtrucks']}}
		                          </td>
		                        </tr>
		                      </tbody>
		                    </table>
	                  	</div>
	                </div>
              	</div>

              	<div class="card">            
	                <div class="card-body card-dashboard">
	                    
	                    <h3 class="text-uppercase">USED VEHICLES</h3>
	                    <hr>
	                    <span class="text-bold-600">For Sale - Ready</span>
	                  	<div class="table-responsive">
		                    <table class="table table-bordered table-striped">
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
		                          <th>{{ $usedreadyforsale['usedreadycars'] }}</th>
		                          <td>{{ $usedreadyforsale['usedreadysuvs'] }}</td>
		                          <td>{{ $usedreadyforsale['usedreadyvans'] }}</td>
		                          <td>{{ $usedreadyforsale['usedreadytrucks'] }}</td>
		                          <td>
		                          		{{ $usedreadyforsale['usedreadycars'] + $usedreadyforsale['usedreadysuvs'] + $usedreadyforsale['usedreadyvans'] + $usedreadyforsale['usedreadytrucks']}}
		                          </td>
		                        </tr>
		                      </tbody>
		                    </table>
	                  	</div>

						<br>
	                  	<span class="text-bold-600">Sold</span>
	                  	<div class="table-responsive">
		                    <table class="table table-bordered table-striped table-xs">
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
		                          <th>{{ $usedsold['usedsoldcars'] }}</th>
		                          <td>{{ $usedsold['usedsoldsuvs'] }}</td>
		                          <td>{{ $usedsold['usedsoldvans'] }}</td>
		                          <td>{{ $usedsold['usedsoldtrucks'] }}</td>
		                          <td>
		                          		{{ $usedsold['usedsoldcars'] + $usedsold['usedsoldsuvs'] + $usedsold['usedsoldvans'] + $usedsold['usedsoldtrucks']}}
		                          </td>
		                        </tr>
		                      </tbody>
		                    </table>
	                  	</div>
	                </div>
              	</div>

              	<div class="card">            
	                <div class="card-body card-dashboard">
	                    
	                    <h3 class="text-uppercase">USED INVENTORY PRICE AUDIT RESULTS</h3>
	                    <hr>
	                   	<ul class="nav nav-tabs">
	                      <li class="nav-item">
	                        <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Tab 1</a>
	                      </li>
	                      <li class="nav-item">
	                        <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Tab 2</a>
	                      </li>
	                      <li class="nav-item">
	                        <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="false">Tab 3</a>
	                      </li>
	                    </ul>

	                    <div class="tab-content px-1 pt-1">
	                      <div role="tabpanel" class="tab-pane" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
	                        <p>Oat cake marzipan cake lollipop caramels wafer pie jelly
	                          beans. Icing halvah chocolate cake carrot cake. Jelly beans
	                          carrot cake marshmallow gingerbread chocolate cake. Gummies
	                          cupcake croissant.</p>
	                      </div>
	                      <div class="tab-pane active" id="tab2" aria-labelledby="base-tab2">
	                        <p>Sugar plum tootsie roll biscuit caramels. Liquorice brownie
	                          pastry cotton candy oat cake fruitcake jelly chupa chups.
	                          Pudding caramels pastry powder cake soufflé wafer caramels.
	                          Jelly-o pie cupcake.</p>
	                      </div>
	                      <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
	                        <p>Biscuit ice cream halvah candy canes bear claw ice cream
	                          cake chocolate bar donut. Toffee cotton candy liquorice.
	                          Oat cake lemon drops gingerbread dessert caramels. Sweet
	                          dessert jujubes powder sweet sesame snaps.</p>
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