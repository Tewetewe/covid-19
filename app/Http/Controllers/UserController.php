<?php

namespace App\Http\Controllers;

use App\User;
use App\BaliData;
use App\ProvinsiData;
use App\RekapGlobal;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

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
}
