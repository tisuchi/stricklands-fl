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

    	return view('admin.admin-dashboard');
    }



    public function test()
    {
    	return view('test');
    }



    public function getImageData($id)
    {
    	$user = Vehicle::where('fldStockNo', $id)->first();
    	return $user;
    }





}
