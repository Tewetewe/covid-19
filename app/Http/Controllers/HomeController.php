<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Provinsi;
use App\ProvinsiData;
use App\Country;
use App\GlobalData;

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
        $nowDate = date('Y-m-d');
        $provinsi = Provinsi::select('Kode_Provi', 'Provinsi', 'Kasus_Posi', 'Kasus_Semb', 'Kasus_Meni', 'created_at')
        ->join('provinsi_data', 'provinsi.FID','=','provinsi_data.FID')
        ->orderBy('provinsi.Provinsi', 'ASC')->whereDate('created_at', '=', date('Y-m-d'))->get();
        return view('dashboard', compact('provinsi'));
    
    }

}
