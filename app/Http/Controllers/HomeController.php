<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Provinsi;
use App\ProvinsiData;
use App\Country;
use App\GlobalData;
use App\RekapIndo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $provinsi = Provinsi::select('Kode_Provi', 'Provinsi', 'Kasus_Posi', 'Kasus_Semb', 'Kasus_Meni', 'created_at')
        ->join('provinsi_data', 'provinsi.FID','=','provinsi_data.FID')
        ->orderBy('provinsi.Provinsi', 'ASC')->whereDate('created_at', '<=', date('Y-m-d'))->get();
        $global = Country::select('Country_Region', 'Confirmed', 'Deaths', 'Recovered', 'created_at')
        ->join('global_data', 'country.OBJECTID','=','global_data.OBJECTID')
        ->orderBy('country.Country_Region', 'ASC')->whereDate('created_at', '<=', date('Y-m-d'))->get();

        $dataRekapIndo = RekapIndo::get();   
        $positif = RekapIndo::orderBy('id', 'desc')->take(1)->value('positif');
        $sembuh = RekapIndo::orderBy('id', 'desc')->take(1)->value('sembuh');
        $meninggal = RekapIndo::orderBy('id', 'desc')->take(1)->value('meninggal');
        $Diff = RekapIndo::orderBy('id', 'desc')->take(2)->get();
        $dataPositif = array();
        $positifDate = array();

        for ($i=0; $i < count($dataRekapIndo); $i++) {
            array_push($positifDate, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataPositif, $dataRekapIndo[$i]->positif);
        }

        for ($i=0; $i < count($Diff); $i++) {
            $data1[$i] = $Diff[$i]->positif;
            $data2[$i] = $Diff[$i]->sembuh;
            $data3[$i] = $Diff[$i]->meninggal;
        }
        $diffPositif = $data1[0] - $data1[1];
        $diffSembuh = $data2[0] - $data2[1];
        $diffMeninggal = $data3[0] - $data3[1];

        return view('dashboard', compact('diffMeninggal','diffPositif','diffSembuh','provinsi', 'global', 'dataRekapIndo', 'dataPositif','positifDate','positif','sembuh','meninggal'));
    
    }

}
