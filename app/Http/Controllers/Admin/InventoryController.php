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




    /**
     * Show Invenotry Search page
     * @return [type] [description]
     */
    public function showSearch()
    {

        $fourDays = @$_GET['vFourDays'];
        $fourteenDays = @$_GET['v14Days'];
        $numberofdays = '';

        if ( isset($fourDays) ) {
            $numberofdays = 4;
        } elseif( isset($fourteenDays)) {
            $numberofdays = 14;
        } else {
            $numberofdays = '';
        }


        //fetching data from database for Dropdown menu in Search Page
    	$locations = Alocation::where('id','<>',100)->orderBy('fldLocationOrder')->get();
    	$statuscodes = Astatuscode::orderBy('fld_desc','desc')->get();
    	$types = Atype::get();
        $vehicles = null;

        if ($numberofdays !== '') {
            $makes = Vehicle::MakeinfoWithNumberOfDays($numberofdays);

            //check if there is a parameter in url, start searching
            if(Request()->input('filter')){
                $vehicles = $this->inventoryRepository->doSearch(request()->all(), $numberofdays);
            }
        } else{
            $makes = Vehicle::MakeinfoPaginate();    
            if(Request()->input('filter')){
                $vehicles = $this->inventoryRepository->doSearch(request()->all());
            }
        }
    	
    	return view('admin.pages.inventory_search', compact('locations', 'statuscodes', 'types', 'makes', 'vehicles', 'numberofdays'));
    }






    public function countInventory()
    {
        return "working fine";
    }








}
