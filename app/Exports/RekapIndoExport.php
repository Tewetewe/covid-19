<?php

namespace App\Exports;

use App\RekapIndo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapIndoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $rekapIndo = RekapIndo::select('id','positif', 'sembuh', 'meninggal', 'created_at')->get();
        return $rekapIndo;
    }
    public function headings(): array
    {
        return [
            'id',
            'Kasus_Positif',
            'Kasus_Sembuh',
            'Kasus_Meninggal',
            'Tanggal',
        ];
    }
}
