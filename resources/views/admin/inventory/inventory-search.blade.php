@extends('admin.main')

@section('content')

<style>

.tippy-tooltip.stricklands-theme {
  /* Your styling here. Example: */
  background-color: #e6e6e6;
  border: 2px solid #ccc;
  color: #000;
}

.tippy-tooltip.stricklandsfeature-theme {
  /* Your styling here. Example: */
  background-color: #e6e6e6;
  border: 2px solid #ccc;
  width: 200px;
  color: #000;
}


.tippy-popper[x-placement^=left] .tippy-tooltip.stricklands-theme .tippy-arrow {
  /* Your arrow styling here. */
  background-color: #e6e6e6;
  color: #e6e6e6;
}


</style>



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
        	<form method="GET" action="{{ route('inventory-search') }}">
        		@if($numberofdays == 4)
        			<input type="hidden" value="Y" name="vFourDays" />
        		@endif 
        		@if($numberofdays == 14)
					<input type="hidden" value="Y" name="v14Days" />
        		@endif
				

				@include('admin.inventory.partials.search')

			</form>
					
					
          <div class="row">
            <div class="col-12">
              <div class="card">
                
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    {{-- <table class="table table-striped table-bordered zero-configuration scroll-horizontal dataTable table-sm"> --}}
                    <table id="inventory-datatable" class="table nowrap table-striped table-bordered scroll-horizontal table-responsive-sm table-xs table-hover compact dataTable" cellspacing="0" width="100%">
                      <thead class="compact">
                        <tr class="compact pr-0 pl-0 mr-0 ml-0">
							<th class="text-left"></th>
							<th class="text-left">Vehicle</th>
							<th class="text-left"></th>
							<th class="text-left">Stock</th>
							<th class="text-left">L</th>
							<th class="text-left">D</th>
							<th class="text-left">Vin</th>
							<th class="text-left">Eng.</th>
							<th class="text-left">Trans</th>
							<th class="text-left">Color</th>
							<th class="text-left">Feature</th>
							<th class="text-left">KM's</th>
							<th class="text-left">Price</th>
                        </tr>
                      </thead>
                      <tbody>
						
							@if( count($vehicles) > 0 )
								@foreach($vehicles as $vehicle)
			                      	<tr>
			                          	<td>
			                          		<i class="fa fa-hand-o-up"></i>
			                          	</td>
										<td> 
											<a class="call-pop-over-function call-modal" href="?{{ $vehicle->fldStockNo }}" data-toggle="modal" data-id="{{ $vehicle->fldStockNo }}" id="popover-{{ $vehicle->fldStockNo }}" data-trigger="hover" data-placement="right" data-container="body" data-original-title="{{ $vehicle->fldYear ." ". $vehicle->fldMake ." ". $vehicle->fldModel ." ". $vehicle->fldModelNo }}" data-content="STK# {{ $vehicle->fldStockNo }} || Notes: {{ $vehicle->fldComments }}" data-target="#default-1" data-tippy-html="#contentpopup-{{ $vehicle->fldStockNo }}" data-tippy-interactive="true" v-tippy="{ placement : 'left',  arrow: true, theme : 'stricklands'}" v-on:click="showModal('{{ $vehicle->fldStockNo }}')">

											<div id="contentpopup-{{ $vehicle->fldStockNo }}" style="display: none; width: 400px !important; background: #d0d0d0 !important;" v-tippy-html>
											    <div>
											        <h5>{{ $vehicle->fldYear ." ". $vehicle->fldMake ." ". $vehicle->fldModel ." ". $vehicle->fldModelNo }}</h5>
											        <p style="width: 400px;">
											        	STK# {{ $vehicle->fldStockNo }} || Notes: {{ $vehicle->fldComments }}
											        </p>
											    </div>
											</div>


												<?php 
													echo $vehicle->fldYear ." ". $vehicle->fldMake ." ". $vehicle->fldModel ." ". $vehicle->fldModelNo;
												?>
												
												
												
											</a> 
										</td>
										

										<td>
											<a href="" data-toggle="modal" data-target="#default-1" style="color: #000;" v-on:click="showModal('{{ $vehicle->fldStockNo }}')">
												<center>
													<?php 

														//$name = "http://images.stricklands.com/vin/".$vehicle->fldStockNo. "-1.jpg";
												        $hasPhoto = "/home/adminstrick/images.stricklands.com/vin/".$vehicle->fldStockNo . "-1.jpg";
														if (@getimagesize($hasPhoto)) {
													?>

															<img src="{{ env('BASE_URL') }}/images/icon.png" alt="">
													<?php
														}
													?>
													
												</center>
											</a>
										</td>
										<td>{{ $vehicle->fldStockNo }} </td>
										<td>{{ $vehicle->fldLocationCode }} </td>
										<td> {{ round((strtotime(date('Y-m-d')) - strtotime($vehicle->fldDateReceived)) / (60 * 60 * 24), 0, PHP_ROUND_HALF_DOWN) }}</td>
										
										<td>{{ $vehicle->fldShortVINNo }}</td>
										<td>{{ $vehicle->fldCyl }}</td>
										<td>{{ $vehicle->fldTransmission }}</td>
										<td>
											<span title="{{ $vehicle->fldExteriorColor }}">
												{{ substr($vehicle->fldExteriorColor, 0, 7) }}
											</span>
										</td>
										<td data-tippy-html="#contentfeaturepopup-{{ $vehicle->fldStockNo }}" data-tippy-interactive="true" v-tippy="{ placement : 'right',  arrow: true, theme : 'stricklandsfeature'}" v-on:click="showModal('{{ $vehicle->fldStockNo }}')">{{ substr($vehicle->fldAllCodes, 0, 10) }}


												
												<div id="contentfeaturepopup-{{ $vehicle->fldStockNo }}" style="display: none; width: 400px !important; background: #d0d0d0 !important;" v-tippy-html>
												    <div>
												        <h5>
												        	{{ allCodesToFeaturesConvert($vehicle->fldAllCodes) }}
												        </h5>
												        {{-- <p style="width: 400px;">
												        </p> --}}
												    </div>
												</div>
										</td>
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
							<th>D</th>
							<th>Vin</th>
							<th>Eng.</th>
							<th>Trans</th>
							<th class="text-left">Color</th>
							<th class="text-left">Feature</th>
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




			
			{{-- modal --}}
			<div class="modal fade text-left" id="default-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" style="display: none;" aria-hidden="true">
				  <div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h4 class="modal-title" id="myModalLabel1">
							@{{ vehicle.fldYear }} 
							@{{ vehicle.fldMake }} 
							@{{ vehicle.fldModel }} 
							@{{ vehicle.fldModelNo }} - 
							$@{{ vehicle.fldRetail }}
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
												<input type="hidden" id="getvinnumber" name="vinnumber" value="@{{ vehicle.fldStockNo }}">
												<div class="carousel-inner" role="listbox">
													
													
													{{-- <div class="carousel-item active">
														<img src="http://images.stricklands.com/vin/G180337-2.jpg" alt="First slide" width='500' height='375'>
													</div>  --}}


														<div class="carousel-item active">
															<a href="#" ><img src="'http://images.stricklands.com/vin/'+vehicle.fldStockNo+'-1.jpg'" alt="" width="100%" height="375"/></a>
														</div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-2.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-3.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-4.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-4.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-6.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-7.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-8.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-9.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-10.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-11.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-12.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-13.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-14.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-15.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-16.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-17.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-18.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-19.jpg'" alt="" width="100%" height="375"/></a>
													    </div>
												    	<div class="carousel-item">
													    	<a href="#" ><img v-bind:src="'http://images.stricklands.com/vin/'+ vehicle.fldStockNo + '-20.jpg'" alt="" width="100%" height="375"/></a>
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
											@{{ vehicle.fldStockNo }}
										</span>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-sm-4">
										<span class="text-primary text-bold">Short Vin#:</span>
									</div>
									<div class="col-sm-8">
										<span class="text-left">
											@{{ vehicle.fldShortVINNo }}
										</span>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-sm-4">
										<span class="text-primary text-bold">Vin#:</span>
									</div>
									<div class="col-sm-8">
										<span class="text-left">
											@{{ vehicle.fldVINNo }}
										</span>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-sm-4">
										<span class="text-primary text-bold">Color#:</span>
									</div>
									<div class="col-sm-8">
										<span class="text-left">
											@{{ vehicle.fldExteriorColor }}
										</span>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-sm-4">
										<span class="text-primary text-bold">Engine#:</span>
									</div>
									<div class="col-sm-8">
										<span class="text-left">
											@{{ vehicle.fldCyl }}
										</span>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-sm-4">
										<span class="text-primary text-bold">Transmission#:</span>
									</div>
									<div class="col-sm-8">
										<span class="text-left">
											@{{ vehicle.fldTransmission }}
										</span>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-sm-4">
										<span class="text-primary text-bold">KM's#:</span>
									</div>
									<div class="col-sm-8">
										<span class="text-left">
											@{{ vehicle.fldOdometer }}
										</span>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-sm-4">
										<span class="text-primary text-bold">Price#:</span>
									</div>
									<div class="col-sm-8">
										<span class="text-left">
											@{{ vehicle.fldOdometer }}
										</span>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-sm-4">
										<span class="text-primary text-bold">Location#:</span>
									</div>
									<div class="col-sm-8">
										<span class="text-left">
											@{{ vehicle.fldLocationCode }}
										</span>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-sm-4">
										<span class="text-primary text-bold">Website URL#:</span>
									</div>
									<div class="col-sm-8">
										<span class="text-left">
											<a class="text-success" :href="'http://www.stricklands.com/detail.php?stockno='+vehicle.fldStockNo" target="_blank">Website Link</a>
										</span>
									</div>
								</div>
								
								
								<div class="row">
									<div class="col-sm-4">
										<span class="text-primary text-bold">Info#:</span>
									</div>
									<div class="col-sm-8">
										<span class="text-left">
											@{{ vehicle.fldComments }}
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
			










        </section>
    </div>
