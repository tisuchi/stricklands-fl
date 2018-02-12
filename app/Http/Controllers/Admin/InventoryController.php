<?php

namespace App\Http\Controllers\Admin;

use App\Atype;
use App\Vehicle;
use App\Alocation;
use App\Description;
use App\Astatuscode;
use App\Delivery;
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









    /**
     * Count Inventory Page
     * @return [type] [description]
     */
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




            //USED INVENTORY PRICE AUDIT RESULTS
            $cars1 = (new Vehicle)->CountPrice('U', '=', 'C', 0, 10000, 'E');
            $cars2 = (new Vehicle)->CountPrice('U', '=', 'C', 10000, 15000, 'E');
            $cars3 = (new Vehicle)->CountPrice('U', '=', 'C', 15000, 20000, 'E');
            $cars4 = (new Vehicle)->CountPrice('U', '=', 'C', 20000, 25000, 'E');
            $cars5 = (new Vehicle)->CountPrice('U', '=', 'C', 25000, 200000, 'E');

            $sacars = [
                        'cars1' => $cars1,
                        'cars2' => $cars2,
                        'cars3' => $cars3,
                        'cars4' => $cars4,
                        'cars5' => $cars5,
                    ]; 


            $suv1 = (new Vehicle)->CountPrice('U', '=', 'S', 0, 10000, 'E');
            $suv2 = (new Vehicle)->CountPrice('U', '=', 'S', 10000, 15000, 'E');
            $suv3 = (new Vehicle)->CountPrice('U', '=', 'S', 15000, 20000, 'E');
            $suv4 = (new Vehicle)->CountPrice('U', '=', 'S', 20000, 25000, 'E');
            $suv5 = (new Vehicle)->CountPrice('U', '=', 'S', 25000, 200000, 'E');

            $sasuv = [
                        'suv1' => $suv1,
                        'suv2' => $suv2,
                        'suv3' => $suv3,
                        'suv4' => $suv4,
                        'suv5' => $suv5,
                    ];

            $suv1 = (new Vehicle)->CountPrice('U', '=', 'S', 0, 10000, 'E');
            $suv2 = (new Vehicle)->CountPrice('U', '=', 'S', 10000, 15000, 'E');
            $suv3 = (new Vehicle)->CountPrice('U', '=', 'S', 15000, 20000, 'E');
            $suv4 = (new Vehicle)->CountPrice('U', '=', 'S', 20000, 25000, 'E');
            $suv5 = (new Vehicle)->CountPrice('U', '=', 'S', 25000, 200000, 'E');

            $sasuv = [
                        'suv1' => $suv1,
                        'suv2' => $suv2,
                        'suv3' => $suv3,
                        'suv4' => $suv4,
                        'suv5' => $suv5,
                    ];

            $van1 = (new Vehicle)->CountPrice('U', '=', 'V', 0, 10000, 'E');
            $van2 = (new Vehicle)->CountPrice('U', '=', 'V', 10000, 15000, 'E');
            $van3 = (new Vehicle)->CountPrice('U', '=', 'V', 15000, 20000, 'E');
            $van4 = (new Vehicle)->CountPrice('U', '=', 'V', 20000, 25000, 'E');
            $van5 = (new Vehicle)->CountPrice('U', '=', 'V', 25000, 200000, 'E');

            $savan = [
                        'van1' => $van1,
                        'van2' => $van2,
                        'van3' => $van3,
                        'van4' => $van4,
                        'van5' => $van5,
                    ];

            $truck1 = (new Vehicle)->CountPrice('U', '=', 'T', 0, 10000, 'E');
            $truck2 = (new Vehicle)->CountPrice('U', '=', 'T', 10000, 15000, 'E');
            $truck3 = (new Vehicle)->CountPrice('U', '=', 'T', 15000, 20000, 'E');
            $truck4 = (new Vehicle)->CountPrice('U', '=', 'T', 20000, 25000, 'E');
            $truck5 = (new Vehicle)->CountPrice('U', '=', 'T', 25000, 200000, 'E');

            $satruck = [
                        'truck1' => $truck1,
                        'truck2' => $truck2,
                        'truck3' => $truck3,
                        'truck4' => $truck4,
                        'truck5' => $truck5,
                    ];


            //for toyota
            $cars1 = (new Vehicle)->CountPrice('U', '=', 'C', 0, 10000, 'T');
            $cars2 = (new Vehicle)->CountPrice('U', '=', 'C', 10000, 15000, 'T');
            $cars3 = (new Vehicle)->CountPrice('U', '=', 'C', 15000, 20000, 'T');
            $cars4 = (new Vehicle)->CountPrice('U', '=', 'C', 20000, 25000, 'T');
            $cars5 = (new Vehicle)->CountPrice('U', '=', 'C', 25000, 200000, 'T');

            $tcars = [
                        'cars1' => $cars1,
                        'cars2' => $cars2,
                        'cars3' => $cars3,
                        'cars4' => $cars4,
                        'cars5' => $cars5,
                    ]; 


            $suv1 = (new Vehicle)->CountPrice('U', '=', 'S', 0, 10000, 'T');
            $suv2 = (new Vehicle)->CountPrice('U', '=', 'S', 10000, 15000, 'T');
            $suv3 = (new Vehicle)->CountPrice('U', '=', 'S', 15000, 20000, 'T');
            $suv4 = (new Vehicle)->CountPrice('U', '=', 'S', 20000, 25000, 'T');
            $suv5 = (new Vehicle)->CountPrice('U', '=', 'S', 25000, 200000, 'T');

            $tsuv = [
                        'suv1' => $suv1,
                        'suv2' => $suv2,
                        'suv3' => $suv3,
                        'suv4' => $suv4,
                        'suv5' => $suv5,
                    ];

            $suv1 = (new Vehicle)->CountPrice('U', '=', 'S', 0, 10000, 'T');
            $suv2 = (new Vehicle)->CountPrice('U', '=', 'S', 10000, 15000, 'T');
            $suv3 = (new Vehicle)->CountPrice('U', '=', 'S', 15000, 20000, 'T');
            $suv4 = (new Vehicle)->CountPrice('U', '=', 'S', 20000, 25000, 'T');
            $suv5 = (new Vehicle)->CountPrice('U', '=', 'S', 25000, 200000, 'T');

            $tsuv = [
                        'suv1' => $suv1,
                        'suv2' => $suv2,
                        'suv3' => $suv3,
                        'suv4' => $suv4,
                        'suv5' => $suv5,
                    ];

            $van1 = (new Vehicle)->CountPrice('U', '=', 'V', 0, 10000, 'T');
            $van2 = (new Vehicle)->CountPrice('U', '=', 'V', 10000, 15000, 'T');
            $van3 = (new Vehicle)->CountPrice('U', '=', 'V', 15000, 20000, 'T');
            $van4 = (new Vehicle)->CountPrice('U', '=', 'V', 20000, 25000, 'T');
            $van5 = (new Vehicle)->CountPrice('U', '=', 'V', 25000, 200000, 'T');

            $tvan = [
                        'van1' => $van1,
                        'van2' => $van2,
                        'van3' => $van3,
                        'van4' => $van4,
                        'van5' => $van5,
                    ];

            $truck1 = (new Vehicle)->CountPrice('U', '=', 'T', 0, 10000, 'T');
            $truck2 = (new Vehicle)->CountPrice('U', '=', 'T', 10000, 15000, 'T');
            $truck3 = (new Vehicle)->CountPrice('U', '=', 'T', 15000, 20000, 'T');
            $truck4 = (new Vehicle)->CountPrice('U', '=', 'T', 20000, 25000, 'T');
            $truck5 = (new Vehicle)->CountPrice('U', '=', 'T', 25000, 200000, 'T');

            $ttruck = [
                        'truck1' => $truck1,
                        'truck2' => $truck2,
                        'truck3' => $truck3,
                        'truck4' => $truck4,
                        'truck5' => $truck5,
                    ];


            //for GM Motors
            $cars1 = (new Vehicle)->CountPrice('U', '=', 'C', 0, 10000, 'BG');
            $cars2 = (new Vehicle)->CountPrice('U', '=', 'C', 10000, 15000, 'BG');
            $cars3 = (new Vehicle)->CountPrice('U', '=', 'C', 15000, 20000, 'BG');
            $cars4 = (new Vehicle)->CountPrice('U', '=', 'C', 20000, 25000, 'BG');
            $cars5 = (new Vehicle)->CountPrice('U', '=', 'C', 25000, 200000, 'BG');

            $gmcars = [
                        'cars1' => $cars1,
                        'cars2' => $cars2,
                        'cars3' => $cars3,
                        'cars4' => $cars4,
                        'cars5' => $cars5,
                    ]; 


            $suv1 = (new Vehicle)->CountPrice('U', '=', 'S', 0, 10000, 'BG');
            $suv2 = (new Vehicle)->CountPrice('U', '=', 'S', 10000, 15000, 'BG');
            $suv3 = (new Vehicle)->CountPrice('U', '=', 'S', 15000, 20000, 'BG');
            $suv4 = (new Vehicle)->CountPrice('U', '=', 'S', 20000, 25000, 'BG');
            $suv5 = (new Vehicle)->CountPrice('U', '=', 'S', 25000, 200000, 'BG');

            $gmsuv = [
                        'suv1' => $suv1,
                        'suv2' => $suv2,
                        'suv3' => $suv3,
                        'suv4' => $suv4,
                        'suv5' => $suv5,
                    ];

            $suv1 = (new Vehicle)->CountPrice('U', '=', 'S', 0, 10000, 'BG');
            $suv2 = (new Vehicle)->CountPrice('U', '=', 'S', 10000, 15000, 'BG');
            $suv3 = (new Vehicle)->CountPrice('U', '=', 'S', 15000, 20000, 'BG');
            $suv4 = (new Vehicle)->CountPrice('U', '=', 'S', 20000, 25000, 'BG');
            $suv5 = (new Vehicle)->CountPrice('U', '=', 'S', 25000, 200000, 'BG');

            $gmsuv = [
                        'suv1' => $suv1,
                        'suv2' => $suv2,
                        'suv3' => $suv3,
                        'suv4' => $suv4,
                        'suv5' => $suv5,
                    ];

            $van1 = (new Vehicle)->CountPrice('U', '=', 'V', 0, 10000, 'BG');
            $van2 = (new Vehicle)->CountPrice('U', '=', 'V', 10000, 15000, 'BG');
            $van3 = (new Vehicle)->CountPrice('U', '=', 'V', 15000, 20000, 'BG');
            $van4 = (new Vehicle)->CountPrice('U', '=', 'V', 20000, 25000, 'BG');
            $van5 = (new Vehicle)->CountPrice('U', '=', 'V', 25000, 200000, 'BG');

            $gmvan = [
                        'van1' => $van1,
                        'van2' => $van2,
                        'van3' => $van3,
                        'van4' => $van4,
                        'van5' => $van5,
                    ];

            $truck1 = (new Vehicle)->CountPrice('U', '=', 'T', 0, 10000, 'BG');
            $truck2 = (new Vehicle)->CountPrice('U', '=', 'T', 10000, 15000, 'BG');
            $truck3 = (new Vehicle)->CountPrice('U', '=', 'T', 15000, 20000, 'BG');
            $truck4 = (new Vehicle)->CountPrice('U', '=', 'T', 20000, 25000, 'BG');
            $truck5 = (new Vehicle)->CountPrice('U', '=', 'T', 25000, 200000, 'BG');

            $gmtruck = [
                        'truck1' => $truck1,
                        'truck2' => $truck2,
                        'truck3' => $truck3,
                        'truck4' => $truck4,
                        'truck5' => $truck5,
                    ];


            //for Windsor Automart
            $cars1 = (new Vehicle)->CountPrice('U', '=', 'C', 0, 10000, 'W');
            $cars2 = (new Vehicle)->CountPrice('U', '=', 'C', 10000, 15000, 'W');
            $cars3 = (new Vehicle)->CountPrice('U', '=', 'C', 15000, 20000, 'W');
            $cars4 = (new Vehicle)->CountPrice('U', '=', 'C', 20000, 25000, 'W');
            $cars5 = (new Vehicle)->CountPrice('U', '=', 'C', 25000, 200000, 'W');

            $wacars = [
                        'cars1' => $cars1,
                        'cars2' => $cars2,
                        'cars3' => $cars3,
                        'cars4' => $cars4,
                        'cars5' => $cars5,
                    ]; 


            $suv1 = (new Vehicle)->CountPrice('U', '=', 'S', 0, 10000, 'W');
            $suv2 = (new Vehicle)->CountPrice('U', '=', 'S', 10000, 15000, 'W');
            $suv3 = (new Vehicle)->CountPrice('U', '=', 'S', 15000, 20000, 'W');
            $suv4 = (new Vehicle)->CountPrice('U', '=', 'S', 20000, 25000, 'W');
            $suv5 = (new Vehicle)->CountPrice('U', '=', 'S', 25000, 200000, 'W');

            $wasuv = [
                        'suv1' => $suv1,
                        'suv2' => $suv2,
                        'suv3' => $suv3,
                        'suv4' => $suv4,
                        'suv5' => $suv5,
                    ];

            $suv1 = (new Vehicle)->CountPrice('U', '=', 'S', 0, 10000, 'W');
            $suv2 = (new Vehicle)->CountPrice('U', '=', 'S', 10000, 15000, 'W');
            $suv3 = (new Vehicle)->CountPrice('U', '=', 'S', 15000, 20000, 'W');
            $suv4 = (new Vehicle)->CountPrice('U', '=', 'S', 20000, 25000, 'W');
            $suv5 = (new Vehicle)->CountPrice('U', '=', 'S', 25000, 200000, 'W');

            $wasuv = [
                        'suv1' => $suv1,
                        'suv2' => $suv2,
                        'suv3' => $suv3,
                        'suv4' => $suv4,
                        'suv5' => $suv5,
                    ];

            $van1 = (new Vehicle)->CountPrice('U', '=', 'V', 0, 10000, 'W');
            $van2 = (new Vehicle)->CountPrice('U', '=', 'V', 10000, 15000, 'W');
            $van3 = (new Vehicle)->CountPrice('U', '=', 'V', 15000, 20000, 'W');
            $van4 = (new Vehicle)->CountPrice('U', '=', 'V', 20000, 25000, 'W');
            $van5 = (new Vehicle)->CountPrice('U', '=', 'V', 25000, 200000, 'W');

            $wavan = [
                        'van1' => $van1,
                        'van2' => $van2,
                        'van3' => $van3,
                        'van4' => $van4,
                        'van5' => $van5,
                    ];

            $truck1 = (new Vehicle)->CountPrice('U', '=', 'T', 0, 10000, 'W');
            $truck2 = (new Vehicle)->CountPrice('U', '=', 'T', 10000, 15000, 'W');
            $truck3 = (new Vehicle)->CountPrice('U', '=', 'T', 15000, 20000, 'W');
            $truck4 = (new Vehicle)->CountPrice('U', '=', 'T', 20000, 25000, 'W');
            $truck5 = (new Vehicle)->CountPrice('U', '=', 'T', 25000, 200000, 'W');

            $watruck = [
                        'truck1' => $truck1,
                        'truck2' => $truck2,
                        'truck3' => $truck3,
                        'truck4' => $truck4,
                        'truck5' => $truck5,
                    ];



            //for all 
            $cars1 = (new Vehicle)->CountPrice('U', '=', 'C', 0, 10000);
            $cars2 = (new Vehicle)->CountPrice('U', '=', 'C', 10000, 15000);
            $cars3 = (new Vehicle)->CountPrice('U', '=', 'C', 15000, 20000);
            $cars4 = (new Vehicle)->CountPrice('U', '=', 'C', 20000, 25000);
            $cars5 = (new Vehicle)->CountPrice('U', '=', 'C', 25000, 200000);

            $acars = [
                        'cars1' => $cars1,
                        'cars2' => $cars2,
                        'cars3' => $cars3,
                        'cars4' => $cars4,
                        'cars5' => $cars5,
                    ]; 


            $suv1 = (new Vehicle)->CountPrice('U', '=', 'S', 0, 10000);
            $suv2 = (new Vehicle)->CountPrice('U', '=', 'S', 10000, 15000);
            $suv3 = (new Vehicle)->CountPrice('U', '=', 'S', 15000, 20000);
            $suv4 = (new Vehicle)->CountPrice('U', '=', 'S', 20000, 25000);
            $suv5 = (new Vehicle)->CountPrice('U', '=', 'S', 25000, 200000);

            $asuv = [
                        'suv1' => $suv1,
                        'suv2' => $suv2,
                        'suv3' => $suv3,
                        'suv4' => $suv4,
                        'suv5' => $suv5,
                    ];

            $suv1 = (new Vehicle)->CountPrice('U', '=', 'S', 0, 10000);
            $suv2 = (new Vehicle)->CountPrice('U', '=', 'S', 10000, 15000);
            $suv3 = (new Vehicle)->CountPrice('U', '=', 'S', 15000, 20000);
            $suv4 = (new Vehicle)->CountPrice('U', '=', 'S', 20000, 25000);
            $suv5 = (new Vehicle)->CountPrice('U', '=', 'S', 25000, 200000);

            $asuv = [
                        'suv1' => $suv1,
                        'suv2' => $suv2,
                        'suv3' => $suv3,
                        'suv4' => $suv4,
                        'suv5' => $suv5,
                    ];

            $van1 = (new Vehicle)->CountPrice('U', '=', 'V', 0, 10000);
            $van2 = (new Vehicle)->CountPrice('U', '=', 'V', 10000, 15000);
            $van3 = (new Vehicle)->CountPrice('U', '=', 'V', 15000, 20000);
            $van4 = (new Vehicle)->CountPrice('U', '=', 'V', 20000, 25000);
            $van5 = (new Vehicle)->CountPrice('U', '=', 'V', 25000, 200000);

            $avan = [
                        'van1' => $van1,
                        'van2' => $van2,
                        'van3' => $van3,
                        'van4' => $van4,
                        'van5' => $van5,
                    ];

            $truck1 = (new Vehicle)->CountPrice('U', '=', 'T', 0, 10000);
            $truck2 = (new Vehicle)->CountPrice('U', '=', 'T', 10000, 15000);
            $truck3 = (new Vehicle)->CountPrice('U', '=', 'T', 15000, 20000);
            $truck4 = (new Vehicle)->CountPrice('U', '=', 'T', 20000, 25000);
            $truck5 = (new Vehicle)->CountPrice('U', '=', 'T', 25000, 200000);

            $atruck = [
                        'truck1' => $truck1,
                        'truck2' => $truck2,
                        'truck3' => $truck3,
                        'truck4' => $truck4,
                        'truck5' => $truck5,
                    ];


        return view('admin.inventory.inventory-count', compact('newreadyforsale', 'newsold', 'usedreadyforsale', 'usedsold', 'sacars', 'sasuv', 'savan', 'satruck', 'tcars', 'tsuv', 'tvan', 'ttruck', 'gmcars', 'gmsuv', 'gmvan', 'gmtruck', 'wacars', 'wasuv', 'wavan', 'watruck', 'acars', 'asuv', 'avan', 'atruck'));
    }






    /**
     * Show Description 
     * @return [type] [description]
     */
    public function showDescription()
    {

        //fetching data from database for Dropdown menu in Search Page
        $locations = Alocation::where('id','<>',100)->orderBy('fldLocationOrder')->get();
        $statuscodes = Astatuscode::orderBy('fld_desc','desc')->get();
        $types = Atype::get();
        $vehicles = null;

        $makes = Vehicle::MakeinfoPaginate();    
        if(Request()->input('filter')){
            $vehicles = $this->inventoryRepository->doSearch(request()->all());
        }

        $vehiclewithrelation= new Vehicle;

        //return $vehiclewithrelation->Description('G180525')->fldDescription;
        
        return view('admin.inventory.inventory-description', compact('locations', 'statuscodes', 'types', 'makes', 'vehicles', 'vehiclewithrelation'));
    }




    /**
     * Update Post Description 
     * @return [type] [description]
     */
    public function postDescription()
    {
        //getting data
        $title = request()->input('vehicletitle');
        $description = request()->input('vehicledescription');
        $ischecked = request()->input('approve');
        $vehiclestockno = request()->input('vehiclestockno');

        //return request()->all();

        $hasDescription = Description::where('fldStockNo', $vehiclestockno)->first();

        if ($hasDescription) {
            $hasDescription->fldDescription = $description;
            $hasDescription->fldApproved = ($ischecked == 'on') ? 1 : 0;
            $hasDescription->fldTitle = $title;
            $hasDescription->save();
        }


        return back();
    }






    /**
     * Show trade in List View
     * @return [type] [description]
     */
    public function showTradeinListView()
    {
        $deliveries = Delivery::where('fld_trade_stock', '<>', '')->get();

        return view('admin.inventory.inventory-tradein-listview', compact('deliveries'));
    }




    public function showPrintInventoryList()
    {
        //fetching data from database for Dropdown menu in Search Page
        $locations = Alocation::where('id','<>',100)->orderBy('fldLocationOrder')->get();
        $statuscodes = Astatuscode::orderBy('fld_desc','desc')->get();
        $types = Atype::get();
        $vehicles = null;

        $makes = Vehicle::MakeinfoPaginate();    
        if(Request()->input('filter')){
            $vehicles = $this->inventoryRepository->doSearch(request()->all());
        }
        
        return view('admin.inventory.inventory-print-search', compact('locations', 'statuscodes', 'types', 'makes', 'vehicles', 'numberofdays'));
        
    }





    public function doPrintListAfterSearch()
    {
        if(Request()->input('filter')){
            $vehicles = $this->inventoryRepository->doSearch(request()->all());
        }

        return view('admin.inventory.inventory-print-preview', compact('vehicles'));
        
    }





}
