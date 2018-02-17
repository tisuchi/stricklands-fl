<?php

namespace App\Http\Controllers\Admin;

use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    

    public function index()
    {
    	$vehicle = Vehicle::get()->count();
    	return $vehicle->toJson();

    	return view('admin.admin-dashboard');
    }


}
