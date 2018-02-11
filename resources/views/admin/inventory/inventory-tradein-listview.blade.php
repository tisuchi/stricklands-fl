@extends('admin.main')

@section('content')



<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

<!-- Main Content begin -->

<div class="app-content content">
    <div class="content-wrapper">
      
			<div class="content-header row">
				<div class="col-12">
				<h1>Vehicle Inventory {{ !empty($numberofdays)? "- Last $numberofdays Days" : ''}} </h1>
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
						
							@if( count($deliveries) > 0 )
								@foreach($deliveries as $vehicle)
			                      	<tr>
			                          	<td>
			                          		<i class="fa fa-hand-o-up"></i>
			                          	</td>
										<td> 

											<a class="call-pop-over-function call-modal" href="?{{ $vehicle->fldStockNo }}" data-toggle="modal" data-id="{{ $vehicle->fldStockNo }}" id="popover-{{ $vehicle->fldStockNo }}" data-trigger="hover" data-placement="right" data-container="body" data-original-title="{{ $vehicle->fldYear ." ". $vehicle->fldMake ." ". $vehicle->fldModel ." ". $vehicle->fldModelNo }}" data-content="STK# {{ $vehicle->fldStockNo }} || Notes: {{ $vehicle->fldComments }}" data-target="#default-{{ $vehicle->fldStockNo }}">
												<?php 
													if(substr($vehicle->fldYear ." ". $vehicle->fldMake ." ". $vehicle->fldModel ." ". $vehicle->fldModelNo, 0, 20) == false){
														echo $vehicle->fldYear ." ". $vehicle->fldMake ." ". $vehicle->fldModel ." ". $vehicle->fldModelNo;
													} else {
														echo substr($vehicle->fldYear ." ". $vehicle->fldMake ." ". $vehicle->fldModel ." ". $vehicle->fldModelNo, 0, 20) . "...";														
													}
												?>
											</a> 
										</td>
										

								
										{{-- modal --}}
										<div class="modal fade text-left" id="default-{{ $vehicle->fldStockNo }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
											  <div class="modal-dialog modal-lg" role="document">
												<div class="modal-content">
												  <div class="modal-header">
													<h4 class="modal-title" id="myModalLabel1">
														{{ $vehicle->fldYear }} {{ $vehicle->fldMake }} {{ $vehicle->fldModel }} {{ $vehicle->fldModelNo }} - ${{ $vehicle->fldRetail }}
													</h4>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													  <span aria-hidden="true">×</span>
													</button>
												  </div>
												  <div class="modal-body">
													<div class="row">
														<div class="col-sm-6">
															<div class="card">
																<div class="card-content">
																	<div class="card-body">
																		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
																			
																			{{-- <ol class="carousel-indicators">
																				<li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
																				<li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
																				<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
																			</ol> --}}
																			<div class="carousel-inner" role="listbox">
																				
																				
																				{{-- <div class="carousel-item active">
																					<img src="http://images.stricklands.com/vin/G180337-2.jpg" alt="First slide" width='500' height='375'>
																				</div>  --}}

																				<?php 
																					
																					for ($i=2;$i<=3;$i++)
																			        {
																			        	/*$name = "/home/adminstrick/images.stricklands.com/vin/";
																						$name .= $row_rs_list['fldStockNo'];						
																						$name .= "-" . $i . ".jpg";*/
																			        	//if (@GetImageSize($name)) {}
																			            $name = "http://images.stricklands.com/vin/$vehicle->fldStockNo-".$i . ".jpg";
																			            if ($i == 2) {
																			            	echo '<div class="carousel-item active">';
																			            } else {
																			            	echo '<div class="carousel-item">';
																			            }
																			            	echo '<img src="'.$name.'" alt="" width="500" height="375"/>';
																			            	echo '</div>';
																			        }
																			        
																				?>

																				<div class="carousel-item">
																					<img src="http://images.stricklands.com/vin/G180337-3.jpg" alt="First slide" width='500' height='375'>
																				</div> 

																				<div class="carousel-item">
																					<img src="http://images.stricklands.com/vin/G180337-4.jpg" alt="First slide" width='500' height='375'>
																				</div> 

																				<div class="carousel-item">
																					<img src="http://images.stricklands.com/vin/G180337-5.jpg" alt="First slide" width='500' height='375'>
																				</div> 

																				<div class="carousel-item">
																					<img src="http://images.stricklands.com/vin/G180337-6.jpg" alt="First slide" width='500' height='375'>
																				</div> 
																				
																			</div>
																			<a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
																				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
																				<span class="sr-only">Previous</span>
																			</a>
																			<a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
																				<span class="carousel-control-next-icon" aria-hidden="true"></span>
																				<span class="sr-only">Next</span>
																			</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<h3>Vehicle Details</h3>
															<hr>
														
															<div class="row">
																<div class="col-sm-4">
																	<span class="text-primary text-bold">Stock#:</span>
																</div>
																<div class="col-sm-8">
																	<span class="text-left">
																		{{ $vehicle->fldStockNo }}
																	</span>
																</div>
															</div>
															
															
															<div class="row">
																<div class="col-sm-4">
																	<span class="text-primary text-bold">Short Vin#:</span>
																</div>
																<div class="col-sm-8">
																	<span class="text-left">
																		{{ $vehicle->fldShortVINNo }}
																	</span>
																</div>
															</div>
															
															
															<div class="row">
																<div class="col-sm-4">
																	<span class="text-primary text-bold">Vin#:</span>
																</div>
																<div class="col-sm-8">
																	<span class="text-left">
																		{{ $vehicle->fldVINNo }}
																	</span>
																</div>
															</div>
															
															
															<div class="row">
																<div class="col-sm-4">
																	<span class="text-primary text-bold">Color#:</span>
																</div>
																<div class="col-sm-8">
																	<span class="text-left">
																		{{ $vehicle->fldExteriorColor }}
																	</span>
																</div>
															</div>
															
															
															<div class="row">
																<div class="col-sm-4">
																	<span class="text-primary text-bold">Engine#:</span>
																</div>
																<div class="col-sm-8">
																	<span class="text-left">
																		{{ $vehicle->fldCyl }}
																	</span>
																</div>
															</div>
															
															
															<div class="row">
																<div class="col-sm-4">
																	<span class="text-primary text-bold">Transmission#:</span>
																</div>
																<div class="col-sm-8">
																	<span class="text-left">
																		{{ $vehicle->fldTransmission }}
																	</span>
																</div>
															</div>
															
															
															<div class="row">
																<div class="col-sm-4">
																	<span class="text-primary text-bold">KM's#:</span>
																</div>
																<div class="col-sm-8">
																	<span class="text-left">
																		{{ $vehicle->fldOdometer }}
																	</span>
																</div>
															</div>
															
															
															<div class="row">
																<div class="col-sm-4">
																	<span class="text-primary text-bold">Price#:</span>
																</div>
																<div class="col-sm-8">
																	<span class="text-left">
																		{{ $vehicle->fldOdometer }}
																	</span>
																</div>
															</div>
															
															
															<div class="row">
																<div class="col-sm-4">
																	<span class="text-primary text-bold">Location#:</span>
																</div>
																<div class="col-sm-8">
																	<span class="text-left">
																		{{ $vehicle->fldLocationCode }}
																	</span>
																</div>
															</div>
															
															
															<div class="row">
																<div class="col-sm-4">
																	<span class="text-primary text-bold">Website URL#:</span>
																</div>
																<div class="col-sm-8">
																	<span class="text-left">
																		<a class="text-success" href="http://www.stricklands.com/detail.php?stockno={{ $vehicle->fldStockNo }}" target="_blank">Website Link</a>
																	</span>
																</div>
															</div>
															
															
															<div class="row">
																<div class="col-sm-4">
																	<span class="text-primary text-bold">Info#:</span>
																</div>
																<div class="col-sm-8">
																	<span class="text-left">
																		{{ $vehicle->fldComments }}
																	</span>
																</div>
															</div>

														</div>
													</div>
												  </div>
												  {{-- <div class="modal-footer">
													<button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
													<button type="button" class="btn btn-outline-primary">Save changes</button>
												  </div> --}}
												</div>
											  </div>
											</div>
										</div>

										<td>
											<a href="" data-toggle="modal" data-target="#default-{{ $vehicle->fldStockNo }}" style="color: #000;">
												<center>
													<img src="{{ env('BASE_URL') }}/images/icon.png" alt="">
												</center>
											</a>
										</td>
										<td>{{ $vehicle->fldStockNo }} </td>
										<td>{{ $vehicle->fldLocationCode }} </td>
										<td> {{ round((strtotime(date('Y-m-d')) - strtotime($vehicle->fldDateReceived)) / (60 * 60 * 24), 0, PHP_ROUND_HALF_DOWN) }}</td>
										
										<td>{{ $vehicle->fldShortVINNo }}</td>
										<td>{{ $vehicle->fldCyl }}</td>
										<td>{{ $vehicle->fldTransmission }}</td>
										<td>{{ $vehicle->fldExteriorColor }}</td>
										<td>{{ substr($vehicle->fldAllCodes, 0, 10) }}</td>
										<td>{{ $vehicle->fldOdometer }}</td>
										<td>{{ $vehicle->fldRetail }}</td>
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