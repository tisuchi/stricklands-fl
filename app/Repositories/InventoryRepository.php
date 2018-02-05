<?php namespace App\Repositories;


use DB;
use App\Vehicle;
use Illuminate\Http\Request;

class InventoryRepository {

    
    public function doSearch($allRequests = [])
    {
    	//remove all empty array elements
    	$allRecords = array_filter($allRequests, 'strlen');

		$vLoc=$vNewUsed=$vType=$vOdometer=$vYear=$vMake= 'all';


		//main eloquent
		$vehicles = Vehicle::latest('fldDateReceived');


		if ( Request()->get('vModel') != '' )	//searching model
		    $vehicles->where('fldModel', 'LIKE', "%$allRecords[vModel]%");

		if ( Request()->get('vStock') != '' )	//searching stock
		    $vehicles->where('fldStockNo', 'LIKE', "%$allRecords[vStock]%");

		if ( Request()->get('vMake') != '' ){	//searching who make
			if ( Request()->get('vMake') != 'all' ) {
				$vehicles->where('fldMake', $allRecords['vMake']);
			}
		}

		if ( Request()->get('vLoc') != 'all' ) {
			$vloc = Request()->get('vLoc');
			$vehicles->whereHas('location', function($q) use ($vloc){
				$q->where('fldLocationCode', $vloc);
			});
		}

		if ( Request()->get('vNewUsed') != 'all' ) {
			$vnewused = Request()->get('vNewUsed');
			$vehicles->whereHas('statuscode', function($q) use ($vnewused){
				$q->where('fld_code', $vnewused);
			});
		}

		if ( Request()->get('vType') != 'all' ) {
			$vtype = Request()->get('vType');
			$vehicles->whereHas('cartype', function($q) use ($vtype){
				$q->where('fldCode', $vtype);
			});
		}

		if ( !empty( Request()->get('vRetail') ) ) {
			$vehicles->where('fldRetail', '<=', Request()->get('vRetail'));
		};

		if ( !empty( Request()->get('vOdometer') ) ) {
			$vehicles->where('fldOdometer', '<=', Request()->get('vOdometer'));
		};

		if ( Request()->get('vYear') != 'all' ) {
			$vyear = Request()->get('vYear');
			$vehicles->where('fldYear', $vyear);
		}

		if ( Request()->get('vMake') != 'all' ) {
			$vmake = Request()->get('vMake');
			$vehicles->where('fldMake', $vmake);
		}

		return $vehicles->get();
    }




}