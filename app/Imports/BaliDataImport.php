<?php
 
namespace App\Imports;
 
use App\BaliData;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
// use Maatwebsite\Excel\Concerns\WithStartRow;
// use Maatwebsite\Excel\Imports\HeadingRowFormatter;

 
class BaliDataImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
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

    

    public function model(array $row)
    {
        return new BaliData([
            'Tanggal_Import' => date("Y-m-d"),
            'Resiko'  => $row['resiko'],
            'Paparan' => $row['paparan'],
            'Bantu' => $row['bantu'],
            'No_Baru' => $row['no_baru'],
            'No_kemarin' =>$row['no_kemarin'],
            'Tanggal' => $row['tanggal'],
            'Status' => $row['status'],
            'Nama' => $row['nama'],
            'Penularan' => $row['penularan'],
            'Negara' => $row['negara'],
            'Jenis_Kelamin' => $row['jk'],
            'Umur' => $row['umur'],
            'Alamat' => $row['alamat'],
            'Desa' => $row['desa'],
            'Kecamatan' => $row['kecamatan'],
            'Kabupaten' => $row['kabupaten'],
            'Faskes' => $row['faskes'],
            'Keterangan' => $row['ket'],
            'Kondisi' => $row['kondisi'],
            'Kelompok_Umur' => $row['kelompok_umur'],
            'Kategori_Kasus' => $row['kategori_kasus'],
            'Hubungan' => $row['hubungan'],

        ]);
    }

}