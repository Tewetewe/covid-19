<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaliData extends Model
{
    protected $table = 'bali_data';
    protected $primarykey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'Tanggal_Import','Resiko','Paparan','Bantu', 'No_Baru', 'No_Kemarin', 'Tanggal', 'Status', 'Nama', 'Penularan', 'Negara', 
        'Jenis_kelamin', 'Umur', 'Alamat', 'Desa', 'Kecamatan', 'Kabupaten', 'Faskes', 'Keterangan', 'Kondisi', 'Kelompok_Umur', 
        'Kategori_usia', 'Hubungan',
    ];

}
