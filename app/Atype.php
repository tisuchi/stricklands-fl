<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atype extends Model
{
    protected $table = 'a_tbl_types';
    public static $snakeAttributes = false;



    /**
     * A type has Many Vehicle
     * @return [type] [description]
     */
    public function vehicle()
    {
    	return $this->hasMany('App\Vehicle', 'fldType', 'fldCode');
    }
}