</div>



<script src="{{asset('admin_assets/js/mainjs/inventory_search.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>

<!-- From CDN -->
<script src="https://unpkg.com/vue-tippy/dist/vue-tippy.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue-tippy/dist/vue-tippy.min.js"></script>


<script>

	$(document).ready(function(){
		
		$('.call-pop-over-function').hover(
			function() {
				var id = $( this ).attr("data-id-popover");
				$("#popoverfeatures-"+id).popover({ trigger: "hover" });
			}	
		);


		/*$('.call-modal').hover(
			function() {
				var id = $( this ).attr("data-id");
				$("#popover-"+id).popover({ trigger: "hover" });
			}
		);*/


		
		$('#inventory-datatable').DataTable();


	});


	$('.call-modal').hover(
		function() {
			var id = $( this ).attr("data-id");
			$("#popover-"+id).popover({ trigger: "hover" });
		}
	);






	/*for Carousel infinity loop*/
	$('.carousel .item').each(function(){
	  var next = $(this).next();
	  if (!next.length) {
	    next = $(this).siblings(':first');
	  }
	  next.children(':first-child').clone().appendTo($(this));

	  if (next.next().length>0) {
	 
	      next.next().children(':first-child').clone().appendTo($(this)).addClass('rightest');
	      
	  }
	  else {
	      $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
	     
	  }
	});


	







    new Vue({
        el: '#configuration',

        data: {
            passingData: 0,
            vehicle: '',
            rootUrl : "{{ env('BASE_URL') }}",
            firstElement: 2
        },

        methods: {
            showModal: function(id) {
                this.passingData = id;
                $.getJSON('http://newadmin.519stricklands.com/getimagedata/'+this.passingData, function(messages){
                    this.vehicle = messages;
                }.bind(this));
            }
        }
    });



</script>



@stop