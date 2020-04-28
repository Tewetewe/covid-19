<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProvinsiData extends Model
{
    protected $table = 'country';
    protected $primaryKey = 'id';

    public function provinsi()
    {
        return $this->belongsTo('App\Provinsi','FID','FID');
    }
}
