<?php

namespace App\Http\Controllers;

use App\User;
use App\BaliData;
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
}
