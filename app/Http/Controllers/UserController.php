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
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProvinsiDataExport;
use Session;
use App\Exports\RekapGlobalExport;
use App\Exports\GlobalDataExport;


class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $baliData = BaliData::get();
        return view('users.index',compact('baliData'));
    }

    public function index2()
    {
        $provinsiData = ProvinsiData::where('created_at', ProvinsiData::max('created_at'))->get();
        return view('users.indexProvinsi',compact('provinsiData'));
    }
    public function filterProvinsi(Request $request)
    {
        $nama = $request->nama;
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $query = ProvinsiData::query();
        if(!empty($nama)){
            $query->where('FID', 'like', "%".$nama."%");
        }
        if(!empty($startDate) && ($endDate)){
            $start = Carbon::parse($startDate);
            $end = Carbon::parse($endDate);
            $query->whereDate('created_at','<=',$end->format('Y-m-d'))
            ->whereDate('created_at','>=',$start->format('Y-m-d'));
          
        }
        $provinsiData = $query->get();
        Session::put('nama', $nama);
        Session::put('startDate', $startDate);
        Session::put('endDate', $endDate);
        return view('users.indexProvinsi',compact('provinsiData'));
        // return Excel::download(new ProvinsiDataExport($nama, $startDate, $endDate), $nama_file);

    }
    public function exportProvinsiData()
    {
        $nama = Session::get('nama');
        $startDate = Session::get('startDate');
        $endDate = Session::get('endDate');
        $nama_file = 'laporan_provinsi_data_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new ProvinsiDataExport($nama, $startDate, $endDate), $nama_file);
    }

    public function index3(){
        $rekapGlobalData = RekapGlobal::get();
        return view('users.indexRekapGlobal',compact('rekapGlobalData'));
    }
    public function rekapIndo(){
        $rekapIndo = RekapIndo::get();
        return view('users.indexRekapIndo',compact('rekapIndo'));
    }
    public function globalData(){
        $globalData = GlobalData::where('created_at', GlobalData::max('created_at'))->get();
        return view('users.indexGlobalData',compact('globalData'));
    }
    public function filterGlobal(Request $request)
    {
        $nama = $request->nama;
        $startDate = $request->startDate;
        $endDate = $request->endDate;

        $query = GlobalData::query()->where('Province', NULL);
        if(!empty($nama)){
            $query->where('OBJECTID', 'like', "%".$nama."%");
        }
        if(!empty($startDate) && ($endDate)){
            $start = Carbon::parse($startDate);
            $end = Carbon::parse($endDate);
            $query->whereDate('created_at','<=',$end->format('Y-m-d'))
            ->whereDate('created_at','>=',$start->format('Y-m-d'));
          
        }
        $globalData = $query->get();
        Session::put('namaGlobal', $nama);
        Session::put('startDateGlobal', $startDate);
        Session::put('endDateGlobal', $endDate);
        return view('users.indexGlobalData', compact('globalData'));
        // return Excel::download(new ProvinsiDataExport($nama, $startDate, $endDate), $nama_file);

    }
    public function exportGlobalData()
    {
        $nama = Session::get('namaGlobal');
        $startDate = Session::get('startDateGlobal');
        $endDate = Session::get('endDateGlobal');
        $nama_file = 'laporan_global_data_'.date('Y-m-d_H-i-s').'.xlsx';
        return Excel::download(new GlobalDataExport($nama, $startDate, $endDate), $nama_file);
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
            $provinsiData->created_at = date('Y-m-d H:i');
            $provinsiData->updated_at = date('Y-m-d H:i:s');
            $provDataInsert[] = $provinsiData->attributesToArray();
        }
       
        foreach($newindoRekap as $item){
            $rekapIndo = new RekapIndo();
            $rekapIndo->positif = str_replace( ',', '', $item['positif']);
            $rekapIndo->sembuh = str_replace( ',', '', $item['sembuh']);
            $rekapIndo->meninggal = str_replace( ',', '', $item['meninggal']);
            $rekapIndo->created_at = date('Y-m-d H:i');
            $rekapIndoInsert[] = $rekapIndo->attributesToArray();
        }
        if (is_array($newResponseGlobal) || is_object($newResponseGlobal))
        {
            foreach ($newResponseGlobal['Countries'] as $item){
                $globalData = new GlobalData();
                $globalData->OBJECTID = $item['Country'];
                $globalData->Confirmed = $item['TotalConfirmed'];
                $globalData->Deaths = $item['TotalDeaths'];
                $globalData->Recovered = $item['TotalRecovered'];
                $globalData->created_at = date('Y-m-d H:i');
                $globalData->updated_at = date('Y-m-d H:i:s');
                $globalDataInsert[] = $globalData->attributesToArray();
            }
        }
        $rekapGlobal = new RekapGlobal;
        $rekapGlobal->positif = $newResponseRekapGlobal['Global']['TotalConfirmed'];
        $rekapGlobal->sembuh = $newResponseRekapGlobal['Global']['TotalRecovered'];
        $rekapGlobal->meninggal =  $newResponseRekapGlobal['Global']['TotalDeaths'];
        $rekapGlobal->created_at = date('Y-m-d H:i');
        $rekapGlobal->save();
        GlobalData::insert($globalDataInsert);
        ProvinsiData::insert($provDataInsert);
        RekapIndo::insert($rekapIndoInsert);
        return redirect()->route('home');
    }
}
