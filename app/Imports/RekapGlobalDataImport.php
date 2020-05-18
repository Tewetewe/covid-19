<?php
 
namespace App\Imports;
 
use App\RekapGlobal;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;

// use Maatwebsite\Excel\Concerns\WithStartRow;
// use Maatwebsite\Excel\Imports\HeadingRowFormatter;

 
class RekapGlobalDataImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
  
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new RekapGlobalData([
    //         'nama' => $row[1],
    //         'nis' => $row[2], 
    //         'alamat' => $row[3], 
    //     ]);
    // }

    // public function startRow(): int
    // {
    //     return 2;
    // }

    

    public function collection(Collection $rows)
    {
        $rekapGlobalInsert = [];

        ini_set('max_execution_time', 3000);
        foreach ($rows as $row){
            if($row->filter()->isNotEmpty()){
            $rekapGlobalData = new RekapGlobal();
            $rekapGlobalData->positif = $row['confirmed'] ?? '0';
            $rekapGlobalData->sembuh  = $row['recovered'] ?? '0';
            $rekapGlobalData->meninggal = $row['deaths'] ?? '0';
            $rekapGlobalData->created_at = date('Y-m-d H:i:s', strtotime($row['updated']));
            $rekapGlobalInsert[] = $rekapGlobalData->attributesToArray();
            
            }
        }
        RekapGlobal::insert($rekapGlobalInsert);
    }

}