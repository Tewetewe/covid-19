<?php

namespace App\Http\Controllers;

use App\User;
use App\BaliData;
use App\ProvinsiData;
use App\RekapGlobal;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Provinsi;
use App\Country;
use App\GlobalData;
use App\RekapIndo;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $baliData = BaliData::get();
        return view('users.index',compact('baliData'));
    }

    public function index2(User $model)
    {
        $provinsiData = ProvinsiData::get();
        return view('users.indexProvinsi',compact('provinsiData'));
    }

    public function index3(){
        $rekapGlobalData = RekapGlobal::get();
        return view('users.indexRekapGlobal',compact('rekapGlobalData'));
    }
    public function loadData(){
        $responseIndo = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        $newResponseIndo = json_decode($responseIndo, TRUE);
        $indoRekap = Http::get('https://api.kawalcorona.com/indonesia');
        $newindoRekap = json_decode($indoRekap, TRUE);
        $responseGlobal = Http::get('https://api.covid19api.com/summary');
        $newResponseGlobal = json_decode($responseGlobal, TRUE);
        $newResponseRekapGlobal = json_decode($responseGlobal, TRUE);
        $provDataInsert = [];
        $rekapIndoInsert = [];
        $globalDataInsert = [];

        foreach ($newResponseIndo as $item){
            $provinsiData = new ProvinsiData();
            $provinsiData->FID = $item['attributes']['Provinsi'];
            $provinsiData->Kasus_Posi = $item['attributes']['Kasus_Posi'];
            $provinsiData->Kasus_Meni = $item['attributes']['Kasus_Meni'];
            $provinsiData->Kasus_Semb = $item['attributes']['Kasus_Semb'];
            $provinsiData->created_at = date('Y-m-d H:i:s');
            $provinsiData->updated_at = date('Y-m-d H:i:s');
            $provDataInsert[] = $provinsiData->attributesToArray();
        }
        foreach ($newResponseGlobal['Countries'] as $item){
            $globalData = new GlobalData();
            $globalData->OBJECTID = $item['Country'];
            $globalData->Confirmed = $item['TotalConfirmed'];
            $globalData->Deaths = $item['TotalDeaths'];
            $globalData->Recovered = $item['TotalRecovered'];
            $globalData->created_at = date('Y-m-d H:i:s');
            $globalData->updated_at = date('Y-m-d H:i:s');
            $globalDataInsert[] = $globalData->attributesToArray();
        }
        foreach($newindoRekap as $item){
            $rekapIndo = new RekapIndo();
            $rekapIndo->positif = str_replace( ',', '', $item['positif']);
            $rekapIndo->sembuh = str_replace( ',', '', $item['sembuh']);
            $rekapIndo->meninggal = str_replace( ',', '', $item['meninggal']);
            $rekapIndo->created_at = date('Y-m-d H:i:s');
            $rekapIndoInsert[] = $rekapIndo->attributesToArray();
        }
        $rekapGlobal = new RekapGlobal;
        $rekapGlobal->positif = $newResponseRekapGlobal['Global']['TotalConfirmed'];
        $rekapGlobal->sembuh = $newResponseRekapGlobal['Global']['TotalRecovered'];
        $rekapGlobal->meninggal =  $newResponseRekapGlobal['Global']['TotalDeaths'];
        $rekapGlobal->created_at = date('Y-m-d H:i:s');
        $rekapGlobal->save();
        GlobalData::insert($globalDataInsert);
        ProvinsiData::insert($provDataInsert);
        RekapIndo::insert($rekapIndoInsert);
        return redirect()->route('home');
    }
}
