<?php

namespace App\Exports;

use App\GlobalData;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;
use Carbon\Carbon;
class GlobalDataExport implements FromQuery, WithHeadings
{
    public function __construct($nama, $startDate, $endDate)
    {
        $this->nama = $nama;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }
    public function query()
    {
        $query = GlobalData::query();

        if(!empty($this->nama)){
            $query->where('OBJECTID', 'like', "%".$this->nama."%")->where('Province','')->orWhere('Province', NULL);
        }
        if(!empty($this->startDate) && ($this->endDate)){
            $start = Carbon::parse($this->startDate);
            $end = Carbon::parse($this->endDate);
            $query->whereDate('created_at','<=',$end->format('Y-m-d'))
            ->whereDate('created_at','>=',$start->format('Y-m-d'))->select('id','OBJECTID', 'Confirmed', 'Recovered','Deaths','created_at');
        }
        return $query;
    }

    public function headings(): array
    {
        return [
            'id',
            'Negara',
            'Kasus_Positif',
            'Kasus_Sembuh',
            'Kasus_Meninggal',
            'Tanggal',
        ];
    }
}
