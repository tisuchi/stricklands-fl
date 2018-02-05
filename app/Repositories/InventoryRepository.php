<?php namespace App\Repositories;


use DB;
use App\Vehicle;
use Illuminate\Http\Request;

class InventoryRepository {

    
    public function doSearch($allRequests = [])
    {
    	//remove all empty array elements
    	$allRecords = array_filter($allRequests, 'strlen');

    	/*$locations = DB::table('a_tbl_locations');
    	$statuscodes = DB::table('a_tbl_locations');

		if ($published == true)
		    $query->where('published', '=', 1);

		if (isset($year))
		    $query->where('year', '>', $year);

		$result = $query->get();*/

		//return $allRecords['vLoc'];
		
		$vLoc=$vNewUsed=$vType=$vOdometer=$vYear=$vMake= 'all';
		//$vModel=$vStock = '';
		

		$vehicles = Vehicle::latest('fldDateReceived');

		if ( Request()->get('vModel') != '' )
		    $vehicles->where('fldModel', 'LIKE', "%$allRecords[vModel]%");

		if ( Request()->get('vStock') != '' )
		    $vehicles->where('fldStockNo', 'LIKE', "%$allRecords[vStock]%");

		if ( Request()->get('vMake') != '' ){
			if ( Request()->get('vMake') != 'all' ) {
				$vehicles->where('fldMake', $allRecords['vMake']);
			}
		}

		return $vehicles->get();
    }




}