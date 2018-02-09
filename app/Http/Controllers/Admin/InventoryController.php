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
    	
    	return view('admin.inventory.inventory-search', compact('locations', 'statuscodes', 'types', 'makes', 'vehicles', 'numberofdays'));
    }







    public function countInventory()
    {
        //New Cars
        //Ready for Sale
        $newreadycars = (new Vehicle)->CountCars('N', '=', 'C', 'P', '<>');
        $newreadysuvs = (new Vehicle)->CountCars('N', '=', 'S', 'P', '<>');
        $newreadyvans = (new Vehicle)->CountCars('N', '=', 'V', 'P', '<>');
        $newreadytrucks = (new Vehicle)->CountCars('N', '=', 'T', 'P', '<>');
        
        //SOLD NEW CARS
        $newsoldcars = (new Vehicle)->CountCars('N', '=', 'C', 'P');
        $newsoldsuvs = (new Vehicle)->CountCars('N', '=', 'S', 'P');
        $newsoldvans = (new Vehicle)->CountCars('N', '=', 'V', 'P');
        $newsoldtrucks = (new Vehicle)->CountCars('N', '=', 'T', 'P');


        //Used Car
        //Ready for Sale
        $usedreadycars = (new Vehicle)->CountCars('N', '<>', 'C', 'P', '<>');
        $usedreadysuvs = (new Vehicle)->CountCars('N', '<>', 'S', 'P', '<>');
        $usedreadyvans = (new Vehicle)->CountCars('N', '<>', 'V', 'P', '<>');
        $usedreadytrucks = (new Vehicle)->CountCars('N', '<>', 'T', 'P', '<>');
        
        //SOLD NEW CARS
        $usedsoldcars = (new Vehicle)->CountCars('N', '<>', 'C', 'P');
        $usedsoldsuvs = (new Vehicle)->CountCars('N', '<>', 'S', 'P');
        $usedsoldvans = (new Vehicle)->CountCars('N', '<>', 'V', 'P');
        $usedsoldtrucks = (new Vehicle)->CountCars('N', '<>', 'T', 'P');








        $newreadyforsale = [
                            'newreadycars'  => $newreadycars,
                            'newreadysuvs'  => $newreadysuvs,
                            'newreadyvans'  => $newreadyvans,
                            'newreadytrucks'  => $newreadytrucks,
                        ];

        $newsold = [
                            'newsoldcars'  => $newsoldcars,
                            'newsoldsuvs'  => $newsoldsuvs,
                            'newsoldvans'  => $newsoldvans,
                            'newsoldtrucks'  => $newsoldtrucks,
                        ];


        $usedreadyforsale = [
                            'usedreadycars'  => $usedreadycars,
                            'usedreadysuvs'  => $usedreadysuvs,
                            'usedreadyvans'  => $usedreadyvans,
                            'usedreadytrucks'  => $usedreadytrucks,
                        ];

        $usedsold = [
                            'usedsoldcars'  => $usedsoldcars,
                            'usedsoldsuvs'  => $usedsoldsuvs,
                            'usedsoldvans'  => $usedsoldvans,
                            'usedsoldtrucks'  => $usedsoldtrucks,
                        ];


        return view('admin.inventory.inventory-count', compact('newreadyforsale', 'newsold', 'usedreadyforsale', 'usedsold'));
    }








}
