<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Provinsi;
use App\ProvinsiData;
use App\Country;
use App\GlobalData;
use App\RekapGlobal;
use App\RekapIndo;
use Carbon\Carbon;
use Storage;


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
        // $responseIndo = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        // $newResponseIndo = json_decode($responseIndo, TRUE);
        // $responseGlobal = Http::get('https://api.kawalcorona.com/');
        // $newResponseGlobal = json_decode($responseGlobal, TRUE);
        // $positifGlobal = Http::get('https://api.kawalcorona.com/positif');
        // $newpositifGlobal = json_decode($positifGlobal, TRUE);
        // $sembuhGlobal = Http::get('https://api.kawalcorona.com/sembuh');
        // $newsembuhGlobal = json_decode($sembuhGlobal, TRUE);
        // $meninggalGlobal = Http::get('https://api.kawalcorona.com/meninggal');
        // $newmeninggalGlobal = json_decode($meninggalGlobal, TRUE);
        // $indoRekap = Http::get('https://api.kawalcorona.com/indonesia');
        // $newindoRekap = json_decode($indoRekap, TRUE);
        // $indoRekap = Http::get('https://api.covid19api.com/dayone/country/indonesia');
        // $newindoRekap = json_decode($indoRekap, TRUE);
        // $responseGlobal = Http::get('https://api.covid19api.com/summary');
        // $newResponseGlobal = json_decode($responseGlobal, TRUE);
        $responseRekapGlobal = Http::get('https://api.covid19api.com/summary');
        $newResponseRekapGlobal = json_decode($responseRekapGlobal, TRUE);
        // $path = 'public/json/response.json';
        // $newResponseGlobal = json_decode(file_get_contents($path), true);
        // $provInsert = [];
        // foreach ($newResponse as $item){
        //     $provinsi = new Provinsi();
        //     $provinsi->FID = $item['attributes']['FID'];
        //     $provinsi->Kode_Provi = $item['attributes']['Kode_Provi'];
        //     $provinsi->Provinsi = $item['attributes']['Provinsi'];
        //     $provInsert[] = $provinsi->attributesToArray();
        // }
        // Provinsi::insert($provInsert);
        // $provDataInsert = [];
        // $globalDataInsert = [];
        // $rekapIndoInsert = [];
        // foreach ($newResponseIndo as $item){
        //     $provinsiData = new ProvinsiData();
        //     $provinsiData->FID = $item['attributes']['Provinsi'];
        //     $provinsiData->Kasus_Posi = $item['attributes']['Kasus_Posi'];
        //     $provinsiData->Kasus_Meni = $item['attributes']['Kasus_Meni'];
        //     $provinsiData->Kasus_Semb = $item['attributes']['Kasus_Semb'];
        //     $provinsiData->created_at = date('2020-05-17 16:00:00');
        //     $provinsiData->updated_at = date('Y-m-d H:i:s');
        //     $provDataInsert[] = $provinsiData->attributesToArray();
        // }
        // foreach ($newResponseGlobal as $item){
        //     $globalData = new GlobalData();
        //     $globalData->OBJECTID = $item['attributes']['OBJECTID'];
        //     $globalData->Last_Update = $item['attributes']['Last_Update'];
        //     $globalData->Lat = $item['attributes']['Lat'];
        //     $globalData->Long_ = $item['attributes']['Long_'];
        //     $globalData->Confirmed = $item['attributes']['Confirmed'];
        //     $globalData->Deaths = $item['attributes']['Deaths'];
        //     $globalData->Recovered = $item['attributes']['Recovered'];
        //     $globalData->Active = $item['attributes']['Active'];
        //     $globalData->created_at = date('Y-m-d H:i:s');
        //     $globalData->updated_at = date('Y-m-d H:i:s');
        //     $globalDataInsert[] = $globalData->attributesToArray();
        // }
        // foreach ($newResponseGlobal as $item){
        //     $globalData = new GlobalData();
        //     $globalData->OBJECTID = $item['Country'];
        //     $globalData->Lat = $item['Lat'];
        //     $globalData->Long_ = $item['Lon'];
        //     $globalData->Confirmed = $item['Confirmed'];
        //     $globalData->Deaths = $item['Deaths'];
        //     $globalData->Recovered = $item['Recovered'];
        //     $globalData->Active = $item['Active'];
        //     $globalData->Province = $item['Province'];
        //     $globalData->City = $item['City'];
        //     $globalData->created_at = date('Y-m-d H:i:s', strtotime($item['Date']));
        //     $globalData->updated_at = date('Y-m-d H:i:s');
        //     $globalData->save();
        //     // $globalDataInsert[] = $globalData->attributesToArray();
        // }
        // foreach ($newResponseGlobal['Countries'] as $item){
        //     $globalData = new GlobalData();
        //     $globalData->OBJECTID = $item['Country'];
        //     $globalData->Confirmed = $item['TotalConfirmed'];
        //     $globalData->Deaths = $item['TotalDeaths'];
        //     $globalData->Recovered = $item['TotalRecovered'];
        //     $globalData->created_at = date('Y-m-d H:i:s', strtotime($item['Date']));
        //     $globalData->updated_at = date('Y-m-d H:i:s');
        //     $globalData->save();
        //     // $globalDataInsert[] = $globalData->attributesToArray();
        // }
        
        // foreach($newindoRekap as $item){
        //     $rekapIndo = new RekapIndo();
        //     $rekapIndo->positif = str_replace( ',', '', $item['positif']);
        //     $rekapIndo->sembuh = str_replace( ',', '', $item['sembuh']);
        //     $rekapIndo->meninggal = str_replace( ',', '', $item['meninggal']);
        //     $rekapIndo->created_at = date('Y-m-d H:i:s');
        //     $rekapIndoInsert[] = $rekapIndo->attributesToArray();
        // }
        // foreach($newindoRekap as $item){
        //     $rekapIndo = new RekapIndo();
        //     $rekapIndo->positif = $item['Confirmed'];
        //     $rekapIndo->sembuh = $item['Recovered'];
        //     $rekapIndo->meninggal = $item['Deaths'];
        //     $rekapIndo->created_at =date('Y-m-d H:i:s', strtotime($item['Date']));
        //     $rekapIndoInsert[] = $rekapIndo->attributesToArray();
        // }
        $rekapGlobal = new RekapGlobal;
        $rekapGlobal->positif = $newResponseRekapGlobal['Global']['TotalConfirmed'];
        $rekapGlobal->sembuh = $newResponseRekapGlobal['Global']['TotalRecovered'];
        $rekapGlobal->meninggal =  $newResponseRekapGlobal['Global']['TotalDeaths'];
        $rekapGlobal->created_at = date('Y-m-d H:i:s');
        $rekapGlobal->save();
        // ProvinsiData::insert($provDataInsert);
        // GlobalData::insert($globalDataInsert);
        // RekapIndo::insert($rekapIndoInsert);
        $this->info('berhasil');
    }
}
