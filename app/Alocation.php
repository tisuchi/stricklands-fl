<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alocation extends Model
{
    protected $table = 'a_tbl_locations';


    /**
     * A location has Many Vehicle
     * @return [type] [description]
     */
    public function vehicle()
    {
    	return $this->hasMany('App\Vehicle', 'fldLocationCode', 'fldCode');
    }


}
