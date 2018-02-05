<?php

namespace App\Http\Controllers\Admin;

use App\Atype;
use App\Vehicle;
use App\Alocation;
use App\Astatuscode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    


    public function showSearch()
    {
    	$locations = Alocation::where('id','<>',100)->orderBy('fldLocationOrder')->get();
    	$statuscodes = Astatuscode::orderBy('fld_desc','desc')->get();
    	$types = Atype::get();
    	$makes = Vehicle::Makeinfo();

    	if(Request()->input('filter')){
    		//fetch data
    			
    	}

    	return view('admin.pages.inventory_search', compact('locations', 'statuscodes', 'types', 'makes'));
    }


}
