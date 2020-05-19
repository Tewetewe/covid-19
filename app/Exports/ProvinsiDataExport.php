<?php

namespace App\Exports;

use App\ProvinsiData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProvinsiDataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $provinsi = ProvinsiData::select('id','FID', 'Kasus_Posi', 'Kasus_Semb', 'Kasus_Meni', 'created_at')->get();
        return $provinsi;
    }
    public function headings(): array
    {
        return [
            'id',
            'Provinsi',
            'Kasus_Positif',
            'Kasus_Sembuh',
            'Kasus_Meninggal',
            'Tanggal',
        ];
    }
}
