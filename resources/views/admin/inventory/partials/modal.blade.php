{{-- modal --}}

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
\

											<?php 
											
									        	/*$name = "/home/adminstrick/images.stricklands.com/vin/";
												$name .= $row_rs_list['fldStockNo'];						
												$name .= "-" . $i . ".jpg";*/
									        	//if (@GetImageSize($name)) {}
									           
									        $name = "http://images.stricklands.com/vin/".$vehicle->fldStockNo. "-1.jpg";

									        $name = "/home/adminstrick/images.stricklands.com/vin/".$vehicle->fldStockNo . "-1.jpg";


											//if (@GetImageSize($name)) {
											//http://images.stricklands.com/vin/171835A-1.jpg
											if (@getimagesize($name)) {
								            	for ($i=2;$i<=15;$i++)
												{
													$namepath = "/home/adminstrick/images.stricklands.com/vin/" . $vehicle->fldStockNo . "-" . $i . ".jpg";
													if (@getimagesize($namepath)) {

												    	if ($i == 2) {
											            	echo '<div class="carousel-item active">';
											            } else {
											            	echo '<div class="carousel-item">';
											            }
												        echo '<a href="#" ><img src="http://images.stricklands.com/vin/'.$vehicle->fldStockNo.'-'.$i.'.jpg" alt="" width="500" height="375"/></a>';
												        echo '</div>';
												    }
												}

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