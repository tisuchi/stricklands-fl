@extends('admin.main')

@section('content')

<!-- Main Content begin -->

<div class="app-content content">
    <div class="content-wrapper">
      
			<div class="content-header row">
				<div class="col-12">
				<h1>Print Inventory Lists</h1>
				</div>
			</div>
			
			<div class="row breadcrumbs-top">
				<div class="breadcrumb-wrapper col-12">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{$base_url}}admin">Home</a>
						</li>
						<li class="breadcrumb-item"><a href="{{$base_url}}admin/inventory/search">Inventory</a>
						</li>
						<li class="breadcrumb-item active">Print
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
							<button type="submit" class="btn btn-primary">
								<i class="fa fa-check-square-o"></i> Filter
							</button>
						</div>
					</div>
				</section>
			</div>
    </div>
</div>

@stop