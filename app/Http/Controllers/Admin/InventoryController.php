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

        //for 4 days
            //fldDateReceived > (SUBDATE(CURDATE(), INTERVAL '4' DAY))";
        //for 14 days
            //fldDateReceived > (SUBDATE(CURDATE(), INTERVAL '14' DAY))";

        //http://admin.519stricklands.com/list_inventory.php?vLoc=All&vNewUsed=All&vType=All&vRetail=180000&vOdometer=All&vYear=All&vMake=All&vModel=&vStock=&button=Filter&dyntable_length=10
        //http://admin.519stricklands.com/list_inventory.php?vLoc=All&vNewUsed=All&vType=All&vRetail=80000&vYear=All&vMake=All&vModel=&vOdometer=All&vFiveDays=Y

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
        if ($numberofdays !== '') {
            $makes = Vehicle::MakeinfoWithNumberOfDays($numberofdays);    
        } else{
            $makes = Vehicle::MakeinfoPaginate();    
        }

        return $makes;
    	
    	$vehicles = null;

    	//check if there is a parameter in url, start searching
    	if(Request()->input('filter')){
			$vehicles = $this->inventoryRepository->doSearch(request()->all());
    	}
    	
    	return view('admin.pages.inventory_search', compact('locations', 'statuscodes', 'types', 'makes', 'vehicles', 'numberofdays'));
    }




    function URLIsValid($URL){
        $headers = @get_headers($URL);
        preg_match("/ [45][0-9]{2} /", (string)$headers[0] , $match);
        return count($match) === 0;
    }




}
