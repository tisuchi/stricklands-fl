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
	                        <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Stratford Automart</a>
	                      </li>
	                      <li class="nav-item">
	                        <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Toyota</a>
	                      </li>
	                      <li class="nav-item">
	                        <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="false">GM</a>
	                      </li>
	                      <li class="nav-item">
	                        <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab4" aria-expanded="false">Windsor Automart</a>
	                      </li>
	                      <li class="nav-item">
	                        <a class="nav-link" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab5" aria-expanded="false">All</a>
	                      </li>
	                    </ul>

	                    <div class="tab-content px-1 pt-1">
	                      <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
	                        <div class="table-responsive">
			                    <table class="table table-bordered table-striped table-xs">
			                      <thead>
			                        <tr>
				                         <th></th>
				                         <th>$0-$10,000</th>
	                                     <th>$10-$15,000</th>
	                                     <th>$15-$20,000</th>
	                                     <th>$20-$25,000</th>
	                                     <th>$25,000+</th>
			                        </tr>
			                      </thead>
			                      <tbody>
			                        <tr>
			                          <th>Cars</th>
			                          <td>{{ $sacars['cars1'] }}</td>
			                          <td>{{ $sacars['cars2'] }}</td>
			                          <td>{{ $sacars['cars3'] }}</td>
			                          <td>{{ $sacars['cars4'] }}</td>
			                          <td>{{ $sacars['cars5'] }}</td>
			                        </tr>
			                        <tr>
			                          <th>SUVs</th>
			                          <td>{{ $sasuv['suv1'] }}</td>
			                          <td>{{ $sasuv['suv2'] }}</td>
			                          <td>{{ $sasuv['suv3'] }}</td>
			                          <td>{{ $sasuv['suv4'] }}</td>
			                          <td>{{ $sasuv['suv5'] }}</td>
			                        </tr>
			                        <tr>
			                          <th>Minivans</th>
			                          <td>{{ 0 /*$savan['van1']*/ }}</td>

			                          <td>{{ $savan['van2'] }}</td>

			                          <td>{{ $savan['van3'] }}</td>

			                          <td>{{ $savan['van4'] }}</td>
			                          <td>{{ $savan['van5'] }}</td>

			                        </tr>
			                        <tr>
			                          <th>Trucks</th>
			                          <td>{{ $satruck['truck1'] }}</td>
			                          <td>{{ $satruck['truck2'] }}</td>
			                          <td>{{ $satruck['truck3'] }}</td>
			                          <td>{{ $satruck['truck4'] }}</td>
			                          <td>{{ $satruck['truck5'] }}</td>

			                        </tr>
			                        <tr>
			                          <th>Total</th>
			                          <td>
			                          	{{ $sacars['cars1'] + $sasuv['suv1'] + $savan['van1'] + $satruck['truck1'] }}

			                          	

			                          </td>
			                          <td>
			                          	{{ $sacars['cars2'] + $sasuv['suv2'] + $savan['van2'] + $satruck['truck2'] }}
			                          </td>
			                          <td>
			                          	{{ $sacars['cars3'] + $sasuv['suv3'] + $savan['van3'] + $satruck['truck3'] }}
			                          </td>
			                          <td>
			                          	{{ $sacars['cars4'] + $sasuv['suv4'] + $savan['van4'] + $satruck['truck4'] }}
			                          </td>
			                          <td>
			                          	{{ $sacars['cars5'] + $sasuv['suv5'] + $savan['van5'] + $satruck['truck5'] }}
			                          </td>
			                        </tr>
			                      </tbody>
			                    </table>
		                  	</div>
	                      </div>
	                      <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
	                        <div class="table-responsive">
			                    <table class="table table-bordered table-striped table-xs">
			                      <thead>
			                        <tr>
				                         <th></th>
				                         <th>$0-$10,000</th>
	                                     <th>$10-$15,000</th>
	                                     <th>$15-$20,000</th>
	                                     <th>$20-$25,000</th>
	                                     <th>$25,000+</th>
			                        </tr>
			                      </thead>
			                      <tbody>
			                        <tr>
			                          <th>Cars</th>
			                          <td>{{ $tcars['cars1'] }}</td>
			                          <td>{{ $tcars['cars2'] }}</td>
			                          <td>{{ $tcars['cars3'] }}</td>
			                          <td>{{ $tcars['cars4'] }}</td>
			                          <td>{{ $tcars['cars5'] }}</td>
			                        </tr>
			                        <tr>
			                          <th>SUVs</th>
			                          <td>{{ $tsuv['suv1'] }}</td>
			                          <td>{{ $tsuv['suv2'] }}</td>
			                          <td>{{ $tsuv['suv3'] }}</td>
			                          <td>{{ $tsuv['suv4'] }}</td>
			                          <td>{{ $tsuv['suv5'] }}</td>
			                        </tr>
			                        <tr>
			                          <th>Minivans</th>
			                          <td>{{ $tvan['van1'] }}</td>
			                          <td>{{ $tvan['van2'] }}</td>
			                          <td>{{ $tvan['van3'] }}</td>
			                          <td>{{ $tvan['van4'] }}</td>
			                          <td>{{ $tvan['van5'] }}</td>
			                        </tr>
			                        <tr>
			                          <th>Trucks</th>
			                          <td>{{ $ttruck['truck1'] }}</td>
			                          <td>{{ $ttruck['truck2'] }}</td>
			                          <td>{{ $ttruck['truck3'] }}</td>
			                          <td>{{ $ttruck['truck4'] }}</td>
			                          <td>{{ $ttruck['truck5'] }}</td>
			                        </tr>
			                        <tr>
			                          <th>Total</th>
			                          <td>
			                          	{{ $tcars['cars1'] + $tsuv['suv1'] + $tvan['van1'] + $ttruck['truck1'] }}
			                          </td>
			                          <td>
			                          	{{ $tcars['cars2'] + $tsuv['suv2'] + $tvan['van2'] + $ttruck['truck2'] }}
			                          </td>
			                          <td>
			                          	{{ $tcars['cars3'] + $tsuv['suv3'] + $tvan['van3'] + $ttruck['truck3'] }}
			                          </td>
			                          <td>
			                          	{{ $tcars['cars4'] + $tsuv['suv4'] + $tvan['van4'] + $ttruck['truck4'] }}
			                          </td>
			                          <td>
			                          	{{ $tcars['cars5'] + $tsuv['suv5'] + $tvan['van5'] + $ttruck['truck5'] }}
			                          </td>
			                        </tr>
			                      </tbody>
			                    </table>
		                  	</div>
	                      </div>
	                      <div class="tab-pane" id="tab3" aria-labelledby="base-tab3">
	                        <div class="table-responsive">
			                    <table class="table table-bordered table-striped table-xs">
			                      <thead>
			                        <tr>
				                         <th></th>
				                         <th>$0-$10,000</th>
	                                     <th>$10-$15,000</th>
	                                     <th>$15-$20,000</th>
	                                     <th>$20-$25,000</th>
	                                     <th>$25,000+</th>
			                        </tr>
			                      </thead>
			                      <tbody>
			                        <tr>
			                          <th>Cars</th>
			                          <td>{{ $gmcars['cars1'] }}</td>
			                          <td>{{ $gmcars['cars2'] }}</td>
			                          <td>{{ $gmcars['cars3'] }}</td>
			                          <td>{{ $gmcars['cars4'] }}</td>
			                          <td>{{ $gmcars['cars5'] }}</td>
			                        </tr>
			                        <tr>
			                          <th>SUVs</th>
			                          <td>{{ $gmsuv['suv1'] }}</td>
			                          <td>{{ $gmsuv['suv2'] }}</td>
			                          <td>{{ $gmsuv['suv3'] }}</td>
			                          <td>{{ $gmsuv['suv4'] }}</td>
			                          <td>{{ $gmsuv['suv5'] }}</td>
			                        </tr>
			                        <tr>
			                          <th>Minivans</th>
			                          <td>{{ $gmvan['van1'] }}</td>
			                          <td>{{ $gmvan['van2'] }}</td>
			                          <td>{{ $gmvan['van3'] }}</td>
			                          <td>{{ $gmvan['van4'] }}</td>
			                          <td>{{ $gmvan['van5'] }}</td>
			                        </tr>
			                        <tr>
			                          <th>Trucks</th>
			                          <td>{{ $gmtruck['truck1'] }}</td>
			                          <td>{{ $gmtruck['truck2'] }}</td>
			                          <td>{{ $gmtruck['truck3'] }}</td>
			                          <td>{{ $gmtruck['truck4'] }}</td>
			                          <td>{{ $gmtruck['truck5'] }}</td>
			                        </tr>
			                        <tr>
			                          <th>Total</th>
			                          <td>
			                          	{{ $gmcars['cars1'] + $gmsuv['suv1'] + $gmvan['van1'] + $gmtruck['truck1'] }}
			                          </td>
			                          <td>
			                          	{{ $gmcars['cars2'] + $gmsuv['suv2'] + $gmvan['van2'] + $gmtruck['truck2'] }}
			                          </td>
			                          <td>
			                          	{{ $gmcars['cars3'] + $gmsuv['suv3'] + $gmvan['van3'] + $gmtruck['truck3'] }}
			                          </td>
			                          <td>
			                          	{{ $gmcars['cars4'] + $gmsuv['suv4'] + $gmvan['van4'] + $gmtruck['truck4'] }}
			                          </td>
			                          <td>
			                          	{{ $gmcars['cars5'] + $gmsuv['suv5'] + $gmvan['van5'] + $gmtruck['truck5'] }}
			                          </td>
			                        </tr>
			                      </tbody>
			                    </table>
		                  	</div>
	                      </div>
	                      <div class="tab-pane" id="tab4" aria-labelledby="base-tab4">
	                        <div class="table-responsive">
			                    <table class="table table-bordered table-striped table-xs">
				                    <thead>
				                        <tr>
					                         <th></th>
					                         <th>$0-$10,000</th>
		                                     <th>$10-$15,000</th>
		                                     <th>$15-$20,000</th>
		                                     <th>$20-$25,000</th>
		                                     <th>$25,000+</th>
				                        </tr>
				                      </thead>
				                      <tbody>
				                        <tr>
				                          <th>Cars</th>
				                          <td>{{ $wacars['cars1'] }}</td>
				                          <td>{{ $wacars['cars2'] }}</td>
				                          <td>{{ $wacars['cars3'] }}</td>
				                          <td>{{ $wacars['cars4'] }}</td>
				                          <td>{{ $wacars['cars5'] }}</td>
				                        </tr>
				                        <tr>
				                          <th>SUVs</th>
				                          <td>{{ $wasuv['suv1'] }}</td>
				                          <td>{{ $wasuv['suv2'] }}</td>
				                          <td>{{ $wasuv['suv3'] }}</td>
				                          <td>{{ $wasuv['suv4'] }}</td>
				                          <td>{{ $wasuv['suv5'] }}</td>
				                        </tr>
				                        <tr>
				                          <th>Minivans</th>
				                          <td>{{ $wavan['van1'] }}</td>
				                          <td>{{ $wavan['van2'] }}</td>
				                          <td>{{ $wavan['van3'] }}</td>
				                          <td>{{ $wavan['van4'] }}</td>
				                          <td>{{ $wavan['van5'] }}</td>
				                        </tr>
				                        <tr>
				                          <th>Trucks</th>
				                          <td>{{ $watruck['truck1'] }}</td>
				                          <td>{{ $watruck['truck2'] }}</td>
				                          <td>{{ $watruck['truck3'] }}</td>
				                          <td>{{ $watruck['truck4'] }}</td>
				                          <td>{{ $watruck['truck5'] }}</td>
				                        </tr>
				                        <tr>
				                          <th>Total</th>
				                          <td>
				                          	{{ $wacars['cars1'] + $wasuv['suv1'] + $wavan['van1'] + $watruck['truck1'] }}
				                          </td>
				                          <td>
				                          	{{ $wacars['cars2'] + $wasuv['suv2'] + $wavan['van2'] + $watruck['truck2'] }}
				                          </td>
				                          <td>
				                          	{{ $wacars['cars3'] + $wasuv['suv3'] + $wavan['van3'] + $watruck['truck3'] }}
				                          </td>
				                          <td>
				                          	{{ $wacars['cars4'] + $wasuv['suv4'] + $wavan['van4'] + $watruck['truck4'] }}
				                          </td>
				                          <td>
				                          	{{ $wacars['cars5'] + $wasuv['suv5'] + $wavan['van5'] + $watruck['truck5'] }}
				                          </td>
				                        </tr>
				                      </tbody>
				                    </table>
			                  	</div>
	                      	</div>
	                      <div class="tab-pane" id="tab5" aria-labelledby="base-tab5">
	                        <div class="table-responsive">
			                    <table class="table table-bordered table-striped table-xs">
				                    <thead>
				                        <tr>
					                         <th></th>
					                         <th>$0-$10,000</th>
		                                     <th>$10-$15,000</th>
		                                     <th>$15-$20,000</th>
		                                     <th>$20-$25,000</th>
		                                     <th>$25,000+</th>
				                        </tr>
				                      </thead>
				                      <tbody>
				                        <tr>
				                          <th>Cars</th>
				                          <td>{{ $acars['cars1'] }}</td>
				                          <td>{{ $acars['cars2'] }}</td>
				                          <td>{{ $acars['cars3'] }}</td>
				                          <td>{{ $acars['cars4'] }}</td>
				                          <td>{{ $acars['cars5'] }}</td>
				                        </tr>
				                        <tr>
				                          <th>SUVs</th>
				                          <td>{{ $asuv['suv1'] }}</td>
				                          <td>{{ $asuv['suv2'] }}</td>
				                          <td>{{ $asuv['suv3'] }}</td>
				                          <td>{{ $asuv['suv4'] }}</td>
				                          <td>{{ $asuv['suv5'] }}</td>
				                        </tr>
				                        <tr>
				                          <th>Minivans</th>
				                          <td>{{ $avan['van1'] }}</td>
				                          <td>{{ $avan['van2'] }}</td>
				                          <td>{{ $avan['van3'] }}</td>
				                          <td>{{ $avan['van4'] }}</td>
				                          <td>{{ $avan['van5'] }}</td>
				                        </tr>
				                        <tr>
				                          <th>Trucks</th>
				                          <td>{{ $atruck['truck1'] }}</td>
				                          <td>{{ $atruck['truck2'] }}</td>
				                          <td>{{ $atruck['truck3'] }}</td>
				                          <td>{{ $atruck['truck4'] }}</td>
				                          <td>{{ $atruck['truck5'] }}</td>
				                        </tr>
				                        <tr>
				                          <th>Total</th>
				                          <td>
				                          	{{ $acars['cars1'] + $asuv['suv1'] + $avan['van1'] + $atruck['truck1'] }}
				                          </td>
				                          <td>
				                          	{{ $acars['cars2'] + $asuv['suv2'] + $avan['van2'] + $atruck['truck2'] }}
				                          </td>
				                          <td>
				                          	{{ $acars['cars3'] + $asuv['suv3'] + $avan['van3'] + $atruck['truck3'] }}
				                          </td>
				                          <td>
				                          	{{ $acars['cars4'] + $asuv['suv4'] + $avan['van4'] + $atruck['truck4'] }}
				                          </td>
				                          <td>
				                          	{{ $acars['cars5'] + $asuv['suv5'] + $avan['van5'] + $atruck['truck5'] }}
				                          </td>
				                        </tr>
				                      </tbody>
				                    </table>
			                  	</div>
	                      	</div>
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