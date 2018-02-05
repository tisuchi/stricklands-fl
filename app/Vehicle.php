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


}
