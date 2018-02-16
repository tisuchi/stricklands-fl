<?php

namespace App\Http\Controllers\Admin;

use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    

    public function index()
    {

    	return view('admin.admin-dashboard');
    }


}
