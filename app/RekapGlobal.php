<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekapGlobal extends Model
{
    protected $table = 'rekap_global';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'positif', 'sembuh', 'meninggal',
    ];

}
