<?php namespace App\Repositories;


use DB;
use App\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InventoryRepository {

    
    public function doSearch($allRequests = [], $numberofdays = null)
    {
    	//remove all empty array elements
    	$allRecords = array_filter($allRequests, 'strlen');

		$vLoc=$vNewUsed=$vType=$vOdometer=$vYear=$vMake= 'all';


		
		//$vehicles = Vehicle::latest('fldDateReceived');

		//main eloquent
		//check days 
		if ($numberofdays !== null) {
			$date = new Carbon;
			$vehicles = Vehicle::latest('fldDateReceived')->where('fldDateReceived', '>', $date->subDays($numberofdays));
        } else{
            $vehicles = Vehicle::latest('fldDateReceived');
        }


		if ( Request()->get('vModel') != '' )	//searching model
		    $vehicles->where('fldModel', 'LIKE', "%$allRecords[vModel]%");

		if ( Request()->get('vStock') != '' )	//searching stock
		    $vehicles->where('fldStockNo', 'LIKE', "%$allRecords[vStock]%");

		if ( Request()->get('vMake') != '' ){	//searching who built the car
			if ( Request()->get('vMake') != 'all' ) {
				$vehicles->where('fldMake', $allRecords['vMake']);
			}
		}

		if ( Request()->get('vLoc') != 'all' ) {	//searching location
			$vloc = Request()->get('vLoc');
			$vehicles->whereHas('location', function($q) use ($vloc){
				$q->where('fldLocationCode', $vloc);
			});
		}

		if ( Request()->get('vNewUsed') != 'all' ) {	//searching the car is used or new
			$vnewused = Request()->get('vNewUsed');
			$vehicles->whereHas('statuscode', function($q) use ($vnewused){
				$q->where('fld_code', $vnewused);
			});
		}

		if ( Request()->get('vType') != 'all' ) {	//searching car type
			$vtype = Request()->get('vType');
			$vehicles->whereHas('cartype', function($q) use ($vtype){
				$q->where('fldCode', $vtype);
			});
		}

		if ( !empty( Request()->get('vRetail') ) ) {	//searching price
			$vehicles->where('fldRetail', '<=', Request()->get('vRetail'));
		};

		if ( !empty( Request()->get('vOdometer') ) ) {	//searhcing milage
			$vehicles->where('fldOdometer', '<=', Request()->get('vOdometer'));
		};

		if ( Request()->get('vYear') != 'all' ) {	//searching menufeturing year
			$vyear = Request()->get('vYear');
			$vehicles->where('fldYear', $vyear);
		}


		return $vehicles->get();	//retrun ultimate query

    }




}