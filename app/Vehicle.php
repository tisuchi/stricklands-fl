<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'tblvehicles';
    public static $snakeAttributes = false;


    public static function scopeMakeinfo($query, $select= 'fldMake', $orderby = 'fldMake')
    {
        return $query->select($select)->orderBy($orderby)->distinct()->get();
    }


    public static function scopeMakeinfoPaginate($query, $select= 'fldMake', $orderby = 'fldMake', $paginate=100)
    {
        return $query->select($select)->orderBy($orderby)->distinct()->paginate($paginate);
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


    /**
     * A Vehicle is belongs to a Type
     * @return [type] [description]
     */
    public function cartype()
    {
    	return $this->belongsTo('App\Atype', 'fldType', 'fldCode');
    }


}
