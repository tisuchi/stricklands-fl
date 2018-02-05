<?php

namespace App\Http\Controllers\Admin;

use App\Atype;
use App\Vehicle;
use App\Alocation;
use App\Astatuscode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\InventoryRepository;

class InventoryController extends Controller
{
    
    protected $inventoryRepository;

    public function __construct(InventoryRepository $inventoryRepository)
    {
    	$this->inventoryRepository = $inventoryRepository;
    }


    public function showSearch()
    {

    	$locations = Alocation::where('id','<>',100)->orderBy('fldLocationOrder')->get();
    	$statuscodes = Astatuscode::with('vehicle')->orderBy('fld_desc','desc')->get();
    	$types = Atype::get();
    	$makes = Vehicle::Makeinfo();
    	$vehicles = null;

    	//check if there is a parameter in url, start searching
    	if(Request()->input('filter')){
			$vehicles = $this->inventoryRepository->doSearch(request()->all());
    	}
    	
    	return view('admin.pages.inventory_search', compact('locations', 'statuscodes', 'types', 'makes', 'vehicles'));
    }


}
