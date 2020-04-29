<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Provinsi;
use App\ProvinsiData;
use App\Country;
use App\GlobalData;
use Carbon\Carbon;

class LoadData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'load:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To load data covid for indo province and global';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $responseIndo = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        $newResponseIndo = json_decode($responseIndo, TRUE);
        $responseGlobal = Http::get('https://api.kawalcorona.com/');
        $newResponseGlobal = json_decode($responseGlobal, TRUE);
        
        // $provInsert = [];
        // foreach ($newResponse as $item){
        //     $provinsi = new Provinsi();
        //     $provinsi->FID = $item['attributes']['FID'];
        //     $provinsi->Kode_Provi = $item['attributes']['Kode_Provi'];
        //     $provinsi->Provinsi = $item['attributes']['Provinsi'];
        //     $provInsert[] = $provinsi->attributesToArray();
        // }
        // Provinsi::insert($provInsert);
        $provDataInsert = [];
        $globalDataInsert = [];
        foreach ($newResponseIndo as $item){
            $provinsiData = new ProvinsiData();
            $provinsiData->FID = $item['attributes']['FID'];
            $provinsiData->Kasus_Posi = $item['attributes']['Kasus_Posi'];
            $provinsiData->Kasus_Meni = $item['attributes']['Kasus_Meni'];
            $provinsiData->Kasus_Semb = $item['attributes']['Kasus_Semb'];
            $provinsiData->created_at = date('Y-m-d H:i:s');
            $provinsiData->updated_at = date('Y-m-d H:i:s');
            $provDataInsert[] = $provinsiData->attributesToArray();
        }
        foreach ($newResponseGlobal as $item){
            $globalData = new GlobalData();
            $globalData->OBJECTID = $item['attributes']['OBJECTID'];
            $globalData->Last_Update = $item['attributes']['Last_Update'];
            $globalData->Lat = $item['attributes']['Lat'];
            $globalData->Long_ = $item['attributes']['Long_'];
            $globalData->Confirmed = $item['attributes']['Confirmed'];
            $globalData->Deaths = $item['attributes']['Deaths'];
            $globalData->Recovered = $item['attributes']['Deaths'];
            $globalData->Active = $item['attributes']['Active'];
            $globalData->created_at = date('Y-m-d H:i:s');
            $globalData->updated_at = date('Y-m-d H:i:s');
            $globalDataInsert[] = $globalData->attributesToArray();
        }
        ProvinsiData::insert($provDataInsert);
        GlobalData::insert($globalDataInsert);
        $this->info('Data Berhasil Disimpan');
    }
}
