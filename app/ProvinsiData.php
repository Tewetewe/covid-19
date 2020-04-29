<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvinsiData extends Model
{
    protected $table = 'provinsi_data';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function provinsi()
    {
        return $this->belongsTo('App\Provinsi','FID','FID');
    }
}
