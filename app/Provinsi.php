<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    public $timestamps = false;

    public function provinsidata()
    {
        return $this->hasMany('App\ProvinsiData','FID','FID');
    }
}
