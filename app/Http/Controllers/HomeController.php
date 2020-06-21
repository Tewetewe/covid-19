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
use Carbon\Carbon;

use Illuminate\Http\Request;


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
        ->whereMonth('created_at', Carbon::now()->month)->orderBy('created_at','ASC')->orderBy('FID', 'ASC')->get();
        $global = GlobalData::select('OBJECTID', 'Confirmed', 'Deaths', 'Recovered', 'created_at', 'City', 'Province')
        ->whereMonth('created_at', Carbon::now()->month)->orderBy('created_at','ASC')->orderBy('OBJECTID', 'ASC')->get();
        $tanggal = BaliData::select('Tanggal')
        ->groupBy('Tanggal')->get();
        $baliData = BaliData::get();
        $countBali = $baliData->groupBy('Tanggal')->count();
        $tanggalBaliAja = BaliData::select('Tanggal')->orderBy('Tanggal', 'ASC')->get();
        $arrayPositif = array();
        $namaProvinsi = ProvinsiData::select('FID')
        ->orderBy('provinsi_data.Kasus_Posi', 'DESC')->where('created_at', ProvinsiData::max('created_at'))->get();
        // $positifGlobal = number_format(RekapGlobal::orderBy('id', 'desc')->take(1)->value('positif'));
        // $sembuhGlobal = number_format(RekapGlobal::orderBy('id', 'desc')->take(1)->value('sembuh'));
        // $meninggalGlobal = number_format(RekapGlobal::orderBy('id', 'desc')->take(1)->value('meninggal'));
        // $DiffGlobal = RekapGlobal::orderBy('id', 'desc')->take(2)->get();
        // $dataPositifBali = array();
        // $positifDateBali = array();

        // for ($i=0; $i < count($tanggal); $i++) {
        //     array_push($positifDateBali, date('d-F', strtotime($tanggal[$i]->Tanggal)));
        //     array_push($dataPositifBali, $countBali);
        // }
        
        // $sumPositif = 0;
        // for ($i=0; $i < count($tanggal); $i++) {
        //     $tgl1 = strtotime($tanggal[$i]->Tanggal);
        //     for ($j=0; $j < count($tanggalBaliAja); $j++) { 
        //         $tgl2 = strtotime($tanggalBaliAja[$j]->Tanggal);
        //         if($tgl1 == $tgl2){
        //             $sumPositif++;
        //         }  
                
        //     }
        //     array_push($arrayPositif, $sumPositif);    
        // }


        $dataRekapIndo = RekapIndo::orderBy('created_at', 'asc')->get();   
        $positif = RekapIndo::orderBy('created_at', 'desc')->take(1)->value('positif');
        $sembuh = RekapIndo::orderBy('created_at', 'desc')->take(1)->value('sembuh');
        $meninggal = RekapIndo::orderBy('created_at', 'desc')->take(1)->value('meninggal');
        $dirawat = $positif-$sembuh-$meninggal;
        $persenSembuh = number_format(($sembuh/$positif*100),2);
        $persenMeninggal = number_format(($meninggal/$positif*100),2);
        $persenDirawat = number_format(($dirawat/$positif*100), 2);
        $positif = number_format($positif);
        $sembuh = number_format($sembuh);
        $meninggal = number_format($meninggal);
        $dirawat = number_format($dirawat);

        $Diff = RekapIndo::orderBy('created_at', 'desc')->take(2)->get();
        $dataPositif = array();
        $dataSembuh = array();
        $dataMeninggal = array();
        $dataDirawat = array();

        $positifDate = array();
        $sembuhDate = array();
        $meninggalDate = array();
        $dirawatDate = array();

        for ($i=0; $i < count($dataRekapIndo); $i++) {
            array_push($positifDate, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataPositif, $dataRekapIndo[$i]->positif);
        }
        for ($i=0; $i < count($dataRekapIndo); $i++) {
            array_push($sembuhDate, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataSembuh, $dataRekapIndo[$i]->sembuh);
        }
        for ($i=0; $i < count($dataRekapIndo); $i++) {
            array_push($meninggalDate, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataMeninggal, $dataRekapIndo[$i]->meninggal);
        }
        for ($i=0; $i < count($dataRekapIndo); $i++) {
            array_push($dirawatDate, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataDirawat, ($dataRekapIndo[$i]->positif - $dataRekapIndo[$i]->sembuh - $dataRekapIndo[$i]->meninggal));
        }

        $dataPositifDiff = array();
        $dataSembuhDiff = array();
        $dataMeninggalDiff = array();
        $dataDirawatDiff = array();

        $positifDateDiff = array();
        $sembuhDateDiff = array();
        $meninggalDateDiff = array();
        $dirawatDateDiff = array();

        for ($i=1; $i < count($dataRekapIndo); $i++) {
            $selisihIndo = (($dataRekapIndo[$i]->positif)-($dataRekapIndo[$i-1]->positif));
            if ($selisihIndo < 0){
                $selisihIndo = 0;
            }
            array_push($positifDateDiff, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataPositifDiff, $selisihIndo);
        }
        for ($i=1; $i < count($dataRekapIndo); $i++) {
            $selisihIndo = (($dataRekapIndo[$i]->sembuh)-($dataRekapIndo[$i-1]->sembuh));
            if ($selisihIndo < 0){
                $selisihIndo = 0;
            }
            array_push($sembuhDateDiff, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataSembuhDiff, $selisihIndo);
        }
        for ($i=1; $i < count($dataRekapIndo); $i++) {
            $selisihIndo = (($dataRekapIndo[$i]->sembuh)-($dataRekapIndo[$i-1]->sembuh));
            if ($selisihIndo < 0){
                $selisihIndo = 0;
            }
            array_push($meninggalDateDiff, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataMeninggalDiff, $selisihIndo);
        }
        for ($i=1; $i < count($dataRekapIndo); $i++) {
            $selisihIndo = (($dataRekapIndo[$i]->positif - $dataRekapIndo[$i]->sembuh - $dataRekapIndo[$i]->meninggal) - ($dataRekapIndo[$i-1]->positif - $dataRekapIndo[$i-1]->sembuh - $dataRekapIndo[$i-1]->meninggal));
            if ($selisihIndo < 0){
                $selisihIndo = 0;
            }
            array_push($dirawatDateDiff, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataDirawatDiff, $selisihIndo);
        }

        for ($i=0; $i < count($Diff); $i++) {
            $data1[$i] = $Diff[$i]->positif;
            $data2[$i] = $Diff[$i]->sembuh;
            $data3[$i] = $Diff[$i]->meninggal;
        }
        $diffPositif = $data1[0] - $data1[1];
        $diffSembuh = $data2[0] - $data2[1];
        $diffMeninggal = $data3[0] - $data3[1];
        $diffDirawat = ($data1[0]-$data2[0]-$data3[0])-($data1[1]-$data2[1]-$data3[1]);


        $dataRekapGlobal = RekapGlobal::orderBy('created_at', 'asc')->get();   
        $positifGlobal = RekapGlobal::orderBy('created_at', 'desc')->take(1)->value('positif');
        $sembuhGlobal = RekapGlobal::orderBy('created_at', 'desc')->take(1)->value('sembuh');
        $meninggalGlobal = RekapGlobal::orderBy('created_at', 'desc')->take(1)->value('meninggal');
        $dirawatGlobal = $positifGlobal-$sembuhGlobal-$meninggalGlobal;
        $persenSembuhGlobal = number_format(($sembuhGlobal/$positifGlobal*100),2);
        $persenMeninggalGlobal = number_format(($meninggalGlobal/$positifGlobal*100),2);
        $persenDirawatGlobal = number_format(($dirawatGlobal/$positifGlobal*100), 2);
        $positifGlobal = number_format($positifGlobal);
        $sembuhGlobal = number_format($sembuhGlobal);
        $meninggalGlobal = number_format($meninggalGlobal);
        $dirawatGlobal = number_format($dirawatGlobal);

        $DiffGlobal = RekapGlobal::orderBy('created_at', 'desc')->take(2)->get();

        $dataPositifGlobal = array();
        $dataSembuhGlobal = array();
        $dataMeninggalGlobal = array();
        $dataDirawatGlobal = array();

        $positifDateGlobal = array();
        $sembuhDateGlobal = array();
        $meninggalDateGlobal = array();
        $dirawatDateGlobal = array();

        for ($i=0; $i < count($dataRekapGlobal); $i++) {
            array_push($positifDateGlobal, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataPositifGlobal, $dataRekapGlobal[$i]->positif);
        }
        for ($i=0; $i < count($dataRekapGlobal); $i++) {
            array_push($sembuhDateGlobal, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataSembuhGlobal, $dataRekapGlobal[$i]->sembuh);
        }
        for ($i=0; $i < count($dataRekapGlobal); $i++) {
            array_push($meninggalDateGlobal, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataMeninggalGlobal, $dataRekapGlobal[$i]->meninggal);
        }
        for ($i=0; $i < count($dataRekapGlobal); $i++) {
            array_push($dirawatDateGlobal, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataDirawatGlobal, ($dataRekapGlobal[$i]->positif - $dataRekapGlobal[$i]->sembuh - $dataRekapGlobal[$i]->meninggal));
        }

        $dataPositifGlobalDiff = array();
        $dataSembuhGlobalDiff = array();
        $dataMeninggalGlobalDiff = array();
        $dataDirawatGlobalDiff = array();

        $positifDateGlobalDiff = array();
        $sembuhDateGlobalDiff = array();
        $meninggalDateGlobalDiff = array();
        $dirawatDateGlobalDiff = array();

        for ($i=1; $i < count($dataRekapGlobal); $i++) {
            $selisihGlobal = (($dataRekapGlobal[$i]->positif)-($dataRekapGlobal[$i-1]->positif));
            if ($selisihGlobal < 0){
                $selisihGlobal = 0;
            }
            array_push($positifDateGlobalDiff, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataPositifGlobalDiff, $selisihGlobal);
        }
        for ($i=1; $i < count($dataRekapGlobal); $i++) {
            $selisihGlobalSembuh = (($dataRekapGlobal[$i]->sembuh)-($dataRekapGlobal[$i-1]->sembuh));
            if ($selisihGlobalSembuh < 0){
                $selisihGlobalSembuh = 0;
            }
            array_push($sembuhDateGlobalDiff, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataSembuhGlobalDiff, $selisihGlobalSembuh);
        }
        for ($i=1; $i < count($dataRekapGlobal); $i++) {
            $selisihGlobalMeninggal = (($dataRekapGlobal[$i]->meninggal)-($dataRekapGlobal[$i-1]->meninggal));
            if ($selisihGlobalMeninggal < 0){
                $selisihGlobalMeninggal = 0;
            }
            array_push($meninggalDateGlobalDiff, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataMeninggalGlobalDiff, $selisihGlobalMeninggal);
        }
        for ($i=1; $i < count($dataRekapGlobal); $i++) {
            $selisihGlobalDirawat = (($dataRekapGlobal[$i]->positif) - ($dataRekapGlobal[$i]->sembuh) - ($dataRekapGlobal[$i]->meninggal))-(($dataRekapGlobal[$i-1]->positif) - ($dataRekapGlobal[$i-1]->sembuh) - ($dataRekapGlobal[$i-1]->meninggal));
            if($selisihGlobalDirawat < 0){
                $selisihGlobalDirawat = 0;
            }
            array_push($dirawatDateGlobalDiff, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataDirawatGlobalDiff, $selisihGlobalDirawat);
        }

        for ($i=0; $i < count($DiffGlobal); $i++) {
            $data1Global[$i] = $DiffGlobal[$i]->positif;
            $data2Global[$i] = $DiffGlobal[$i]->sembuh;
            $data3Global[$i] = $DiffGlobal[$i]->meninggal;
        }
        $diffPositifGlobal = $data1Global[0] - $data1Global[1];
        $diffSembuhGlobal = $data2Global[0] - $data2Global[1];
        $diffMeninggalGlobal = $data3Global[0] - $data3Global[1];
        $diffDirawatGlobal = ($data1Global[0]-$data2Global[0]-$data3Global[0])-($data1Global[1]-$data2Global[1]-$data3Global[1]);


        $dataProvinsi = ProvinsiData::where('FID','DKI Jakarta')->orderBy('created_at', 'asc')->get();   
        $positifProv = ProvinsiData::orderBy('created_at', 'desc')->where('FID','DKI Jakarta')->take(1)->value('Kasus_Posi');
        $sembuhProv = ProvinsiData::orderBy('created_at', 'desc')->where('FID','DKI Jakarta')->take(1)->value('Kasus_Semb');
        $meninggalProv = ProvinsiData::orderBy('created_at', 'desc')->where('FID','DKI Jakarta')->take(1)->value('Kasus_Meni');
        $dirawatProv = $positifProv-$sembuhProv-$meninggalProv;
        $persenSembuhProv = number_format(($sembuhProv/$positifProv*100),2);
        $persenMeninggalProv = number_format(($meninggalProv/$positifProv*100),2);
        $persenDirawatProv = number_format(($dirawatProv/$positifProv*100), 2);
        $positifProv = number_format($positifProv);
        $sembuhProv = number_format($sembuhProv);
        $meninggalProv = number_format($meninggalProv);
        $dirawatProv = number_format($dirawatProv);
        $nama = "DKI Jakarta";

        $DiffProv = ProvinsiData::where('FID','DKI Jakarta')->orderBy('created_at', 'desc')->take(2)->get();
        $dataPositifProv = array();
        $dataSembuhProv = array();
        $dataMeninggalProv = array();
        $dataDirawatProv = array();

        $positifDateProv = array();
        $sembuhDateProv = array();
        $meninggalDateProv = array();
        $dirawatDateProv = array();

        $dataPositifProvDiff = array();
        $dataSembuhProvDiff = array();
        $dataMeninggalProvDiff = array();
        $dataDirawatProvDiff = array();

        $positifDateProvDiff = array();
        $sembuhDateProvDiff = array();
        $meninggalDateProvDiff = array();
        $dirawatDateProvDiff = array();

        for ($i=1; $i < count($dataProvinsi); $i++) {
            $selisih = (($dataProvinsi[$i]->Kasus_Posi)-($dataProvinsi[$i-1]->Kasus_Posi));
            if ($selisih < 0){
                $selisih = 0;
            }
            array_push($positifDateProvDiff, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataPositifProvDiff, $selisih);
        }
        for ($i=1; $i < count($dataProvinsi); $i++) {
            $selisih = (($dataProvinsi[$i]->Kasus_Semb)-($dataProvinsi[$i-1]->Kasus_Semb));
            if ($selisih < 0){
                $selisih = 0;
            }
            array_push($sembuhDateProvDiff, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataSembuhProvDiff, $selisih);
        }
        for ($i=1; $i < count($dataProvinsi); $i++) {
            $selisih = (($dataProvinsi[$i]->Kasus_Meni)-($dataProvinsi[$i-1]->Kasus_Meni));
            if ($selisih < 0){
                $selisih = 0;
            }
            array_push($meninggalDateProvDiff, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataMeninggalProvDiff, $selisih);
        }
        for ($i=1; $i < count($dataProvinsi); $i++) {
            $selisih = (($dataProvinsi[$i]->Kasus_Posi - $dataProvinsi[$i]->Kasus_Semb - $dataProvinsi[$i]->Kasus_Meni) - ($dataProvinsi[$i-1]->Kasus_Posi - $dataProvinsi[$i-1]->Kasus_Semb - $dataProvinsi[$i-1]->Kasus_Meni));
            if ($selisih < 0){
                $selisih = 0;
            }
            array_push($dirawatDateProvDiff, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataDirawatProvDiff, $selisih);
        }


        for ($i=0; $i < count($dataProvinsi); $i++) {
            array_push($positifDateProv, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataPositifProv, $dataProvinsi[$i]->Kasus_Posi);
        }
        for ($i=0; $i < count($dataProvinsi); $i++) {
            array_push($sembuhDateProv, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataSembuhProv, $dataProvinsi[$i]->Kasus_Semb);
        }
        for ($i=0; $i < count($dataProvinsi); $i++) {
            array_push($meninggalDateProv, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataMeninggalProv, $dataProvinsi[$i]->Kasus_Meni);
        }
        for ($i=0; $i < count($dataProvinsi); $i++) {
            array_push($dirawatDateProv, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataDirawatProv, $dataProvinsi[$i]->Kasus_Posi - $dataProvinsi[$i]->Kasus_Semb - $dataProvinsi[$i]->Kasus_Meni);
        }

        for ($i=0; $i < count($DiffProv); $i++) {
            $data1Prov[$i] = $DiffProv[$i]->Kasus_Posi;
            $data2Prov[$i] = $DiffProv[$i]->Kasus_Semb;
            $data3Prov[$i] = $DiffProv[$i]->Kasus_Meni;
        }
        $diffPositifProv = $data1Prov[0] - $data1Prov[1];
        $diffSembuhProv = $data2Prov[0] - $data2Prov[1];
        $diffMeninggalProv = $data3Prov[0] - $data3Prov[1];
        $diffDirawatProv = ($data1Prov[0]-$data2Prov[0]-$data3Prov[0])-($data1Prov[1]-$data2Prov[1]-$data3Prov[1]);



        $dataBali = ProvinsiData::where('FID','Bali')->orderBy('created_at', 'asc')->get();   
        $positifBali = (ProvinsiData::orderBy('created_at', 'desc')->where('FID','Bali')->take(1)->value('Kasus_Posi'));
        $sembuhBali = (ProvinsiData::orderBy('created_at', 'desc')->where('FID','Bali')->take(1)->value('Kasus_Semb'));
        $meninggalBali = (ProvinsiData::orderBy('created_at', 'desc')->where('FID','Bali')->take(1)->value('Kasus_Meni'));
        $DiffBali = ProvinsiData::where('FID','Bali')->orderBy('created_at', 'desc')->take(2)->get();

        $dataPositifBali = array();
        $dataSembuhBali = array();
        $dataMeninggalBali = array();
        $dataDirawatBali = array();
        
        $positifDateBali = array();
        $sembuhDateBali = array();
        $meninggalDateBali = array();
        $dirawatDateBali = array();

        $dirawatBali = $positifBali-$sembuhBali-$meninggalBali;
        $persenSembuhBali = number_format(($sembuhBali/$positifBali*100),2);
        $persenMeninggalBali = number_format(($meninggalBali/$positifBali*100),2);
        $persenDirawatBali = number_format(($dirawatBali/$positifBali*100), 2);
        $positifBali = number_format($positifBali);
        $sembuhBali = number_format($sembuhBali);
        $meninggalBali = number_format($meninggalBali);
        $dirawatBali = number_format($dirawatBali);

        $dataPositifBaliDiff = array();
        $dataSembuhBaliDiff = array();
        $dataMeninggalBaliDiff = array();
        $dataDirawatBaliDiff = array();

        $positifDateBaliDiff = array();
        $sembuhDateBaliDiff = array();
        $meninggalDateBaliDiff = array();
        $dirawatDateBaliDiff = array();

        for ($i=1; $i < count($dataBali); $i++) {
            $selisihBali = (($dataBali[$i]->Kasus_Posi)-($dataBali[$i-1]->Kasus_Posi));
            if($selisihBali < 0){
                $selisihBali = 0;
            }
            array_push($positifDateBaliDiff, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataPositifBaliDiff, $selisihBali);
        }
        for ($i=1; $i < count($dataBali); $i++) {
            $selisihBali = (($dataBali[$i]->Kasus_Semb)-($dataBali[$i-1]->Kasus_Semb));
            if ($selisihBali < 0){
                $selisihBali = 0;
            }
            array_push($sembuhDateBaliDiff, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataSembuhBaliDiff, $selisihBali);
        }
        for ($i=1; $i < count($dataBali); $i++) {
            $selisihBali = (($dataBali[$i]->Kasus_Meni)-($dataBali[$i-1]->Kasus_Meni));
            if($selisihBali < 0){
                $selisihBali = 0;
            }
            array_push($meninggalDateBaliDiff, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataMeninggalBaliDiff, $selisihBali);
        }
        for ($i=1; $i < count($dataBali); $i++) {
            $selisihBali = (($dataBali[$i]->Kasus_Posi - $dataBali[$i]->Kasus_Semb - $dataBali[$i]->Kasus_Meni)-($dataBali[$i-1]->Kasus_Posi - $dataBali[$i-1]->Kasus_Semb - $dataBali[$i-1]->Kasus_Meni));
            if ($selisihBali < 0){
                $selisihBali = 0;
            }
            array_push($dirawatDateBaliDiff, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataDirawatBaliDiff, $selisihBali);
        }


        for ($i=0; $i < count($dataBali); $i++) {
            array_push($positifDateBali, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataPositifBali, $dataBali[$i]->Kasus_Posi);
        }
        for ($i=0; $i < count($dataBali); $i++) {
            array_push($sembuhDateBali, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataSembuhBali, $dataBali[$i]->Kasus_Semb);
        }
        for ($i=0; $i < count($dataBali); $i++) {
            array_push($meninggalDateBali, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataMeninggalBali, $dataBali[$i]->Kasus_Meni);
        }
        for ($i=0; $i < count($dataBali); $i++) {
            array_push($dirawatDateBali, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataDirawatBali, $dataBali[$i]->Kasus_Posi - $dataBali[$i]->Kasus_Semb - $dataBali[$i]->Kasus_Meni);
        }

        for ($i=0; $i < count($DiffBali); $i++) {
            $data1Bali[$i] = $DiffBali[$i]->Kasus_Posi;
            $data2Bali[$i] = $DiffBali[$i]->Kasus_Semb;
            $data3Bali[$i] = $DiffBali[$i]->Kasus_Meni;
        }
        $diffPositifBali = $data1Bali[0] - $data1Bali[1];
        $diffSembuhBali = $data2Bali[0] - $data2Bali[1];
        $diffMeninggalBali = $data3Bali[0] - $data3Bali[1];
        $diffDirawatBali = ($data1Bali[0]-$data2Bali[0]-$data3Bali[0])-($data1Bali[1]-$data2Bali[1]-$data3Bali[1]);

        return view('dashboard', compact('diffMeninggal','diffPositif','diffSembuh','provinsi','baliData',
        'global', 'dataRekapIndo', 'dataPositif','positifDate','dataPositifDiff','positifDateDiff','diffMeninggalGlobal','diffPositifGlobal',
        'diffSembuhGlobal','dataRekapIndo','dataPositifBali','positifDateBali', 'dataPositifBaliDiff','positifDateBaliDiff','dataPositifGlobal','positifDateGlobal', 'dataPositifGlobalDiff','positifDateGlobalDiff', 'dataPositifProvDiff','positifDateProvDiff',
        'positif','sembuh','meninggal', 'positifGlobal','sembuhGlobal','meninggalGlobal','tanggal','arrayPositif','dataPositifProv','positifDateProv', 'diffMeninggalProv','diffPositifProv',
        'diffSembuhProv', 'positifBali', 'sembuhBali', 'meninggalBali', 'positifProv', 'sembuhProv', 'meninggalProv','dirawatGlobal','diffDirawatGlobal','dirawat','diffDirawat','dirawatProv',
        'diffDirawatProv','dirawatBali','diffDirawatBali', 'diffPositifBali', 'diffMeninggalBali', 'diffSembuhBali', 'persenSembuh', 'persenMeninggal', 'persenDirawat', 'persenSembuhGlobal',
        'persenMeninggalGlobal', 'persenDirawatGlobal','persenSembuhProv', 'persenMeninggalProv', 'persenDirawatProv','persenSembuhBali', 'persenMeninggalBali', 'persenDirawatBali', 'namaProvinsi', 'nama',
        'sembuhDateGlobal','dataSembuhGlobal', 'meninggalDateGlobal','dataMeninggalGlobal', 'dirawatDateGlobal','dataDirawatGlobal', 'sembuhDateGlobalDiff', 'dataSembuhGlobalDiff',
        'meninggalDateGlobalDiff', 'dataMeninggalGlobalDiff', 'dirawatDateGlobalDiff', 'dataDirawatGlobalDiff', 'dataSembuh', 'sembuhDate', 'dataMeninggal', 'meninggalDate', 'dataDirawat', 'dirawatDate',
        'dataSembuhDiff', 'sembuhDateDiff', 'dataMeninggalDiff', 'meninggalDateDiff', 'dataDirawatDiff', 'dirawatDateDiff', 'dataSembuhBaliDiff', 'sembuhDateBaliDiff', 'dataMeninggalBaliDiff', 'meninggalDateBaliDiff',
        'dataDirawatBaliDiff', 'dirawatDateBaliDiff', 'sembuhDateBali', 'dataSembuhBali', 'meninggalDateBali', 'dataMeninggalBali', 'dirawatDateBali', 'dataDirawatBali', 'sembuhDate' , 'sembuhDateProvDiff', 'dataSembuhProvDiff',
        'meninggalDateProvDiff', 'dataMeninggalProvDiff', 'dirawatDateProvDiff', 'dataDirawatProvDiff', 'sembuhDateProv', 'dataSembuhProv', 'meninggalDateProv', 'dataMeninggalProv', 'dirawatDateProv', 'dataDirawatProv'));
    }
    public function filter(Request $request){
        
        $provinsi = ProvinsiData::select('FID', 'Kasus_Posi', 'Kasus_Semb', 'Kasus_Meni', 'created_at')
        ->whereMonth('created_at', Carbon::now()->month)->orderBy('created_at','ASC')->orderBy('FID', 'ASC')->get();
        $global = GlobalData::select('OBJECTID', 'Confirmed', 'Deaths', 'Recovered', 'created_at', 'City', 'Province')
        ->whereMonth('created_at', Carbon::now()->month)->orderBy('created_at','ASC')->orderBy('OBJECTID', 'ASC')->get();
        $tanggal = BaliData::select('Tanggal')
        ->groupBy('Tanggal')->get();
        $baliData = BaliData::get();
        $countBali = $baliData->groupBy('Tanggal')->count();
        $tanggalBaliAja = BaliData::select('Tanggal')->orderBy('Tanggal', 'ASC')->get();
        $arrayPositif = array();
        $namaProvinsi = ProvinsiData::select('FID')
        ->orderBy('provinsi_data.Kasus_Posi', 'DESC')->where('created_at', ProvinsiData::max('created_at'))->get();
        // $positifGlobal = number_format(RekapGlobal::orderBy('id', 'desc')->take(1)->value('positif'));
        // $sembuhGlobal = number_format(RekapGlobal::orderBy('id', 'desc')->take(1)->value('sembuh'));
        // $meninggalGlobal = number_format(RekapGlobal::orderBy('id', 'desc')->take(1)->value('meninggal'));
        // $DiffGlobal = RekapGlobal::orderBy('id', 'desc')->take(2)->get();
        // $dataPositifBali = array();
        // $positifDateBali = array();

        // for ($i=0; $i < count($tanggal); $i++) {
        //     array_push($positifDateBali, date('d-F', strtotime($tanggal[$i]->Tanggal)));
        //     array_push($dataPositifBali, $countBali);
        // }
        
        // $sumPositif = 0;
        // for ($i=0; $i < count($tanggal); $i++) {
        //     $tgl1 = strtotime($tanggal[$i]->Tanggal);
        //     for ($j=0; $j < count($tanggalBaliAja); $j++) { 
        //         $tgl2 = strtotime($tanggalBaliAja[$j]->Tanggal);
        //         if($tgl1 == $tgl2){
        //             $sumPositif++;
        //         }  
                
        //     }
        //     array_push($arrayPositif, $sumPositif);    
        // }


        $dataRekapIndo = RekapIndo::orderBy('created_at', 'asc')->get();   
        $positif = RekapIndo::orderBy('created_at', 'desc')->take(1)->value('positif');
        $sembuh = RekapIndo::orderBy('created_at', 'desc')->take(1)->value('sembuh');
        $meninggal = RekapIndo::orderBy('created_at', 'desc')->take(1)->value('meninggal');
        $dirawat = $positif-$sembuh-$meninggal;
        $persenSembuh = number_format(($sembuh/$positif*100),2);
        $persenMeninggal = number_format(($meninggal/$positif*100),2);
        $persenDirawat = number_format(($dirawat/$positif*100), 2);
        $positif = number_format($positif);
        $sembuh = number_format($sembuh);
        $meninggal = number_format($meninggal);
        $dirawat = number_format($dirawat);

        $Diff = RekapIndo::orderBy('created_at', 'desc')->take(2)->get();
        $dataPositif = array();
        $dataSembuh = array();
        $dataMeninggal = array();
        $dataDirawat = array();

        $positifDate = array();
        $sembuhDate = array();
        $meninggalDate = array();
        $dirawatDate = array();

        for ($i=0; $i < count($dataRekapIndo); $i++) {
            array_push($positifDate, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataPositif, $dataRekapIndo[$i]->positif);
        }
        for ($i=0; $i < count($dataRekapIndo); $i++) {
            array_push($sembuhDate, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataSembuh, $dataRekapIndo[$i]->sembuh);
        }
        for ($i=0; $i < count($dataRekapIndo); $i++) {
            array_push($meninggalDate, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataMeninggal, $dataRekapIndo[$i]->meninggal);
        }
        for ($i=0; $i < count($dataRekapIndo); $i++) {
            array_push($dirawatDate, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataDirawat, ($dataRekapIndo[$i]->positif - $dataRekapIndo[$i]->sembuh - $dataRekapIndo[$i]->meninggal));
        }

        $dataPositifDiff = array();
        $dataSembuhDiff = array();
        $dataMeninggalDiff = array();
        $dataDirawatDiff = array();

        $positifDateDiff = array();
        $sembuhDateDiff = array();
        $meninggalDateDiff = array();
        $dirawatDateDiff = array();

        for ($i=1; $i < count($dataRekapIndo); $i++) {
            $selisihIndo = (($dataRekapIndo[$i]->positif)-($dataRekapIndo[$i-1]->positif));
            if ($selisihIndo < 0){
                $selisihIndo = 0;
            }
            array_push($positifDateDiff, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataPositifDiff, $selisihIndo);
        }
        for ($i=1; $i < count($dataRekapIndo); $i++) {
            $selisihIndo = (($dataRekapIndo[$i]->sembuh)-($dataRekapIndo[$i-1]->sembuh));
            if ($selisihIndo < 0){
                $selisihIndo = 0;
            }
            array_push($sembuhDateDiff, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataSembuhDiff, $selisihIndo);
        }
        for ($i=1; $i < count($dataRekapIndo); $i++) {
            $selisihIndo = (($dataRekapIndo[$i]->sembuh)-($dataRekapIndo[$i-1]->sembuh));
            if ($selisihIndo < 0){
                $selisihIndo = 0;
            }
            array_push($meninggalDateDiff, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataMeninggalDiff, $selisihIndo);
        }
        for ($i=1; $i < count($dataRekapIndo); $i++) {
            $selisihIndo = (($dataRekapIndo[$i]->positif - $dataRekapIndo[$i]->sembuh - $dataRekapIndo[$i]->meninggal) - ($dataRekapIndo[$i-1]->positif - $dataRekapIndo[$i-1]->sembuh - $dataRekapIndo[$i-1]->meninggal));
            if ($selisihIndo < 0){
                $selisihIndo = 0;
            }
            array_push($dirawatDateDiff, date('d-F', strtotime($dataRekapIndo[$i]->created_at)));
            array_push($dataDirawatDiff, $selisihIndo);
        }

        for ($i=0; $i < count($Diff); $i++) {
            $data1[$i] = $Diff[$i]->positif;
            $data2[$i] = $Diff[$i]->sembuh;
            $data3[$i] = $Diff[$i]->meninggal;
        }
        $diffPositif = $data1[0] - $data1[1];
        $diffSembuh = $data2[0] - $data2[1];
        $diffMeninggal = $data3[0] - $data3[1];
        $diffDirawat = ($data1[0]-$data2[0]-$data3[0])-($data1[1]-$data2[1]-$data3[1]);


        $dataRekapGlobal = RekapGlobal::orderBy('created_at', 'asc')->get();   
        $positifGlobal = RekapGlobal::orderBy('created_at', 'desc')->take(1)->value('positif');
        $sembuhGlobal = RekapGlobal::orderBy('created_at', 'desc')->take(1)->value('sembuh');
        $meninggalGlobal = RekapGlobal::orderBy('created_at', 'desc')->take(1)->value('meninggal');
        $dirawatGlobal = $positifGlobal-$sembuhGlobal-$meninggalGlobal;
        $persenSembuhGlobal = number_format(($sembuhGlobal/$positifGlobal*100),2);
        $persenMeninggalGlobal = number_format(($meninggalGlobal/$positifGlobal*100),2);
        $persenDirawatGlobal = number_format(($dirawatGlobal/$positifGlobal*100), 2);
        $positifGlobal = number_format($positifGlobal);
        $sembuhGlobal = number_format($sembuhGlobal);
        $meninggalGlobal = number_format($meninggalGlobal);
        $dirawatGlobal = number_format($dirawatGlobal);

        $DiffGlobal = RekapGlobal::orderBy('created_at', 'desc')->take(2)->get();

        $dataPositifGlobal = array();
        $dataSembuhGlobal = array();
        $dataMeninggalGlobal = array();
        $dataDirawatGlobal = array();

        $positifDateGlobal = array();
        $sembuhDateGlobal = array();
        $meninggalDateGlobal = array();
        $dirawatDateGlobal = array();

        for ($i=0; $i < count($dataRekapGlobal); $i++) {
            array_push($positifDateGlobal, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataPositifGlobal, $dataRekapGlobal[$i]->positif);
        }
        for ($i=0; $i < count($dataRekapGlobal); $i++) {
            array_push($sembuhDateGlobal, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataSembuhGlobal, $dataRekapGlobal[$i]->sembuh);
        }
        for ($i=0; $i < count($dataRekapGlobal); $i++) {
            array_push($meninggalDateGlobal, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataMeninggalGlobal, $dataRekapGlobal[$i]->meninggal);
        }
        for ($i=0; $i < count($dataRekapGlobal); $i++) {
            array_push($dirawatDateGlobal, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataDirawatGlobal, ($dataRekapGlobal[$i]->positif - $dataRekapGlobal[$i]->sembuh - $dataRekapGlobal[$i]->meninggal));
        }

        $dataPositifGlobalDiff = array();
        $dataSembuhGlobalDiff = array();
        $dataMeninggalGlobalDiff = array();
        $dataDirawatGlobalDiff = array();

        $positifDateGlobalDiff = array();
        $sembuhDateGlobalDiff = array();
        $meninggalDateGlobalDiff = array();
        $dirawatDateGlobalDiff = array();

        for ($i=1; $i < count($dataRekapGlobal); $i++) {
            $selisihGlobal = (($dataRekapGlobal[$i]->positif)-($dataRekapGlobal[$i-1]->positif));
            if ($selisihGlobal < 0){
                $selisihGlobal = 0;
            }
            array_push($positifDateGlobalDiff, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataPositifGlobalDiff, $selisihGlobal);
        }
        for ($i=1; $i < count($dataRekapGlobal); $i++) {
            $selisihGlobalSembuh = (($dataRekapGlobal[$i]->sembuh)-($dataRekapGlobal[$i-1]->sembuh));
            if ($selisihGlobalSembuh < 0){
                $selisihGlobalSembuh = 0;
            }
            array_push($sembuhDateGlobalDiff, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataSembuhGlobalDiff, $selisihGlobalSembuh);
        }
        for ($i=1; $i < count($dataRekapGlobal); $i++) {
            $selisihGlobalMeninggal = (($dataRekapGlobal[$i]->meninggal)-($dataRekapGlobal[$i-1]->meninggal));
            if ($selisihGlobalMeninggal < 0){
                $selisihGlobalMeninggal = 0;
            }
            array_push($meninggalDateGlobalDiff, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataMeninggalGlobalDiff, $selisihGlobalMeninggal);
        }
        for ($i=1; $i < count($dataRekapGlobal); $i++) {
            $selisihGlobalDirawat = (($dataRekapGlobal[$i]->positif) - ($dataRekapGlobal[$i]->sembuh) - ($dataRekapGlobal[$i]->meninggal))-(($dataRekapGlobal[$i-1]->positif) - ($dataRekapGlobal[$i-1]->sembuh) - ($dataRekapGlobal[$i-1]->meninggal));
            if ($selisihGlobalDirawat < 0){
                $selisihGlobalDirawat = 0;
            }
            array_push($dirawatDateGlobalDiff, date('d-F', strtotime($dataRekapGlobal[$i]->created_at)));
            array_push($dataDirawatGlobalDiff, $selisihGlobalDirawat);
        }

        for ($i=0; $i < count($DiffGlobal); $i++) {
            $data1Global[$i] = $DiffGlobal[$i]->positif;
            $data2Global[$i] = $DiffGlobal[$i]->sembuh;
            $data3Global[$i] = $DiffGlobal[$i]->meninggal;
        }
        $diffPositifGlobal = $data1Global[0] - $data1Global[1];
        $diffSembuhGlobal = $data2Global[0] - $data2Global[1];
        $diffMeninggalGlobal = $data3Global[0] - $data3Global[1];
        $diffDirawatGlobal = ($data1Global[0]-$data2Global[0]-$data3Global[0])-($data1Global[1]-$data2Global[1]-$data3Global[1]);



        $dataBali = ProvinsiData::where('FID','Bali')->orderBy('created_at', 'asc')->get();   
        $positifBali =(ProvinsiData::orderBy('created_at', 'desc')->where('FID','Bali')->take(1)->value('Kasus_Posi'));
        $sembuhBali =(ProvinsiData::orderBy('created_at', 'desc')->where('FID','Bali')->take(1)->value('Kasus_Semb'));
        $meninggalBali =(ProvinsiData::orderBy('created_at', 'desc')->where('FID','Bali')->take(1)->value('Kasus_Meni'));
        $DiffBali = ProvinsiData::where('FID','Bali')->orderBy('created_at', 'desc')->take(2)->get();

        $dataPositifBali = array();
        $dataSembuhBali = array();
        $dataMeninggalBali = array();
        $dataDirawatBali = array();
        
        $positifDateBali = array();
        $sembuhDateBali = array();
        $meninggalDateBali = array();
        $dirawatDateBali = array();

        $dirawatBali = $positifBali-$sembuhBali-$meninggalBali;
        $persenSembuhBali = number_format(($sembuhBali/$positifBali*100),2);
        $persenMeninggalBali = number_format(($meninggalBali/$positifBali*100),2);
        $persenDirawatBali = number_format(($dirawatBali/$positifBali*100), 2);
        $positifBali = number_format($positifBali);
        $sembuhBali = number_format($sembuhBali);
        $meninggalBali = number_format($meninggalBali);
        $dirawatBali = number_format($dirawatBali);

        $dataPositifBaliDiff = array();
        $dataSembuhBaliDiff = array();
        $dataMeninggalBaliDiff = array();
        $dataDirawatBaliDiff = array();

        $positifDateBaliDiff = array();
        $sembuhDateBaliDiff = array();
        $meninggalDateBaliDiff = array();
        $dirawatDateBaliDiff = array();

        for ($i=1; $i < count($dataBali); $i++) {
            $selisihBali = (($dataBali[$i]->Kasus_Posi)-($dataBali[$i-1]->Kasus_Posi));
            if ($selisihBali < 0){
                $selisihBali = 0;
            }
            array_push($positifDateBaliDiff, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataPositifBaliDiff, $selisihBali);
        }
        for ($i=1; $i < count($dataBali); $i++) {
            $selisihBali = (($dataBali[$i]->Kasus_Semb)-($dataBali[$i-1]->Kasus_Semb));
            if ($selisihBali < 0){
                $selisihBali = 0;
            }
            array_push($sembuhDateBaliDiff, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataSembuhBaliDiff, $selisihBali);
        }
        for ($i=1; $i < count($dataBali); $i++) {
            $selisihBali = (($dataBali[$i]->Kasus_Meni)-($dataBali[$i-1]->Kasus_Meni));
            if ($selisihBali < 0){
                $selisihBali = 0;
            }
            array_push($meninggalDateBaliDiff, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataMeninggalBaliDiff, $selisihBali);
        }
        for ($i=1; $i < count($dataBali); $i++) {
            $selisihBali = (($dataBali[$i]->Kasus_Posi - $dataBali[$i]->Kasus_Semb - $dataBali[$i]->Kasus_Meni)-($dataBali[$i-1]->Kasus_Posi - $dataBali[$i-1]->Kasus_Semb - $dataBali[$i-1]->Kasus_Meni));
            if ($selisihBali < 0){
                $selisihBali = 0;
            }
            array_push($dirawatDateBaliDiff, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataDirawatBaliDiff, $selisihBali);
        }


        for ($i=0; $i < count($dataBali); $i++) {
            array_push($positifDateBali, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataPositifBali, $dataBali[$i]->Kasus_Posi);
        }
        for ($i=0; $i < count($dataBali); $i++) {
            array_push($sembuhDateBali, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataSembuhBali, $dataBali[$i]->Kasus_Semb);
        }
        for ($i=0; $i < count($dataBali); $i++) {
            array_push($meninggalDateBali, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataMeninggalBali, $dataBali[$i]->Kasus_Meni);
        }
        for ($i=0; $i < count($dataBali); $i++) {
            array_push($dirawatDateBali, date('d-F', strtotime($dataBali[$i]->created_at)));
            array_push($dataDirawatBali, $dataBali[$i]->Kasus_Posi - $dataBali[$i]->Kasus_Semb - $dataBali[$i]->Kasus_Meni);
        }

        for ($i=0; $i < count($DiffBali); $i++) {
            $data1Bali[$i] = $DiffBali[$i]->Kasus_Posi;
            $data2Bali[$i] = $DiffBali[$i]->Kasus_Semb;
            $data3Bali[$i] = $DiffBali[$i]->Kasus_Meni;
        }
        $diffPositifBali = $data1Bali[0] - $data1Bali[1];
        $diffSembuhBali = $data2Bali[0] - $data2Bali[1];
        $diffMeninggalBali = $data3Bali[0] - $data3Bali[1];
        $diffDirawatBali = ($data1Bali[0]-$data2Bali[0]-$data3Bali[0])-($data1Bali[1]-$data2Bali[1]-$data3Bali[1]);


        $nama = $request->nama;
        $dataProvinsi = ProvinsiData::where('FID',$nama)->orderBy('created_at', 'asc')->get();   
        $positifProv = ProvinsiData::orderBy('created_at', 'desc')->where('FID',$nama)->take(1)->value('Kasus_Posi');
        $sembuhProv = ProvinsiData::orderBy('created_at', 'desc')->where('FID',$nama)->take(1)->value('Kasus_Semb');
        $meninggalProv = ProvinsiData::orderBy('created_at', 'desc')->where('FID',$nama)->take(1)->value('Kasus_Meni');
        $dirawatProv = $positifProv-$sembuhProv-$meninggalProv;
        $persenSembuhProv = number_format(($sembuhProv/$positifProv*100),2);
        $persenMeninggalProv = number_format(($meninggalProv/$positifProv*100),2);
        $persenDirawatProv = number_format(($dirawatProv/$positifProv*100), 2);
        $positifProv = number_format($positifProv);
        $sembuhProv = number_format($sembuhProv);
        $meninggalProv = number_format($meninggalProv);
        $dirawatProv = number_format($dirawatProv);

        $DiffProv = ProvinsiData::where('FID',$nama)->orderBy('created_at', 'desc')->take(2)->get();
        $dataPositifProv = array();
        $dataSembuhProv = array();
        $dataMeninggalProv = array();
        $dataDirawatProv = array();

        $positifDateProv = array();
        $sembuhDateProv = array();
        $meninggalDateProv = array();
        $dirawatDateProv = array();

        $dataPositifProvDiff = array();
        $dataSembuhProvDiff = array();
        $dataMeninggalProvDiff = array();
        $dataDirawatProvDiff = array();

        $positifDateProvDiff = array();
        $sembuhDateProvDiff = array();
        $meninggalDateProvDiff = array();
        $dirawatDateProvDiff = array();

        for ($i=1; $i < count($dataProvinsi); $i++) {
            $selisih = (($dataProvinsi[$i]->Kasus_Posi)-($dataProvinsi[$i-1]->Kasus_Posi));
            if ($selisih < 0){
                $selisih = 0;
            }
            array_push($positifDateProvDiff, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataPositifProvDiff, $selisih);
        }
        for ($i=1; $i < count($dataProvinsi); $i++) {
            $selisih = (($dataProvinsi[$i]->Kasus_Semb)-($dataProvinsi[$i-1]->Kasus_Semb));
            if ($selisih < 0){
                $selisih = 0;
            }
            array_push($sembuhDateProvDiff, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataSembuhProvDiff, $selisih);
        }
        for ($i=1; $i < count($dataProvinsi); $i++) {
            $selisih = (($dataProvinsi[$i]->Kasus_Meni)-($dataProvinsi[$i-1]->Kasus_Meni));
            if ($selisih < 0){
                $selisih = 0;
            }
            array_push($meninggalDateProvDiff, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataMeninggalProvDiff, $selisih);
        }
        for ($i=1; $i < count($dataProvinsi); $i++) {
            $selisih = (($dataProvinsi[$i]->Kasus_Posi - $dataProvinsi[$i]->Kasus_Semb - $dataProvinsi[$i]->Kasus_Meni) - ($dataProvinsi[$i-1]->Kasus_Posi - $dataProvinsi[$i-1]->Kasus_Semb - $dataProvinsi[$i-1]->Kasus_Meni));
            if ($selisih < 0){
                $selisih = 0;
            }
            array_push($dirawatDateProvDiff, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataDirawatProvDiff, $selisih);
        }


        for ($i=0; $i < count($dataProvinsi); $i++) {
            array_push($positifDateProv, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataPositifProv, $dataProvinsi[$i]->Kasus_Posi);
        }
        for ($i=0; $i < count($dataProvinsi); $i++) {
            array_push($sembuhDateProv, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataSembuhProv, $dataProvinsi[$i]->Kasus_Semb);
        }
        for ($i=0; $i < count($dataProvinsi); $i++) {
            array_push($meninggalDateProv, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataMeninggalProv, $dataProvinsi[$i]->Kasus_Meni);
        }
        for ($i=0; $i < count($dataProvinsi); $i++) {
            array_push($dirawatDateProv, date('d-F', strtotime($dataProvinsi[$i]->created_at)));
            array_push($dataDirawatProv, $dataProvinsi[$i]->Kasus_Posi - $dataProvinsi[$i]->Kasus_Semb - $dataProvinsi[$i]->Kasus_Meni);
        }

        for ($i=0; $i < count($DiffProv); $i++) {
            $data1Prov[$i] = $DiffProv[$i]->Kasus_Posi;
            $data2Prov[$i] = $DiffProv[$i]->Kasus_Semb;
            $data3Prov[$i] = $DiffProv[$i]->Kasus_Meni;
        }
        $diffPositifProv = $data1Prov[0] - $data1Prov[1];
        $diffSembuhProv = $data2Prov[0] - $data2Prov[1];
        $diffMeninggalProv = $data3Prov[0] - $data3Prov[1];
        $diffDirawatProv = ($data1Prov[0]-$data2Prov[0]-$data3Prov[0])-($data1Prov[1]-$data2Prov[1]-$data3Prov[1]);

        return view('dashboard', compact('diffMeninggal','diffPositif','diffSembuh','provinsi','baliData',
        'global', 'dataRekapIndo', 'dataPositif','positifDate','dataPositifDiff','positifDateDiff','diffMeninggalGlobal','diffPositifGlobal',
        'diffSembuhGlobal','dataRekapIndo','dataPositifBali','positifDateBali', 'dataPositifBaliDiff','positifDateBaliDiff','dataPositifGlobal','positifDateGlobal', 'dataPositifGlobalDiff','positifDateGlobalDiff', 'dataPositifProvDiff','positifDateProvDiff',
        'positif','sembuh','meninggal', 'positifGlobal','sembuhGlobal','meninggalGlobal','tanggal','arrayPositif','dataPositifProv','positifDateProv', 'diffMeninggalProv','diffPositifProv',
        'diffSembuhProv', 'positifBali', 'sembuhBali', 'meninggalBali', 'positifProv', 'sembuhProv', 'meninggalProv','dirawatGlobal','diffDirawatGlobal','dirawat','diffDirawat','dirawatProv',
        'diffDirawatProv','dirawatBali','diffDirawatBali', 'diffPositifBali', 'diffMeninggalBali', 'diffSembuhBali', 'persenSembuh', 'persenMeninggal', 'persenDirawat', 'persenSembuhGlobal',
        'persenMeninggalGlobal', 'persenDirawatGlobal','persenSembuhProv', 'persenMeninggalProv', 'persenDirawatProv','persenSembuhBali', 'persenMeninggalBali', 'persenDirawatBali', 'namaProvinsi', 'nama',
        'sembuhDateGlobal','dataSembuhGlobal', 'meninggalDateGlobal','dataMeninggalGlobal', 'dirawatDateGlobal','dataDirawatGlobal', 'sembuhDateGlobalDiff', 'dataSembuhGlobalDiff',
        'meninggalDateGlobalDiff', 'dataMeninggalGlobalDiff', 'dirawatDateGlobalDiff', 'dataDirawatGlobalDiff', 'dataSembuh', 'sembuhDate', 'dataMeninggal', 'meninggalDate', 'dataDirawat', 'dirawatDate',
        'dataSembuhDiff', 'sembuhDateDiff', 'dataMeninggalDiff', 'meninggalDateDiff', 'dataDirawatDiff', 'dirawatDateDiff', 'dataSembuhBaliDiff', 'sembuhDateBaliDiff', 'dataMeninggalBaliDiff', 'meninggalDateBaliDiff',
        'dataDirawatBaliDiff', 'dirawatDateBaliDiff', 'sembuhDateBali', 'dataSembuhBali', 'meninggalDateBali', 'dataMeninggalBali', 'dirawatDateBali', 'dataDirawatBali', 'sembuhDate' , 'sembuhDateProvDiff', 'dataSembuhProvDiff',
        'meninggalDateProvDiff', 'dataMeninggalProvDiff', 'dirawatDateProvDiff', 'dataDirawatProvDiff', 'sembuhDateProv', 'dataSembuhProv', 'meninggalDateProv', 'dataMeninggalProv', 'dirawatDateProv', 'dataDirawatProv'));
        
    }
}
        