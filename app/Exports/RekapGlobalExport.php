<?php

namespace App\Exports;

use App\RekapGlobal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapGlobalExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $rekapGlobal = RekapGlobal::select('id','positif', 'sembuh', 'meninggal', 'created_at')->get();
        return $rekapGlobal;
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
