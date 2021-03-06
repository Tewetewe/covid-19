<?php

namespace App\Exports;

use App\ProvinsiData;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Carbon\Carbon;
class ProvinsiDataExport implements FromQuery, WithHeadings
{
    public function __construct($nama, $startDate, $endDate)
    {
        $this->nama = $nama;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function query()
    {
        $query = ProvinsiData::query();

        if(!empty($this->nama)){
            $query->where('FID', 'like', "%".$this->nama."%");
        }
        if(!empty($this->startDate) && ($this->endDate)){
            $start = Carbon::parse($this->startDate);
            $end = Carbon::parse($this->endDate);
            $query->whereDate('created_at','<=',$end->format('Y-m-d'))
            ->whereDate('created_at','>=',$start->format('Y-m-d'))->select('id','FID', 'Kasus_Posi', 'Kasus_Semb', 'Kasus_Meni', 'created_at');
        }
        return $query;
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
