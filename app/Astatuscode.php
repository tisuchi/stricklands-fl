<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Astatuscode extends Model
{
    protected $table = 'a_tbl_status_code';

    
    /**
     * A Status has Many Vehicle
     * @return [type] [description]
     */
    public function vehicle()
    {
    	return $this->hasMany('App\Vehicle', 'fldStatusCode', 'fld_code');
    }


}
