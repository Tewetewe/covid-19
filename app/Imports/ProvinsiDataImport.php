<?php
 
namespace App\Imports;
 
use App\ProvinsiData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;

// use Maatwebsite\Excel\Concerns\WithStartRow;
// use Maatwebsite\Excel\Imports\HeadingRowFormatter;

 
class ProvinsiDataImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
  
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new ProvinsiData([
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
        $provinsiDataInsert = [];
        ini_set('max_execution_time', 3000);
        foreach ($rows as $row){
            if($row->filter()->isNotEmpty()){
            $provinsiData = new ProvinsiData();
            $provinsiData->FID = $row['provinsi'];
            $provinsiData->Kasus_Posi  = $row['kasus_terkonfirmasi_akumulatif'];
            $provinsiData->Kasus_Semb = $row['kasus_sembuh_akumulatif'];
            $provinsiData->Kasus_meni = $row['kasus_meninggal_akumulatif'];
            $provinsiData->created_at = date('Y-m-d H:i:s', strtotime($row['tanggal']));
            $provinsiData->updated_at = date('Y-m-d H:i:s');
            $provinsiDataInsert[] = $provinsiData->attributesToArray();
            }

        }
        ProvinsiData::insert($provinsiDataInsert);
    }

}