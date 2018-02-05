<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'tblvehicles';


    public static function scopeMakeinfo($query, $select= 'fldMake', $orderby = 'fldMake')
    {
        return $query->select($select)->orderBy($orderby)->distinct()->get();
    }




    /**
     * A Vehicle is belongs to a Status Code
     * @return [type] [description]
     */
    public function statuscode()
    {
        return $this->belongsTo('App\Astatuscode', 'fldStatusCode', 'fld_code');
    }


    /**
     * A Vehicle is belongs to a Location
     * @return [type] [description]
     */
    public function location()
    {
    	return $this->belongsTo('App\Alocation', 'fldLocationCode', 'fldCode');
    }


}
