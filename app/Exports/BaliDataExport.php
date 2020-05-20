<?php

namespace App\Exports;

use App\BaliData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BaliDataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $baliData = BaliData::select('Tanggal_Import','Resiko','Paparan','Bantu', 'No_Baru', 'No_Kemarin', 'Tanggal', 'Status', 'Nama', 'Penularan', 'Negara', 
        'Jenis_kelamin', 'Umur', 'Alamat', 'Desa', 'Kecamatan', 'Kabupaten', 'Faskes', 'Keterangan', 'Kondisi', 'Kelompok_Umur', 'Kategori_Kasus', 'Hubungan')->get();
        return $baliData;
    }
    public function headings(): array
    {
        return [
            'Tanggal_Import','Resiko','Paparan','Bantu', 'No_Baru', 'No_Kemarin', 'Tanggal', 'Status', 'Nama', 'Penularan', 'Negara', 
            'Jenis_kelamin', 'Umur', 'Alamat', 'Desa', 'Kecamatan', 'Kabupaten', 'Faskes', 'Keterangan', 'Kondisi', 'Kelompok_Umur', 
            'Kategori_Kasus', 'Hubungan'
        ];
    }
}
