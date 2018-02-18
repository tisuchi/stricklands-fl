<?php

namespace App\Http\Controllers\Admin;

use App\User;
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



    public function test()
    {
    	return view('test');
    }



    public function getTestData($id)
    {
    	$user = User::find($id);
    	return $user;
    }





}
