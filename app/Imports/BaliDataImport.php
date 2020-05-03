<?php
 
namespace App\Imports;
 
use App\BaliData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Carbon\Carbon;

// use Maatwebsite\Excel\Concerns\WithStartRow;
// use Maatwebsite\Excel\Imports\HeadingRowFormatter;

 
class BaliDataImport implements ToCollection, WithHeadingRow, WithCalculatedFormulas
{
  
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     return new BaliData([
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
        $baliDataInsert = [];

        ini_set('max_execution_time', 3000);
        foreach ($rows as $row){
            if($row->filter()->isNotEmpty()){
            $baliData = new BaliData();
            $baliData->Tanggal_Import = date("Y-m-d");
            $baliData->Resiko  = $row['resiko'];
            $baliData->Paparan = $row['paparan'];
            $baliData->Bantu = $row['bantu'];
            $baliData->No_Baru = $row['no_baru'];
            $baliData->No_kemarin = $row['no_kemarin'];
            $baliData->Tanggal = Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal']));
            $baliData->Status = $row['status'];
            $baliData->Nama = $row['nama'];
            $baliData->Penularan = $row['penularan'];
            $baliData->Negara = $row['negara'];
            $baliData->Jenis_Kelamin = $row['jk'];
            $baliData->Umur = $row['umur'];
            $baliData->Alamat = $row['alamat'];
            $baliData->Desa = $row['desa'];
            $baliData->Kecamatan = $row['kecamatan'];
            $baliData->Kabupaten = $row['kabupaten'];
            $baliData->Faskes = $row['faskes'];
            $baliData->Keterangan = $row['ket'];
            $baliData->Kondisi = $row['kondisi'];
            $baliData->Kelompok_Umur = $row['kelompok_umur'];
            $baliData->Kategori_Kasus = $row['kategori_kasus'];
            $baliData->Hubungan = $row['hubungan'];
            $baliData->created_at = date('Y-m-d H:i:s');
            $baliData->updated_at = date('Y-m-d H:i:s');
            $baliDataInsert[] = $baliData->attributesToArray();
            }

        }
        BaliData::insert($baliDataInsert);
    }

}