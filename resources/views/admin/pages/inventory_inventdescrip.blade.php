@extends('admin.main')

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/tables/datatable/datatables.min.css')}}">

<!-- Main Content begin -->

<div class="app-content content">
    <div class="content-wrapper">
      
			<div class="content-header row">
				<div class="col-12">
				<h1>Vehicle Descriptions </h1>
				</div>
			</div>
			
			<div class="row breadcrumbs-top">
				<div class="breadcrumb-wrapper col-12">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{$base_url}}admin">Home</a>
						</li>
						<li class="breadcrumb-item"><a href="{{$base_url}}admin/inventory/search">Inventory</a>
						</li>
						<li class="breadcrumb-item active">Vehicle Descriptions
						</li>
					</ol>
				</div>
			</div>
			
      <div class="content-body">

        <section id="configuration">
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="responsive_single">
									<option value="AK">All Locations</option>
									<option value="HI">Hawaii</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="responsive_single">
									<option value="AK">All Inventory</option>
									<option value="HI">Hawaii</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="responsive_single">
									<option value="AK">All Types</option>
									<option value="HI">Hawaii</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="responsive_single">
									<option value="AK">All Prices</option>
									<option value="HI">Hawaii</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="responsive_single">
									<option value="AK">All KM's</option>
									<option value="HI">Hawaii</option>
								</select>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="responsive_single">
									<option value="AK">All Years</option>
									<option value="HI">Hawaii</option>
								</select>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<select class="select2 form-control block" id="responsive_single">
									<option value="AK">All Makes</option>
									<option value="HI">Hawaii</option>
								</select>
							</div>
						</div>
						
						<div class="col-md-2">
								<input type="text" class="form-control" id="basicInput" placeholder="Model">
						</div>
						
						<div class="col-md-2">
								<input type="text" class="form-control" id="basicInput" placeholder="Stock#">
						</div>
						
						<div class="col-md-2">
							<button type="submit" class="btn btn-primary">
								<i class="fa fa-check-square-o"></i> Filter
							</button>
						</div>
					</div>
					
					
          <div class="row">
            <div class="col-12">
              <div class="card">
                
                <div class="card-content collapse show">
                  <div class="card-body card-dashboard">
                    <table class="table table-striped table-bordered zero-configuration">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Office</th>
                          <th>Age</th>
                          <th>Start date</th>
                          <th>Salary</th>
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


<script src="{{asset('app-assets/vendors/js/tables/datatable/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/scripts/tables/datatables/datatable-basic.js')}}" type="text/javascript"></script>

@stop