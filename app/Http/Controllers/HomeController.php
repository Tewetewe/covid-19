<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Provinsi;
use App\ProvinsiData;
use App\Country;
use App\GlobalData;
use App\RekapIndo;
use App\RekapGlobal;
use App\BaliData;

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
        $provinsi = ProvinsiData::select('FID', 'Kasus_Posi', 'Kasus_Semb', 'Kasus_Meni', 'created_at')
        ->orderBy('provinsi_data.Kasus_Posi', 'DESC')->where('created_at', GlobalData::max('created_at'))->get();
        $global = GlobalData::select('OBJECTID', 'Confirmed', 'Deaths', 'Recovered', 'created_at', 'City', 'Province')
        ->orderBy('global_data.Confirmed', 'DESC')->where('created_at', GlobalData::max('created_at'))->get();
        $tanggal = BaliData::select('Tanggal')
        ->groupBy('Tanggal')->get();
        $baliData = BaliData::get();
        $countBali = $baliData->groupBy('Tanggal')->count();
        $tanggalBaliAja = BaliData::select('Tanggal')->orderBy('Tanggal', 'ASC')->get();
        $arrayPositif = array();
        // $positifGlobal = number_format(RekapGlobal::orderBy('id', 'desc')->take(1)->value('positif'));
        // $sembuhGlobal = number_format(RekapGlobal::orderBy('id', 'desc')->take(1)->value('sembuh'));
        // $meninggalGlobal = number_format(RekapGlobal::orderBy('id', 'desc')->take(1)->value('meninggal'));
        // $DiffGlobal = RekapGlobal::orderBy('id', 'desc')->take(2)->get();
        $dataPositifBali = array();
        $positifDateBali = array();

        for ($i=0; $i < count($tanggal); $i++) {
            array_push($positifDateBali, date('d-F', strtotime($tanggal[$i]->Tanggal)));
            array_push($dataPositifBali, $countBali);
        }
        
        $sumPositif = 0;
        for ($i=0; $i < count($tanggal); $i++) {
            $tgl1 = strtotime($tanggal[$i]->Tanggal);
            for ($j=0; $j < count($tanggalBaliAja); $j++) { 
                $tgl2 = strtotime($tanggalBaliAja[$j]->Tanggal);
                if($tgl1 == $tgl2){
                    $sumPositif++;
                }  
                
            }
            array_push($arrayPositif, $sumPositif);    
        }


        $dataRekapIndo = RekapIndo::get();   
        $positif = number_format(RekapIndo::orderBy('id', 'desc')->take(1)->value('positif'));
        $sembuh = number_format(RekapIndo::orderBy('id', 'desc')->take(1)->value('sembuh'));
        $meninggal = number_format(RekapIndo::orderBy('id', 'desc')->take(1)->value('meninggal'));

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

        $dataRekapGlobal = RekapGlobal::get();   
        $positifGlobal = number_format(RekapGlobal::orderBy('id', 'desc')->take(1)->value('positif'));
        $sembuhGlobal = number_format(RekapGlobal::orderBy('id', 'desc')->take(1)->value('sembuh'));
        $meninggalGlobal = number_format(RekapGlobal::orderBy('id', 'desc')->take(1)->value('meninggal'));
        $DiffGlobal = RekapGlobal::orderBy('id', 'desc')->take(2)->get();
        $dataPositifGlobal = array();
        $positifDateGlobal = array();

        for ($i=0; $i < count($dataRekapGlobal); $i++) {
            array_push($positifDateGlobal, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataPositifGlobal, $dataRekapGlobal[$i]->positif);
        }

        for ($i=0; $i < count($DiffGlobal); $i++) {
            $data1Global[$i] = $DiffGlobal[$i]->positif;
            $data2Global[$i] = $DiffGlobal[$i]->sembuh;
            $data3Global[$i] = $DiffGlobal[$i]->meninggal;
        }
        $diffPositifGlobal = $data1Global[0] - $data1Global[1];
        $diffSembuhGlobal = $data2Global[0] - $data2Global[1];
        $diffMeninggalGlobal = $data3Global[0] - $data3Global[1];

        
        
        return view('dashboard', compact('diffMeninggal','diffPositif','diffSembuh','provinsi','baliData',
        'global', 'dataRekapIndo', 'dataPositif','positifDate','diffMeninggalGlobal','diffPositifGlobal',
        'diffSembuhGlobal','dataRekapIndo','dataPositifBali','positifDateBali', 'dataPositifGlobal','positifDateGlobal', 
        'positif','sembuh','meninggal', 'positifGlobal','sembuhGlobal','meninggalGlobal','tanggal','arrayPositif'));

    }

}
