<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';
    public $timestamps = false;

    public function globaldata()
    {
        return $this->hasMany('App\GlobalData','OBJECTID','OBJECTID');
    }
}
