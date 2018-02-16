<?php

namespace App;

use Carbon\Carbon;
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
     * Return vehicle records with number of days
     * @param  [type]  $query    [description]
     * @param  [type]  $days     [description]
     * @param  string  $select   [description]
     * @param  string  $orderby  [description]
     * @param  integer $paginate [description]
     * @return [type]            [description]
     */
    public static function scopeMakeinfoWithNumberOfDays($query, $days, $select= 'fldMake', $orderby = 'fldMake', $paginate=100)
    {
        $date = new Carbon;
        return $query->select($select)->where('fldDateReceived', '>', $date->subDays($days))->orderBy($orderby)->distinct()->paginate($paginate);
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



    /**
     * Count number of Cars based on given params
     * @param  [type] $query      [description]
     * @param  [type] $statuscode [description]
     * @param  [type] $type       [description]
     * @param  [type] $key        [description]
     * @return [type]             [description]
     */
    public static function scopeCountCars($query, $statuscode, $statusoperator = null, $type, $key, $operator = null)
    {
        if ($operator !== null) {
            return $query->where('fldStatusCode', $statusoperator, $statuscode)
                    ->where('fldType', $type)
                    ->where('fldKey1', $operator , $key)
                    ->count();
        } else {
            return $query->where('fldStatusCode', $statusoperator, $statuscode)
                    ->where('fldType', $type)
                    ->where('fldKey1', $key)
                    ->count();
        }
        
    }




    /**
     * Count Vehcile Price for Vehicle Count Route
     * @param  [type] $query          [description]
     * @param  [type] $statuscode     [description]
     * @param  [type] $statusoperator [description]
     * @param  [type] $type           [description]
     * @param  [type] $minretail      [description]
     * @param  [type] $maxretail      [description]
     * @param  [type] $location       [description]
     * @return [type]                 [description]
     */
    public static function scopeCountPrice($query, $statuscode, $statusoperator = null, $type, $minretail, $maxretail, $location = null)
    {

        if ($location !== null) {
            return $query->where('fldStatusCode', $statusoperator, $statuscode)
                    ->where('fldType', $type)
                    ->where('fldLocation', $location)
                    ->whereBetween('fldRetail', [$minretail, $maxretail])
                    ->get();
        } else {
            return $query->where('fldStatusCode', $statusoperator, $statuscode)
                    ->where('fldType', $type)
                    ->whereBetween('fldRetail', [$minretail, $maxretail])
                    ->get();

        }
        
    }




    /**
     * Give details of a description table
     * @return [type] [description]
     */
    public function scopeDescription($query, $statuscode)
    {
        return Description::where('fldStockNo', strtolower($statuscode))->first();
    }








}
