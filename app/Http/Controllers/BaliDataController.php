<?php

namespace App\Http\Controllers;

use App\BaliData;
use App\ProvinsiData;
use App\RekapGlobal;
use Illuminate\Http\Request;

use Session;

use App\Imports\BaliDataImport;
use App\Imports\ProvinsiDataImport;
use App\Imports\RekapGlobalDataImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class BaliDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

    public function import_excel_bali(Request $request) 
	{


        // // Get current data from items table
        // $titles = BaliData::lists('resiko', 'paparan')->toArray();

        // if(Input::hasFile('import_file')){
        //     $path = Input::file('import_file')->getRealPath();
        //     $data = Excel::load($path, function($reader) {
        //     })->get();
    
        //     if(!empty($data) && $data->count()){
        //         $insert = array();
    
        //         foreach ($data as $key => $value) {
        //             // Skip title previously added using in_array
        //             if (in_array($value->title, $titles))
        //                 continue;
    
        //             $insert[] = ['title' => $value->title, 'description' => $value->description];
    
        //             // Add new title to array
        //             $titles[] = $value->title;
        //         }
    
        //         if(!empty($insert)){
        //             DB::table('items')->insert($insert);
        //           //  dd('Insert Record successfully.');
        //         }
        //     }
        // }
        // return back(); 



		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_bali di dalam folder public
		$file->move('file_bali',$nama_file);
 
		// import data
		Excel::import(new BaliDataImport, public_path('/file_bali/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Bali Berhasil Diimport!');
 
		// alihkan halaman kembali
		$baliData = BaliData::get();
        return view('users.index',compact('baliData'));
    }
    
    public function import_excel_provinsi(Request $request) {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_provinsi di dalam folder public
		$file->move('file_provinsi',$nama_file);
 
		// import data
		Excel::import(new ProvinsiDataImport, public_path('/file_provinsi/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Provinsi Berhasil Diimport!');
 
		// alihkan halaman kembali
		$provinsiData = ProvinsiData::get();
        return view('users.indexProvinsi',compact('provinsiData'));
    }

    public function import_excel_rekap_global(Request $request) {
        // validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_provinsi di dalam folder public
		$file->move('file_rekap_global',$nama_file);
 
		// import data
		Excel::import(new RekapGlobalDataImport, public_path('/file_rekap_global/'.$nama_file));
 
		// notifikasi dengan session
		Session::flash('sukses','Data Rekap Global Berhasil Diimport!');
 
		// alihkan halaman kembali
		$rekapGlobalData = RekapGlobal::get();
        return view('users.indexRekapGlobal',compact('rekapGlobalData'));
    }
     
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BaliData  $baliData
     * @return \Illuminate\Http\Response
     */
    public function show(BaliData $baliData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BaliData  $baliData
     * @return \Illuminate\Http\Response
     */
    public function edit(BaliData $baliData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BaliData  $baliData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BaliData $baliData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BaliData  $baliData
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaliData $baliData)
    {
        //
    }
}
