<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalData extends Model
{
    protected $table = 'global_data';
    protected $primaryKey = 'id';

    public function country()
    {
        return $this->belongsTo('App\Country','OBJECTID','OBJECTID');
    }

}
