@extends('layouts.app')

@section('content')


<div class="header  pb-8 pt-5 pt-md-5">
    <div class="container-fluid">
        <div class="header-body">
            <div class="shadow alert alert-white text-muted" role="alert">
                <h2><b>Rekapitulasi Data Penyebaran COVID-19 Dunia</b></h2>
             </div>
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-danger card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Terkonfirmasi</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $positifGlobal }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0"></span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-danger text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-sad.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-5 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffPositifGlobal >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffPositifGlobal }}</span>
                                <span class="text-white">Dari Kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-success card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Sembuh</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $sembuhGlobal }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0 ">{{ number_format(($persenSembuhGlobal),0)}}% </span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-green text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-happy.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffSembuhGlobal >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffSembuhGlobal }}</span>
                                <span class="text-white">Dari Kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-gray-dark card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Meninggal</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $meninggalGlobal }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ number_format(($persenMeninggalGlobal),0)}}% </span></h6>
                                </div>
                                <div class="col-auto">

                                    <!-- <div class="icon icon-shape bg-black text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-cry.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffMeninggalGlobal >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffMeninggalGlobal }}</span>
                                <span class="text-white">Dari kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-warning card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Dirawat</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $dirawatGlobal }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ number_format(($persenDirawatGlobal),0)}}% </span></h6>
                                </div>
                                <div class="col-auto">

                                    <!-- <div class="icon icon-shape bg-blue text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-sick.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffDirawatGlobal >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffDirawatGlobal }}</span>
                                <span class="text-white">Dari kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="container-fluid mt--7 " >
        <div class="row">
            <div class="col-xl-6"  id="hideSembuhDunia">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Positif COVID-19 Dunia</h2>
                            </div>
                            
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" id="btn1Global">
                                        <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1Global">
                                            <span class="d-none d-md-block">Kumulatif</span>
                                            <span class="d-md-none">Kumulatif</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" id="btn2Global">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2Global">
                                            <span class="d-none d-md-block">Laju</span>
                                            <span class="d-md-none">Laju</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-global" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col-xl-6"  id="hideSembuhDunia">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Sembuh COVID-19 Dunia</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" id="btn1GlobalSembuh">
                                        <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1GlobalSembuh">
                                            <span class="d-none d-md-block">Kumulatif</span>
                                            <span class="d-md-none">Kumulatif</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" id="btn2GlobalSembuh">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2GlobalSembuh">
                                            <span class="d-none d-md-block">Laju</span>
                                            <span class="d-md-none">Laju</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-global-sembuh" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-xl-6"  id="hideSembuhDunia">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0" style="font-size:120%;">Grafik Meninggal COVID-19 Dunia</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" id="btn1GlobalMeninggal">
                                        <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1GlobalMeninggal">
                                            <span class="d-none d-md-block">Kumulatif</span>
                                            <span class="d-md-none">Kumulatif</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" id="btn2GlobalMeninggal">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2GlobalMeninggal">
                                            <span class="d-none d-md-block">Laju</span>
                                            <span class="d-md-none">Laju</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-global-meninggal" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
                
            <div class="col-xl-6"  id="hideSembuhDunia">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Dirawat COVID-19 Dunia</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" id="btn1GlobalDirawat">
                                        <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1GlobalDirawat">
                                            <span class="d-none d-md-block">Kumulatif</span>
                                            <span class="d-md-none">Kumulatif</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" id="btn2GlobalDirawat">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2GlobalDirawat">
                                            <span class="d-none d-md-block">Laju</span>
                                            <span class="d-md-none">Laju</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-global-dirawat" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="shadow alert alert-white text-muted" role="alert">
                <h2><b>Rekapitulasi Data Penyebaran COVID-19 Negara di Dunia</b></h2>
            </div>
            <form action="/GlobalGraph/filter" method="GET">
                <div class="form-group">
                        <div class="input-group">
                            <select class="form-control" id="drop" name="namaNegara">
                            <option value="">{{$namaNegara}}</option>
                                 @foreach ($namaNegaraData  as $item)
                                    <option value="{{$item->OBJECTID}}">{{ucfirst($item->OBJECTID)}}</option>      
                                 @endforeach
                            </select>
                            <button class="btn btn-icon btn-success" type="submit">
                                <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                            </button>
                        </div>
                </div>
                            
            </form>


            <div class="row mb-xl-4">
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-danger card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Terkonfirmasi</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $positifNegara }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0"></span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-danger text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-sad.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-5 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffPositifNegara >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                </i> {{ $diffPositifNegara }}</span>

                                </span>
                                <span class="text-white">Dari Kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-success card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Sembuh</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $sembuhNegara }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ $persenSembuhNegara}}% </span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-green text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-happy.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffSembuhNegara >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                </i> {{ $diffSembuhNegara }}</span>
                                    
                                    </span>
                                <span class="text-white">Dari Kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-gray-dark card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Meninggal</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $meninggalNegara }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ $persenMeninggalNegara}}% </span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-black text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-cry.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffMeninggalNegara >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                </i> {{ $diffMeninggalNegara }}</span>
                                    </span>
                                <span class="text-white">Dari kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-warning card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Dirawat</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $dirawatNegara }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ $persenDirawatNegara }}% </span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-blue text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-sick.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffDirawatNegara >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                </i> {{ $diffDirawatNegara }}</span>
                                    </span>
                                <span class="text-white">Dari kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Positif COVID-19 Negara {{$namaNegara}}</h2>
                                </div>
                                {{-- <button id="btn1">
                                    Option 1
                                    </button>
                                    <button id="btn2">
                                    Option 2
                                    </button> --}}
                      
                                <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item mr-2 mr-md-0" id="btn1Negara">
                                            <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1Negara">
                                                <span class="d-none d-md-block">Kumulatif</span>
                                                <span class="d-md-none">Kumulatif</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="btn2Negara">
                                            <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2Negara">
                                                <span class="d-none d-md-block">Laju</span>
                                                <span class="d-md-none">Laju</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                              
                        </div>
                    
                        
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-negara" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Sembuh COVID-19 Negara {{$namaNegara}}</h2>
                                </div>
                                {{-- <button id="btn1">
                                    Option 1
                                    </button>
                                    <button id="btn2">
                                    Option 2
                                    </button> --}}
                      
                                <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item mr-2 mr-md-0" id="btn1NegaraSembuh">
                                            <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1NegaraSembuh">
                                                <span class="d-none d-md-block">Kumulatif</span>
                                                <span class="d-md-none">Kumulatif</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="btn2NegaraSembuh">
                                            <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2NegaraSembuh">
                                                <span class="d-none d-md-block">Laju</span>
                                                <span class="d-md-none">Laju</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                              
                        </div>
                       
                        
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-negara-sembuh" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Meninggal COVID-19 Negara {{$namaNegara}}</h2>
                                </div>
                                {{-- <button id="btn1">
                                    Option 1
                                    </button>
                                    <button id="btn2">
                                    Option 2
                                    </button> --}}
                      
                                <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item mr-2 mr-md-0" id="btn1NegaraMeninggal">
                                            <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1NegaraMeninggal">
                                                <span class="d-none d-md-block">Kumulatif</span>
                                                <span class="d-md-none">Kumulatif</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="btn2NegaraMeninggal">
                                            <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2NegaraMeninggal">
                                                <span class="d-none d-md-block">Laju</span>
                                                <span class="d-md-none">Laju</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                              
                        </div>
                     
                        
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-negara-meninggal" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Dirawat COVID-19 Negara {{$namaNegara}}</h2>
                                </div>
                                {{-- <button id="btn1">
                                    Option 1
                                    </button>
                                    <button id="btn2">
                                    Option 2
                                    </button> --}}
                      
                                <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item mr-2 mr-md-0" id="btn1NegaraDirawat">
                                            <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1NegaraDirawat">
                                                <span class="d-none d-md-block">Kumulatif</span>
                                                <span class="d-md-none">Kumulatif</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="btn2NegaraDirawat">
                                            <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2NegaraDirawat">
                                                <span class="d-none d-md-block">Laju</span>
                                                <span class="d-md-none">Laju</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                              
                        </div>
                      
                        
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-negara-dirawat" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="shadow alert alert-white text-muted" role="alert">
                <h2><b>Rekapitulasi Data Penyebaran COVID-19 Indonesia</b></h2>
            </div>
            <div class="row mb-xl-4">
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card card-stats bg-gradient-danger mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Terkonfirmasi</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $positif }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0"></span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-danger text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-sad.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-5 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffPositif >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffPositif }}</span>
                                <span class="text-white">Dari Kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-success card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Sembuh</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $sembuh }} Orang </span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ number_format(($persenSembuh),0) }}% </span></h6>
                                </div>
                                <div class="col-auto">
                                     <!-- <div class="icon icon-shape bg-green text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-happy.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffSembuh >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffSembuh }}</span>
                                <span class="text-white">Dari Kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-gray-dark card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Meninggal</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $meninggal }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ number_format(($persenMeninggal),0) }}% </span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-black text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-cry.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffMeninggal >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffMeninggal }}</span>
                                <span class="text-white">Dari kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-warning card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Dirawat</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $dirawat }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ number_format(($persenDirawat),0) }}% </span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-blue text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-sick.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffDirawat >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffDirawat }}</span>
                                <span class="text-white">Dari kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-xl-4">
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Positif COVID-19 Indonesia</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" id="btn1Indo">
                                        <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1Indo">
                                            <span class="d-none d-md-block">Kumulatif</span>
                                            <span class="d-md-none">Kumulatif</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" id="btn2Indo">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2Indo">
                                            <span class="d-none d-md-block">Laju</span>
                                            <span class="d-md-none">Laju</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Sembuh COVID-19 Indonesia</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" id="btn1IndoSembuh">
                                        <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1IndoSembuh">
                                            <span class="d-none d-md-block">Kumulatif</span>
                                            <span class="d-md-none">Kumulatif</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" id="btn2IndoSembuh">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2IndoSembuh">
                                            <span class="d-none d-md-block">Laju</span>
                                            <span class="d-md-none">Laju</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-sembuh" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <div class="row">
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Meninggal COVID-19 Indonesia</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" id="btn1IndoMeninggal">
                                        <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1IndoMeninggal">
                                            <span class="d-none d-md-block">Kumulatif</span>
                                            <span class="d-md-none">Kumulatif</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" id="btn2IndoMeninggal">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2IndoMeninggal">
                                            <span class="d-none d-md-block">Laju</span>
                                            <span class="d-md-none">Laju</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-meninggal" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Dirawat COVID-19 Indonesia</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" id="btn1IndoDirawat">
                                        <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1IndoDirawat">
                                            <span class="d-none d-md-block">Kumulatif</span>
                                            <span class="d-md-none">Kumulatif</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" id="btn2IndoDirawat">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2IndoDirawat">
                                            <span class="d-none d-md-block">Laju</span>
                                            <span class="d-md-none">Laju</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-dirawat" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <hr>

            <div class="shadow alert alert-white text-muted" role="alert">
                <h2><b>Rekapitulasi Data Penyebaran COVID-19 Bali</b></h2>
             </div>
            <div class="row mb-xl-4">
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-danger card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Terkonfirmasi</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $positifBali }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0"></span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-danger text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-sad.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-5 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffPositifBali >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffPositifBali }}</span>
                                <span class="text-white">Dari Kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-success card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Sembuh</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $sembuhBali }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ $persenSembuhBali}}% </span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-green text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-happy.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffSembuhBali >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffSembuhBali }}</span>
                                <span class="text-white">Dari Kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-gray-dark card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Meninggal</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $meninggalBali }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ $persenMeninggalBali}}% </span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-black text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-cry.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffMeninggalBali >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffMeninggalBali }}</span>
                                <span class="text-white">Dari kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-warning card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Dirawat</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $dirawatBali }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-2">{{ $persenDirawatBali}}% </span></h6>
                                </div>
                                <div class="col-auto">
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-sick.png" alt="...">
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffDirawatBali >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffDirawatBali }}</span>
                                <span class="text-white">Dari kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Positif COVID-19 Bali</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" id="btn1Bali">
                                        <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1Bali">
                                            <span class="d-none d-md-block">Kumulatif</span>
                                            <span class="d-md-none">Kumulatif</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" id="btn2Bali">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2Bali">
                                            <span class="d-none d-md-block">Laju</span>
                                            <span class="d-md-none">Laju</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chart">
                                <!-- Chart wrapper -->
                                <canvas id="chart-orderss-bali" class="chart-canvas"></canvas>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Sembuh COVID-19 Bali</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" id="btn1BaliSembuh">
                                        <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1BaliSembuh">
                                            <span class="d-none d-md-block">Kumulatif</span>
                                            <span class="d-md-none">Kumulatif</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" id="btn2BaliSembuh">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2BaliSembuh">
                                            <span class="d-none d-md-block">Laju</span>
                                            <span class="d-md-none">Laju</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chart">
                                <!-- Chart wrapper -->
                                <canvas id="chart-orderss-bali-sembuh" class="chart-canvas"></canvas>
                            </div>
                        </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Meninggal COVID-19 Bali</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" id="btn1BaliMeninggal">
                                        <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1BaliMeninggal">
                                            <span class="d-none d-md-block">Kumulatif</span>
                                            <span class="d-md-none">Kumulatif</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" id="btn2BaliMeninggal">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2BaliMeninggal">
                                            <span class="d-none d-md-block">Laju</span>
                                            <span class="d-md-none">Laju</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chart">
                                <!-- Chart wrapper -->
                                <canvas id="chart-orderss-bali-meninggal" class="chart-canvas"></canvas>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Dirawat COVID-19 Bali</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" id="btn1BaliDirawat">
                                        <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1BaliDirawat">
                                            <span class="d-none d-md-block">Kumulatif</span>
                                            <span class="d-md-none">Kumulatif</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" id="btn2BaliDirawat">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2BaliDirawat">
                                            <span class="d-none d-md-block">Laju</span>
                                            <span class="d-md-none">Laju</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chart">
                                <!-- Chart wrapper -->
                                <canvas id="chart-orderss-bali-dirawat" class="chart-canvas"></canvas>
                            </div>
                        </div>
                </div>
            </div>
            </div>
            <hr>

            <div class="shadow alert alert-white text-muted" role="alert">
                <h2><b>Rekapitulasi Data Penyebaran COVID-19 Provinsi di Indonesia</b></h2>
            </div>
            <form action="/ProvGraph/filter" method="GET">
                <div class="form-group">
                        <div class="input-group">
                            <select class="form-control" id="drop" name="nama">
                            <option value="">{{$nama}}</option>
                                 @foreach ($namaProvinsi as $item)
                                    <option value="{{$item->FID}}">{{ucfirst($item->FID)}}</option>      
                                 @endforeach
                            </select>
                            <button class="btn btn-icon btn-success" type="submit">
                                <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                            </button>
                        </div>
                </div>
                            
            </form>


            <div class="row mb-xl-4">
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-danger card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Terkonfirmasi</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $positifProv }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0"></span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-danger text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-sad.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-5 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffPositifProv >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffPositifProv }}</span>
                                <span class="text-white">Dari Kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-success card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Sembuh</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $sembuhProv }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ $persenSembuhProv}}% </span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-green text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-happy.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffSembuhProv >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffSembuhProv }}</span>
                                <span class="text-white">Dari Kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-gray-dark card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Meninggal</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $meninggalProv }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ $persenMeninggalProv}}% </span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-black text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-cry.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffMeninggalProv >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffMeninggalProv }}</span>
                                <span class="text-white">Dari kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="shadow card bg-gradient-warning card-stats mb-4 mb-xl-0">
                        <div class="shadow card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-white mb-0">Dirawat</h5>
                                    <span class="h2 font-weight-bold text-white mb-0">{{ $dirawatProv }} Orang</span>
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ $persenDirawatProv}}% </span></h6>
                                </div>
                                <div class="col-auto">
                                    <!-- <div class="icon icon-shape bg-blue text-white rounded-circle shadow"> -->
                                        <img height="55" widht="55" src="{{ asset('argon') }}/img/brand/emoticon-sick.png" alt="...">
                                    <!-- </div> -->
                                </div>
                            </div>
                            <p class="mt-4 mb-0 text-white text-sm">
                                <span class="text-white mr-2">
                                    @if($diffDirawatProv >= 0)
                                    <i class="fa fa-arrow-up">
                                    @else
                                    <i class="fa fa-arrow-down">
                                    @endif
                                    </i> {{ $diffDirawatProv }}</span>
                                <span class="text-white">Dari kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Positif COVID-19 Provinsi {{$nama}}</h2>
                                </div>
                                {{-- <button id="btn1">
                                    Option 1
                                    </button>
                                    <button id="btn2">
                                    Option 2
                                    </button> --}}
                      
                                <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item mr-2 mr-md-0" id="btn1">
                                            <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1">
                                                <span class="d-none d-md-block">Kumulatif</span>
                                                <span class="d-md-none">Kumulatif</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="btn2">
                                            <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2">
                                                <span class="d-none d-md-block">Laju</span>
                                                <span class="d-md-none">Laju</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                              
                        </div>
                        <!-- <form action="/ProvGraph/filter" method="GET">
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-control" id="drop" name="nama">
                                    <option value="">{{$nama}}</option>
                                        @foreach ($namaProvinsi as $item)
                                            <option value="{{$item->FID}}">{{ucfirst($item->FID)}}</option>      
                                        @endforeach
                                    </select>
                                    <button class="btn btn-icon btn-success" type="submit">
                                        <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                                    </button>
                                </div>
                            </div>
                            
                        </form> -->
                        
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-prov" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Sembuh COVID-19 Provinsi {{$nama}}</h2>
                                </div>
                                {{-- <button id="btn1">
                                    Option 1
                                    </button>
                                    <button id="btn2">
                                    Option 2
                                    </button> --}}
                      
                                <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item mr-2 mr-md-0" id="btn1Sembuh">
                                            <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1Sembuh">
                                                <span class="d-none d-md-block">Kumulatif</span>
                                                <span class="d-md-none">Kumulatif</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="btn2Sembuh">
                                            <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2Sembuh">
                                                <span class="d-none d-md-block">Laju</span>
                                                <span class="d-md-none">Laju</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                              
                        </div>
                        <!-- <form action="/ProvGraph/filter" method="GET">
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-control" id="drop" name="nama">
                                    <option value="">{{$nama}}</option>
                                        @foreach ($namaProvinsi as $item)
                                            <option value="{{$item->FID}}">{{ucfirst($item->FID)}}</option>      
                                        @endforeach
                                    </select>
                                    <button class="btn btn-icon btn-success" type="submit">
                                        <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                                    </button>
                                </div>
                            </div>
                            
                        </form> -->
                        
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-prov-sembuh" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Meninggal COVID-19 Provinsi {{$nama}}</h2>
                                </div>
                                {{-- <button id="btn1">
                                    Option 1
                                    </button>
                                    <button id="btn2">
                                    Option 2
                                    </button> --}}
                      
                                <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item mr-2 mr-md-0" id="btn1Meninggal">
                                            <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1Meninggal">
                                                <span class="d-none d-md-block">Kumulatif</span>
                                                <span class="d-md-none">Kumulatif</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="btn2Meninggal">
                                            <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2Meninggal">
                                                <span class="d-none d-md-block">Laju</span>
                                                <span class="d-md-none">Laju</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                              
                        </div>
                        <!-- <form action="/ProvGraph/filter" method="GET">
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-control" id="drop" name="nama">
                                    <option value="">{{$nama}}</option>
                                        @foreach ($namaProvinsi as $item)
                                            <option value="{{$item->FID}}">{{ucfirst($item->FID)}}</option>      
                                        @endforeach
                                    </select>
                                    <button class="btn btn-icon btn-success" type="submit">
                                        <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                                    </button>
                                </div>
                            </div>
                            
                        </form> -->
                        
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-prov-meninggal" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Grafik Dirawat COVID-19 Provinsi {{$nama}}</h2>
                                </div>
                                {{-- <button id="btn1">
                                    Option 1
                                    </button>
                                    <button id="btn2">
                                    Option 2
                                    </button> --}}
                      
                                <div class="col">
                                    <ul class="nav nav-pills justify-content-end">
                                        <li class="nav-item mr-2 mr-md-0" id="btn1Dirawat">
                                            <a href="#" class="nav-link py-2 px-3 active show" data-toggle="tab" id="btn1Dirawat">
                                                <span class="d-none d-md-block">Kumulatif</span>
                                                <span class="d-md-none">Kumulatif</span>
                                            </a>
                                        </li>
                                        <li class="nav-item" id="btn2Dirawat">
                                            <a href="#" class="nav-link py-2 px-3" data-toggle="tab" id="btn2Dirawat">
                                                <span class="d-none d-md-block">Laju</span>
                                                <span class="d-md-none">Laju</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                              
                        </div>
                        <!-- <form action="/ProvGraph/filter" method="GET">
                            <div class="form-group">
                                <div class="input-group">
                                    <select class="form-control" id="drop" name="nama">
                                    <option value="">{{$nama}}</option>
                                        @foreach ($namaProvinsi as $item)
                                            <option value="{{$item->FID}}">{{ucfirst($item->FID)}}</option>      
                                        @endforeach
                                    </select>
                                    <button class="btn btn-icon btn-success" type="submit">
                                        <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                                    </button>
                                </div>
                            </div>
                            
                        </form> -->
                        
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-prov-dirawat" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-12 mb-5">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Data COVID-19 Dunia</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" style="padding-right: 25px;padding-left: 25px;">
                            <!-- Projects table -->
                            <table id="table_dunia" class="table align-items-center table-flush table-striped" cellspacing="0" width="100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th data-formatter="runningFormatter">NO</th>
                                        <th scope="col">Negara</th>
                                        <th scope="col">Positif</th>
                                        <th scope="col">Laju Positif</th>
                                        <th scope="col">Sembuh</th>
                                        <th scope="col">Persentase Sembuh</th>
                                        <th scope="col">Meninggal</th>
                                        <th scope="col">Persentase Meninggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 1; $i <= 186; $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $global[$i-1 + (sizeof($global)-186)]->OBJECTID }}</td>
                                            <td align="right">{{ ($global[$i-1 + (sizeof($global)-186)]->Confirmed) }}</td>
                                            <td align="right">{{ number_format((($global[$i-1 + (sizeof($global)-186)]->Confirmed)-($global[$i-1]->Confirmed))/(sizeof($global)/186),0) }}</td>
                                            <td align="right">{{ ($global[$i-1 + (sizeof($global)-186)]->Recovered) }}</td>
                                            <td align="right">{{ ($global[$i-1 + (sizeof($global)-186)]->Confirmed == 0 || $global[$i-1 + (sizeof($global)-186)]->Confirmed == NULL) ? 0 : number_format(($global[$i-1 + (sizeof($global)-186)]->Recovered/($global[$i-1 + (sizeof($global)-186)]->Confirmed)*100),0)  }}</td>
                                            <td align="right">{{ ($global[$i-1 + (sizeof($global)-186)]->Deaths) }}</td>
                                            <td align="right">{{($global[$i-1 + (sizeof($global)-186)]->Confirmed == 0 || $global[$i-1 + (sizeof($global)-186)]->Confirmed == NULL) ? 0 : number_format(($global[$i-1 + (sizeof($global)-186)]->Deaths/($global[$i-1 + (sizeof($global)-186)]->Confirmed)*100),0) }}</td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 mb-5 mb-xl-5">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Data COVID-19 Indonesia</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" style="padding-right: 25px;padding-left: 25px;">
                            <!-- Projects table -->
                            <table id="table_indo" class="table align-items-center table-flush table-striped" cellspacing="0" width="100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th data-formatter="runningFormatter">NO</th>
                                        <th scope="col">Provinsi</th>
                                        <th scope="col">Positif</th>
                                        <th scope="col">Laju Positif</th>
                                        <th scope="col">Sembuh</th>
                                        <th scope="col">Persentase Sembuh</th>
                                        <th scope="col">Meninggal</th>
                                        <th scope="col">Persentase Meninggal</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 1; $i <= 34; $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $provinsi[$i-1 + (sizeof($provinsi)-34)]->FID }}</td>
                                            <td align="right">{{ ($provinsi[$i-1 + (sizeof($provinsi)-34)]->Kasus_Posi) }}</td>
                                            <td align="right">{{ number_format((($provinsi[$i-1 + (sizeof($provinsi)-34)]->Kasus_Posi)-($provinsi[$i-1]->Kasus_Posi))/(sizeof($provinsi)/34),0) }}</td>
                                            <td align="right">{{ ($provinsi[$i-1 + (sizeof($provinsi)-34)]->Kasus_Semb) }}</td>
                                            <td align="right">{{ number_format(($provinsi[$i-1 + (sizeof($provinsi)-34)]->Kasus_Semb/($provinsi[$i-1 + (sizeof($provinsi)-34)]->Kasus_Posi)*100),0) }}</td>
                                            <td align="right">{{ ($provinsi[$i-1 + (sizeof($provinsi)-34)]->Kasus_Meni) }}</td>
                                            <td align="right">{{ number_format(($provinsi[$i-1 + (sizeof($provinsi)-34)]->Kasus_Meni/($provinsi[$i-1 + (sizeof($provinsi)-34)]->Kasus_Posi)*100),0) }}</td>
                                             
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 mb-5 mb-xl-0">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Data Summary</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" style="padding-right: 25px;padding-left: 25px;">
                            <!-- Projects table -->
                            <table id="table_summary" class="table align-items-center table-flush table-striped" cellspacing="0" width="100%">
                                <thead class="thead-light">
                                        <tr>
                                            <th style="text-align: center" rowspan="2" data-valign="middle" data-formatter="runningFormatter">NO</th>
                                            <th style="text-align: center" rowspan="2" data-valign="middle">TINGKAT</th>
                                            <th style="text-align: center" rowspan="2" data-valign="middle">POSITIF</th>
                                            <th style="text-align: center" colspan="2">SEMBUH</th>
                                            <th style="text-align: center" colspan="2">MENINGGAL</th>

                                        </tr>
                                        <tr>
                                          <th style="text-align: center">JUMLAH</th>
                                          <th style="text-align: center">PERSENTASE</th>
                                          <th style="text-align: center">JUMLAH</th>
                                          <th style="text-align: center">PERSENTASE</th>
                                        </tr>
                                   
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Nasional</td>
                                            <td align="right">{{ $positif }}</td>
                                            <td align="right">{{ $sembuh }}</td>
                                            <td align="right">{{ $persenSembuh }}</td>
                                            <td align="right">{{ $meninggal }}</td>
                                            <td align="right">{{ $persenMeninggal }}</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Global</td>
                                            <td align="right">{{ $positifGlobal }}</td>
                                            <td align="right">{{ $sembuhGlobal }}</td>
                                            <td align="right">{{ $persenSembuhGlobal }}</td>
                                            <td align="right">{{ $meninggalGlobal }}</td>
                                            <td align="right">{{ $persenMeninggalGlobal }}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
            @include('layouts.footers.auth')
            
        </div>

@endsection
<!-- <style> 
    .body {
        background-image: url("{{ asset('argon') }}/img/brand/12.png");
        
    }
</style> -->
<style>
    .scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
}
    .drop {
    min-height:190px; 
    overflow-y :auto; 
    overflow-x:hidden; 
    position:absolute;
    width:300px;
    display: contents;
}

</style>

@push('js')

    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
    
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="{{ asset('argon') }}/js/addons/datatables.min.js"></script>

    <script src="/argon/js/argon.js"></script>
    <script>
        'use strict';
        
        var SalesChart = (function() {

        // Variables

        var $chart = $('#chart-saless');


        // Methods

        function init($chart) {

            var salesChart = new Chart($chart, {
                type: 'line',
                options: {
                    scales: {
                        yAxes: [{
                            gridLines: {
                                color: Charts.colors.gray[900],
                                zeroLineColor: Charts.colors.gray[900]
                            },
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     return value;
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += yLabel ;
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($positifDate) !!},
                    datasets: [{
                        label: 'permormance',
                        data: {!! json_encode($dataPositif) !!}
                    }]
                }
            });

            // Save to jQuery object

            $chart.data('chart', salesChart);

        };


        // Events

        if ($chart.length) {
            init($chart);
        }

        })();
    </script>
      <script>
        'use strict';
        
        var SalesChartGlobal = (function() {

        // Variables

        var $chartGlobal = $('#chart-saless-global');


        // Methods

        function init($chartGlobal) {

            var salesChartGlobal = new Chart($chartGlobal, {
                type: 'line',
                options: {
                    scales: {
                        yAxes: [{
                            gridLines: {
                                color: Charts.colors.gray[900],
                                zeroLineColor: Charts.colors.gray[900]
                            },
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     return value;
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += yLabel ;
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($positifDateGlobal) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataPositifGlobal) !!}
                    }]
                }
            });

            // Save to jQuery object

            $chartGlobal.data('chart', salesChartGlobal);

        };


        // Events

        if ($chartGlobal.length) {
            init($chartGlobal);
        }

        })();
    </script>

    <script>
        'use strict';
        
        var SalesChartGlobalSembuh = (function() {

        // Variables
        var $chartGlobal = $('#chart-saless-global-sembuh');


        // Methods

        function init($chartGlobal) {

            var salesChartGlobal = new Chart($chartGlobal, {
                type: 'line',
                options: {
                    scales: {
                        yAxes: [{
                            gridLines: {
                                color: Charts.colors.gray[900],
                                zeroLineColor: Charts.colors.gray[900]
                            },
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     return value;
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += yLabel ;
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($positifDateGlobal) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataPositifGlobal) !!}
                    }]
                }
            });

            // Save to jQuery object

            $chartGlobal.data('chart', salesChartGlobal);

        };


        // Events

        if ($chartGlobal.length) {
            init($chartGlobal);
        }

        })();
    </script>

<script>
        'use strict';
        
        var SalesChartGlobalMeninggal = (function() {

        // Variables
        var $chartGlobalMeninggal = $('#chart-saless-global-meninggal');


        // Methods

        function init($chartGlobalMeninggal) {

            var salesChartGlobal = new Chart($chartGlobalMeninggal, {
                type: 'line',
                options: {
                    scales: {
                        yAxes: [{
                            gridLines: {
                                color: Charts.colors.gray[900],
                                zeroLineColor: Charts.colors.gray[900]
                            },
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     return value;
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += yLabel ;
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($positifDateGlobal) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataPositifGlobal) !!}
                    }]
                }
            });

            // Save to jQuery object

            $chartGlobalMeninggal.data('chart', SalesChartGlobalMeninggal);

        };


        // Events

        if ($chartGlobalMeninggal.length) {
            init($chartGlobalMeninggal);
        }

        })();
    </script>

     <script>
        'use strict';
        
        var SalesChartBali = (function() {

        // Variables

        var $chartBali = $('#chart-saless-bali');


        // Methods

        function init($chartBali) {

            var salesChartBali = new Chart($chartBali, {
                type: 'line',
                options: {
                    scales: {
                        yAxes: [{
                            gridLines: {
                                color: Charts.colors.gray[900],
                                zeroLineColor: Charts.colors.gray[900]
                            },
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     return value;
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += yLabel ;
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($positifDateBali) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($arrayPositif) !!}
                    }]
                }
            });

            // Save to jQuery object

            $chartBali.data('chart', salesChartBali);

        };


        // Events

        if ($chartBali.length) {
            init($chartBali);
        }

        })();
    </script>
        <script>
            'use strict';
            
            var SalesChartProv = (function() {
    
            // Variables
    
            var $chartProv = $('#chart-saless-prov');
    
    
            // Methods
    
            function init($chartProv) {
    
                var salesChartProv = new Chart($chartProv, {
                    type: 'line',
                    options: {
                        scales: {
                            yAxes: [{
                                gridLines: {
                                    color: Charts.colors.gray[900],
                                    zeroLineColor: Charts.colors.gray[900]
                                },
                                ticks: {
                                    callback: function(value) {
                                        // if (!(value % 10)) {
                                        //     return value;
                                        // }

                                        if(parseInt(value) >= 1000){
                                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }else if(value == 0){
                                            return value = "0";
                                        } else{
                                            return value;
                                        }
                                    }
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function(item, data) {
                                    // var label = data.datasets[item.datasetIndex].label || '';
                                    // var yLabel = item.yLabel;
                                    // var content = '';
    
                                    // if (data.datasets.length > 1) {
                                    //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                    // }
    
                                    // content += yLabel ;
                                    // return content;

                                    var value = data.datasets[item.datasetIndex].data[item.index];

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }
                    },
                    data: {
                        labels: {!! json_encode($positifDateProv) !!},
                        datasets: [{
                            label: 'permormance',
                            data: {!! json_encode($dataPositifProv) !!}
                        }]
                    }
                });
    
                // Save to jQuery object
    
                $chartProv.data('chart', salesChartProv);
    
            };
    
    
            // Events
    
            if ($chartProv.length) {
                init($chartProvIndo);
            }
    
            })();
        </script>

    <script>
        var OrdersChartIndo = (function() {

        var $chartIndo = $('#chart-orderss');
        var $ordersSelectIndo = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartIndo) {

            // Create chart
            var ctxIndo = document.getElementById('chart-orderss').getContext('2d');

            window.ordersChartIndo = new Chart(ctxIndo, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($positifDate) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataPositif) !!}
                    }]
                }
            });
        
                // Save to jQuery object
            function removeData(chartIndo) {
                chartIndo.destroy();
            }

            function addData(chartIndo, label, data) {
                
            }
        $("#btn1Indo").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartIndo && window.ordersChartIndo !== null){
                window.ordersChartIndo.destroy();
            }

            var label = {!! json_encode($positifDate) !!}
            var data = {!! json_encode($dataPositif) !!}

            window.ordersChartIndo = new Chart(ctxIndo, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartIndo.update();
        });
        $("#btn2Indo").on("click", function() {

            if(window.ordersChartIndo && window.ordersChartIndo !== null){
                window.ordersChartIndo.destroy();
            }

            var label = {!! json_encode($positifDateDiff) !!}
            var data = {!! json_encode($dataPositifDiff) !!}

            window.ordersChartIndo = new Chart(ctxIndo, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartIndo.update();
        });
            $chartIndo.data('chartIndo', ordersChartIndo);
            
        }

        // Init chart
        if ($chartIndo.length) {
            initChart($chartIndo);
        }
        })();
    </script>

    <script>
        var OrdersChartIndoSembuh = (function() {

        var $chartIndoSembuh = $('#chart-orderss-sembuh');
        var $ordersSelectIndoSembuh = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartIndoSembuh) {

            // Create chart
            var ctxIndoSembuh = document.getElementById('chart-orderss-sembuh').getContext('2d');

            window.ordersChartIndoSembuh = new Chart(ctxIndoSembuh, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($sembuhDate) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataSembuh) !!}
                    }]
                }
            });
        
                // Save to jQuery object
            function removeData(chartIndoSembuh) {
                chartIndoSembuh.destroy();
            }

            function addData(chartIndoSembuh, label, data) {
                
            }
        $("#btn1IndoSembuh").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartIndoSembuh && window.ordersChartIndoSembuh !== null){
                window.ordersChartIndoSembuh.destroy();
            }

            var label = {!! json_encode($sembuhDate) !!}
            var data = {!! json_encode($dataSembuh) !!}

            window.ordersChartIndoSembuh = new Chart(ctxIndoSembuh, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartIndoSembuh.update();
        });
        $("#btn2IndoSembuh").on("click", function() {

            if(window.ordersChartIndoSembuh && window.ordersChartIndoSembuh !== null){
                window.ordersChartIndoSembuh.destroy();
            }

            var label = {!! json_encode($sembuhDateDiff) !!}
            var data = {!! json_encode($dataSembuhDiff) !!}

            window.ordersChartIndoSembuh = new Chart(ctxIndoSembuh, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartIndoSembuh.update();
        });
            $chartIndoSembuh.data('chartIndoSembuh', ordersChartIndoSembuh);
            
        }

        // Init chart
        if ($chartIndoSembuh.length) {
            initChart($chartIndoSembuh);
        }
        })();
    </script>

    <script>
        var OrdersChartIndoMeninggal = (function() {

        var $chartIndoMeninggal = $('#chart-orderss-meninggal');
        var $ordersSelectIndoMeninggal = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartIndoMeninggal) {

            // Create chart
            var ctxIndoMeninggal = document.getElementById('chart-orderss-meninggal').getContext('2d');

            window.ordersChartIndoMeninggal = new Chart(ctxIndoMeninggal, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($meninggalDate) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataMeninggal) !!}
                    }]
                }
            });
        
                // Save to jQuery object
            function removeData(chartIndoMeninggal) {
                chartIndoMeninggal.destroy();
            }

            function addData(chartIndoMeninggal, label, data) {
                
            }
        $("#btn1IndoMeninggal").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartIndoMeninggal && window.ordersChartIndoMeninggal !== null){
                window.ordersChartIndoMeninggal.destroy();
            }

            var label = {!! json_encode($meninggalDate) !!}
            var data = {!! json_encode($dataMeninggal) !!}

            window.ordersChartIndoMeninggal = new Chart(ctxIndoMeninggal, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartIndoMeninggal.update();
        });
        $("#btn2IndoMeninggal").on("click", function() {

            if(window.ordersChartIndoMeninggal && window.ordersChartIndoMeninggal !== null){
                window.ordersChartIndoMeninggal.destroy();
            }

            var label = {!! json_encode($meninggalDateDiff) !!}
            var data = {!! json_encode($dataMeninggalDiff) !!}

            window.ordersChartIndoMeninggal = new Chart(ctxIndoMeninggal, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartIndoMeninggal.update();
        });
            $chartIndoMeninggal.data('chartIndoMeninggal', ordersChartIndoMeninggal);
            
        }

        // Init chart
        if ($chartIndoMeninggal.length) {
            initChart($chartIndoMeninggal);
        }
        })();
    </script>

    <script>
        var OrdersChartIndoDirawat = (function() {

        var $chartIndoDirawat = $('#chart-orderss-dirawat');
        var $ordersSelectIndoDirawat = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartIndoDirawat) {

            // Create chart
            var ctxIndoDirawat = document.getElementById('chart-orderss-dirawat').getContext('2d');

            window.ordersChartIndoDirawat = new Chart(ctxIndoDirawat, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($dirawatDate) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataDirawat) !!}
                    }]
                }
            });
        
                // Save to jQuery object
            function removeData(chartIndoDirawat) {
                chartIndoDirawat.destroy();
            }

            function addData(chartIndoDirawat, label, data) {
                
            }
        $("#btn1IndoDirawat").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartIndoDirawat && window.ordersChartIndoDirawat !== null){
                window.ordersChartIndoDirawat.destroy();
            }

            var label = {!! json_encode($dirawatDate) !!}
            var data = {!! json_encode($dataDirawat) !!}

            window.ordersChartIndoDirawat = new Chart(ctxIndoDirawat, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartIndoDirawat.update();
        });
        $("#btn2IndoDirawat").on("click", function() {

            if(window.ordersChartIndoDirawat && window.ordersChartIndoDirawat !== null){
                window.ordersChartIndoDirawat.destroy();
            }

            var label = {!! json_encode($dirawatDateDiff) !!}
            var data = {!! json_encode($dataDirawatDiff) !!}

            window.ordersChartIndoDirawat = new Chart(ctxIndoDirawat, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartIndoDirawat.update();
        });
            $chartIndoDirawat.data('chartIndoDirawat', ordersChartIndoDirawat);
            
        }

        // Init chart
        if ($chartIndoDirawat.length) {
            initChart($chartIndoDirawat);
        }
        })();
    </script>

            <script>
                var OrdersChartGlobal = (function() {

                var $chartGlobal = $('#chart-orderss-global');
                var $ordersSelectGlobal = $('[name="ordersSelect"]');


                //
                // Methods
                //

                // Init chart
                function initChart($chartGlobal) {

                    // Create chart
                    var ctxGlobal = document.getElementById('chart-orderss-global').getContext('2d');

                    window.ordersChartGlobal = new Chart(ctxGlobal, {
                        type: 'bar',
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            // if (!(value % 10)) {
                                            //     //return '$' + value + 'k'
                                            //     return value
                                            // }

                                            if(parseInt(value) >= 1000){
                                                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                            }else if(value == 0){
                                                return value = "0";
                                            } else{
                                                return value;
                                            }
                                        }
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(item, data) {
                                        // var label = data.datasets[item.datasetIndex].label || '';
                                        // var yLabel = item.yLabel;
                                        // var content = '';

                                        // if (data.datasets.length > 1) {
                                        //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                        // }

                                        // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                        
                                        // return content;

                                        var value = data.datasets[item.datasetIndex].data[item.index];

                                        if(parseInt(value) >= 1000){
                                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }else if(value == 0){
                                            return value = "0";
                                        } else{
                                            return value;
                                        }
                                    }
                                }
                            }
                        },
                        data: {
                            labels: {!! json_encode($positifDateGlobal) !!},
                            datasets: [{
                                label: 'performance',
                                data: {!! json_encode($dataPositifGlobal) !!}
                            }]
                        }
                    });
                
                        // Save to jQuery object
                    function removeData(chartGlobal) {
                        chartGlobal.destroy();
                    }

                    function addData(chartGlobal, label, data) {
                        
                    }
                $("#btn1Global").on("click", function() {
                    // var chart = ordersChart
                    // var label = {!! json_encode($positifDateProv) !!}
                    // var data = {!! json_encode($dataPositifProv) !!}

                    // chart.data.labels.pop();
                    // chart.data.datasets.forEach((dataset) => {
                    //     dataset.data.pop();
                    // });
                    // chart.update();

                    if(window.ordersChartGlobal && window.ordersChartGlobal !== null){
                        window.ordersChartGlobal.destroy();
                    }

                    var label = {!! json_encode($positifDateGlobal) !!}
                    var data = {!! json_encode($dataPositifGlobal) !!}

                    window.ordersChartGlobal = new Chart(ctxGlobal, {
                        type: 'bar',
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            // if (!(value % 10)) {
                                            //     //return '$' + value + 'k'
                                            //     return value
                                            // }

                                            if(parseInt(value) >= 1000){
                                                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                            }else if(value == 0){
                                                return value = "0";
                                            } else{
                                                return value;
                                            }
                                        }
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(item, data) {
                                        // var label = data.datasets[item.datasetIndex].label || '';
                                        // var yLabel = item.yLabel;
                                        // var content = '';

                                        // if (data.datasets.length > 1) {
                                        //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                        // }

                                        // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                        
                                        // return content;

                                        var value = data.datasets[item.datasetIndex].data[item.index];

                                        if(parseInt(value) >= 1000){
                                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }else if(value == 0){
                                            return value = "0";
                                        } else{
                                            return value;
                                        }
                                    }
                                }
                            }
                        },
                        data: {
                            labels: label,
                            datasets: [{
                                label: 'performance',
                                data: data
                            }]
                        }
                    });
                    ordersChartGlobal.update();
                });
                $("#btn2Global").on("click", function() {

                    if(window.ordersChartGlobal && window.ordersChartGlobal !== null){
                        window.ordersChartGlobal.destroy();
                    }

                    var label = {!! json_encode($positifDateGlobalDiff) !!}
                    var data = {!! json_encode($dataPositifGlobalDiff) !!}

                    window.ordersChartGlobal = new Chart(ctxGlobal, {
                        type: 'bar',
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            // if (!(value % 10)) {
                                            //     //return '$' + value + 'k'
                                            //     return value
                                            // }

                                            if(parseInt(value) >= 1000){
                                                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                            }else if(value == 0){
                                                return value = "0";
                                            } else{
                                                return value;
                                            }
                                        }
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(item, data) {
                                        // var label = data.datasets[item.datasetIndex].label || '';
                                        // var yLabel = item.yLabel;
                                        // var content = '';

                                        // if (data.datasets.length > 1) {
                                        //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                        // }

                                        // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                        
                                        // return content;

                                        var value = data.datasets[item.datasetIndex].data[item.index];

                                        if(parseInt(value) >= 1000){
                                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }else if(value == 0){
                                            return value = "0";
                                        } else{
                                            return value;
                                        }
                                    }
                                }
                            }
                        },
                        data: {
                            labels: label,
                            datasets: [{
                                label: 'performance',
                                data: data
                            }]
                        }
                    });
                    ordersChartGlobal.update();
                });
                    $chartGlobal.data('chartGlobal', ordersChartGlobal);
                    
                }

                // Init chart
                if ($chartGlobal.length) {
                    initChart($chartGlobal);
                }
        })();
    </script>

    <script>
                var OrdersChartGlobalSembuh = (function() {

                var $chartGlobalSembuh = $('#chart-orderss-global-sembuh');
                var $ordersSelectGlobalSembuh = $('[name="ordersSelect"]');


                //
                // Methods
                //

                // Init chart
                function initChart($chartGlobalSembuh) {

                    // Create chart
                    var ctxGlobalSembuh = document.getElementById('chart-orderss-global-sembuh').getContext('2d');

                    window.ordersChartGlobalSembuh = new Chart(ctxGlobalSembuh, {
                        type: 'bar',
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            // if (!(value % 10)) {
                                            //     //return '$' + value + 'k'
                                            //     return value
                                            // }

                                            if(parseInt(value) >= 1000){
                                                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                            }else if(value == 0){
                                                return value = "0";
                                            } else{
                                                return value;
                                            }
                                        }
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(item, data) {
                                        // var label = data.datasets[item.datasetIndex].label || '';
                                        // var yLabel = item.yLabel;
                                        // var content = '';

                                        // if (data.datasets.length > 1) {
                                        //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                        // }

                                        // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                        
                                        // return content;

                                        var value = data.datasets[item.datasetIndex].data[item.index];

                                        if(parseInt(value) >= 1000){
                                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }else if(value == 0){
                                            return value = "0";
                                        } else{
                                            return value;
                                        }
                                    }
                                }
                            }
                        },
                        data: {
                            labels: {!! json_encode($sembuhDateGlobal) !!},
                            datasets: [{
                                label: 'performance',
                                data: {!! json_encode($dataSembuhGlobal) !!}
                            }]
                        }
                    });
                
                        // Save to jQuery object
                    function removeData(chartGlobalSembuh) {
                        chartGlobalSembuh.destroy();
                    }

                    function addData(chartGlobalSembuh, label, data) {
                        
                    }
                $("#btn1GlobalSembuh").on("click", function() {
                    // var chart = ordersChart
                    // var label = {!! json_encode($positifDateProv) !!}
                    // var data = {!! json_encode($dataPositifProv) !!}

                    // chart.data.labels.pop();
                    // chart.data.datasets.forEach((dataset) => {
                    //     dataset.data.pop();
                    // });
                    // chart.update();

                    if(window.ordersChartGlobalSembuh && window.ordersChartGlobalSembuh !== null){
                        window.ordersChartGlobalSembuh.destroy();
                    }

                    var label = {!! json_encode($sembuhDateGlobal) !!}
                    var data = {!! json_encode($dataSembuhGlobal) !!}

                    window.ordersChartGlobalSembuh = new Chart(ctxGlobalSembuh, {
                        type: 'bar',
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            // if (!(value % 10)) {
                                            //     //return '$' + value + 'k'
                                            //     return value
                                            // }

                                            if(parseInt(value) >= 1000){
                                                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                            }else if(value == 0){
                                                return value = "0";
                                            } else{
                                                return value;
                                            }
                                        }
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(item, data) {
                                        // var label = data.datasets[item.datasetIndex].label || '';
                                        // var yLabel = item.yLabel;
                                        // var content = '';

                                        // if (data.datasets.length > 1) {
                                        //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                        // }

                                        // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                        
                                        // return content;

                                        var value = data.datasets[item.datasetIndex].data[item.index];

                                        if(parseInt(value) >= 1000){
                                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }else if(value == 0){
                                            return value = "0";
                                        } else{
                                            return value;
                                        }
                                    }
                                }
                            }
                        },
                        data: {
                            labels: label,
                            datasets: [{
                                label: 'performance',
                                data: data
                            }]
                        }
                    });
                    ordersChartGlobalSembuh.update();
                });
                $("#btn2GlobalSembuh").on("click", function() {

                    if(window.ordersChartGlobalSembuh && window.ordersChartGlobalSembuh !== null){
                        window.ordersChartGlobalSembuh.destroy();
                    }

                    var label = {!! json_encode($sembuhDateGlobalDiff) !!}
                    var data = {!! json_encode($dataSembuhGlobalDiff) !!}

                    window.ordersChartGlobalSembuh = new Chart(ctxGlobalSembuh, {
                        type: 'bar',
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            // if (!(value % 10)) {
                                            //     //return '$' + value + 'k'
                                            //     return value
                                            // }

                                            if(parseInt(value) >= 1000){
                                                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                            }else if(value == 0){
                                                return value = "0";
                                            } else{
                                                return value;
                                            }
                                        }
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(item, data) {
                                        // var label = data.datasets[item.datasetIndex].label || '';
                                        // var yLabel = item.yLabel;
                                        // var content = '';

                                        // if (data.datasets.length > 1) {
                                        //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                        // }

                                        // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                        
                                        // return content;

                                        var value = data.datasets[item.datasetIndex].data[item.index];

                                        if(parseInt(value) >= 1000){
                                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }else if(value == 0){
                                            return value = "0";
                                        } else{
                                            return value;
                                        }
                                    }
                                }
                            }
                        },
                        data: {
                            labels: label,
                            datasets: [{
                                label: 'performance',
                                data: data
                            }]
                        }
                    });
                    ordersChartGlobalSembuh.update();
                });
                    $chartGlobalSembuh.data('chartGlobalSembuh', ordersChartGlobalSembuh);
                    
                }

                // Init chart
                if ($chartGlobalSembuh.length) {
                    initChart($chartGlobalSembuh);
                }
        })();
    </script>

    <script>
                var OrdersChartGlobalMeninggal = (function() {

                var $chartGlobalMeninggal = $('#chart-orderss-global-meninggal');
                var $ordersSelectGlobalMeninggal = $('[name="ordersSelect"]');


                //
                // Methods
                //

                // Init chart
                function initChart($chartGlobalMeninggal) {

                    // Create chart
                    var ctxGlobalMeninggal = document.getElementById('chart-orderss-global-meninggal').getContext('2d');

                    window.ordersChartGlobalMeninggal = new Chart(ctxGlobalMeninggal, {
                        type: 'bar',
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            // if (!(value % 10)) {
                                            //     //return '$' + value + 'k'
                                            //     return value
                                            // }

                                            if(parseInt(value) >= 1000){
                                                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                            }else if(value == 0){
                                                return value = "0";
                                            } else{
                                                return value;
                                            }
                                        }
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(item, data) {
                                        // var label = data.datasets[item.datasetIndex].label || '';
                                        // var yLabel = item.yLabel;
                                        // var content = '';

                                        // if (data.datasets.length > 1) {
                                        //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                        // }

                                        // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                        
                                        // return content;

                                        var value = data.datasets[item.datasetIndex].data[item.index];

                                        if(parseInt(value) >= 1000){
                                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }else if(value == 0){
                                            return value = "0";
                                        } else{
                                            return value;
                                        }
                                    }
                                }
                            }
                        },
                        data: {
                            labels: {!! json_encode($meninggalDateGlobal) !!},
                            datasets: [{
                                label: 'performance',
                                data: {!! json_encode($dataMeninggalGlobal) !!}
                            }]
                        }
                    });
                
                        // Save to jQuery object
                    function removeData(chartGlobalMeninggal) {
                        chartGlobalMeninggal.destroy();
                    }

                    function addData(chartGlobalSembuh, label, data) {
                        
                    }
                $("#btn1GlobalMeninggal").on("click", function() {
                    // var chart = ordersChart
                    // var label = {!! json_encode($positifDateProv) !!}
                    // var data = {!! json_encode($dataPositifProv) !!}

                    // chart.data.labels.pop();
                    // chart.data.datasets.forEach((dataset) => {
                    //     dataset.data.pop();
                    // });
                    // chart.update();

                    if(window.ordersChartGlobalMeninggal && window.ordersChartGlobalMeninggal !== null){
                        window.ordersChartGlobalMeninggal.destroy();
                    }

                    var label = {!! json_encode($meninggalDateGlobal) !!}
                    var data = {!! json_encode($dataMeninggalGlobal) !!}

                    window.ordersChartGlobalMeninggal = new Chart(ctxGlobalMeninggal, {
                        type: 'bar',
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            // if (!(value % 10)) {
                                            //     //return '$' + value + 'k'
                                            //     return value
                                            // }

                                            if(parseInt(value) >= 1000){
                                                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                            }else if(value == 0){
                                                return value = "0";
                                            } else{
                                                return value;
                                            }
                                        }
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(item, data) {
                                        // var label = data.datasets[item.datasetIndex].label || '';
                                        // var yLabel = item.yLabel;
                                        // var content = '';

                                        // if (data.datasets.length > 1) {
                                        //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                        // }

                                        // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                        
                                        // return content;

                                        var value = data.datasets[item.datasetIndex].data[item.index];

                                        if(parseInt(value) >= 1000){
                                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }else if(value == 0){
                                            return value = "0";
                                        } else{
                                            return value;
                                        }
                                    }
                                }
                            }
                        },
                        data: {
                            labels: label,
                            datasets: [{
                                label: 'performance',
                                data: data
                            }]
                        }
                    });
                    ordersChartGlobalMeninggal.update();
                });
                $("#btn2GlobalMeninggal").on("click", function() {

                    if(window.ordersChartGlobalMeninggal && window.ordersChartGlobalMeninggal !== null){
                        window.ordersChartGlobalMeninggal.destroy();
                    }

                    var label = {!! json_encode($meninggalDateGlobalDiff) !!}
                    var data = {!! json_encode($dataMeninggalGlobalDiff) !!}

                    window.ordersChartGlobalMeninggal = new Chart(ctxGlobalMeninggal, {
                        type: 'bar',
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            // if (!(value % 10)) {
                                            //     //return '$' + value + 'k'
                                            //     return value
                                            // }

                                            if(parseInt(value) >= 1000){
                                                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                            }else if(value == 0){
                                                return value = "0";
                                            } else{
                                                return value;
                                            }
                                        }
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(item, data) {
                                        // var label = data.datasets[item.datasetIndex].label || '';
                                        // var yLabel = item.yLabel;
                                        // var content = '';

                                        // if (data.datasets.length > 1) {
                                        //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                        // }

                                        // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                        
                                        // return content;

                                        var value = data.datasets[item.datasetIndex].data[item.index];

                                        if(parseInt(value) >= 1000){
                                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }else if(value == 0){
                                            return value = "0";
                                        } else{
                                            return value;
                                        }
                                    }
                                }
                            }
                        },
                        data: {
                            labels: label,
                            datasets: [{
                                label: 'performance',
                                data: data
                            }]
                        }
                    });
                    ordersChartGlobalMeninggal.update();
                });
                    $chartGlobalMeninggal.data('chartGlobalMeninggal', ordersChartGlobalMeninggal);
                    
                }

                // Init chart
                if ($chartGlobalMeninggal.length) {
                    initChart($chartGlobalMeninggal);
                }
        })();
    </script>

    <script>
                var OrdersChartGlobalDirawat= (function() {

                var $chartGlobalDirawat = $('#chart-orderss-global-dirawat');
                var $ordersSelectGlobalDirawat = $('[name="ordersSelect"]');


                //
                // Methods
                //

                // Init chart
                function initChart($chartGlobalDirawat) {

                    // Create chart
                    var ctxGlobalMeninggal = document.getElementById('chart-orderss-global-dirawat').getContext('2d');

                    window.ordersChartGlobalDirawat = new Chart(ctxGlobalMeninggal, {
                        type: 'bar',
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            // if (!(value % 10)) {
                                            //     //return '$' + value + 'k'
                                            //     return value
                                            // }

                                            if(parseInt(value) >= 1000){
                                                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                            }else if(value == 0){
                                                return value = "0";
                                            } else{
                                                return value;
                                            }
                                        }
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(item, data) {
                                        // var label = data.datasets[item.datasetIndex].label || '';
                                        // var yLabel = item.yLabel;
                                        // var content = '';

                                        // if (data.datasets.length > 1) {
                                        //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                        // }

                                        // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                        
                                        // return content;

                                        var value = data.datasets[item.datasetIndex].data[item.index];

                                        if(parseInt(value) >= 1000){
                                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }else if(value == 0){
                                            return value = "0";
                                        } else{
                                            return value;
                                        }
                                    }
                                }
                            }
                        },
                        data: {
                            labels: {!! json_encode($dirawatDateGlobal) !!},
                            datasets: [{
                                label: 'performance',
                                data: {!! json_encode($dataDirawatGlobal) !!}
                            }]
                        }
                    });
                
                        // Save to jQuery object
                    function removeData(chartGlobalDirawat) {
                        chartGlobalDirawat.destroy();
                    }

                    function addData(chartGlobalDirawat, label, data) {
                        
                    }
                $("#btn1GlobalDirawat").on("click", function() {
                    // var chart = ordersChart
                    // var label = {!! json_encode($positifDateProv) !!}
                    // var data = {!! json_encode($dataPositifProv) !!}

                    // chart.data.labels.pop();
                    // chart.data.datasets.forEach((dataset) => {
                    //     dataset.data.pop();
                    // });
                    // chart.update();

                    if(window.ordersChartGlobalDirawat && window.ordersChartGlobalDirawat !== null){
                        window.ordersChartGlobalDirawat.destroy();
                    }

                    var label = {!! json_encode($dirawatDateGlobal) !!}
                    var data = {!! json_encode($dataDirawatGlobal) !!}

                    window.ordersChartGlobalDirawat = new Chart(ctxGlobalMeninggal, {
                        type: 'bar',
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            // if (!(value % 10)) {
                                            //     //return '$' + value + 'k'
                                            //     return value
                                            // }

                                            if(parseInt(value) >= 1000){
                                                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                            }else if(value == 0){
                                                return value = "0";
                                            } else{
                                                return value;
                                            }
                                        }
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(item, data) {
                                        // var label = data.datasets[item.datasetIndex].label || '';
                                        // var yLabel = item.yLabel;
                                        // var content = '';

                                        // if (data.datasets.length > 1) {
                                        //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                        // }

                                        // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                        
                                        // return content;

                                        var value = data.datasets[item.datasetIndex].data[item.index];

                                        if(parseInt(value) >= 1000){
                                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }else if(value == 0){
                                            return value = "0";
                                        } else{
                                            return value;
                                        }
                                    }
                                }
                            }
                        },
                        data: {
                            labels: label,
                            datasets: [{
                                label: 'performance',
                                data: data
                            }]
                        }
                    });
                    ordersChartGlobalDirawat.update();
                });
                $("#btn2GlobalDirawat").on("click", function() {

                    if(window.ordersChartGlobalDirawat && window.ordersChartGlobalDirawat !== null){
                        window.ordersChartGlobalDirawat.destroy();
                    }

                    var label = {!! json_encode($dirawatDateGlobalDiff) !!}
                    var data = {!! json_encode($dataDirawatGlobalDiff) !!}

                    window.ordersChartGlobalDirawat = new Chart(ctxGlobalMeninggal, {
                        type: 'bar',
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        callback: function(value) {
                                            // if (!(value % 10)) {
                                            //     //return '$' + value + 'k'
                                            //     return value
                                            // }
                                            
                                            if(parseInt(value) >= 1000){
                                                return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                            }else if(value == 0){
                                                return value = "0";
                                            } else{
                                                return value;
                                            }
                                        }
                                    }
                                }]
                            },
                            tooltips: {
                                callbacks: {
                                    label: function(item, data) {
                                        // var label = data.datasets[item.datasetIndex].label || '';
                                        // var yLabel = item.yLabel;
                                        // var content = '';

                                        // if (data.datasets.length > 1) {
                                        //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                        // }

                                        // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                        
                                        // return content;
                                        var value = data.datasets[item.datasetIndex].data[item.index];

                                        if(parseInt(value) >= 1000){
                                            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                        }else if(value == 0){
                                            return value = "0";
                                        } else{
                                            return value;
                                        }
                                    }
                                }
                            }
                        },
                        data: {
                            labels: label,
                            datasets: [{
                                label: 'performance',
                                data: data
                            }]
                        }
                    });
                    ordersChartGlobalDirawat.update();
                });
                    $chartGlobalDirawat.data('chartGlobalDirawat', ordersChartGlobalDirawat);
                    
                }

                // Init chart
                if ($chartGlobalDirawat.length) {
                    initChart($chartGlobalDirawat);
                }
        })();
    </script>

    <script>
        var OrdersChartBali = (function() {

        var $chartBali = $('#chart-orderss-bali');
        var $ordersSelectBali = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartBali) {

            // Create chart
            var ctxBali = document.getElementById('chart-orderss-bali').getContext('2d');

            window.ordersChartBali = new Chart(ctxBali, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }
                                    
                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;
                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($positifDateBali) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataPositifBali) !!}
                    }]
                }
            });
        
                // Save to jQuery object
            function removeData(chartBali) {
                chartBali.destroy();
            }

            function addData(chartBali, label, data) {
                
            }
        $("#btn1Bali").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartBali && window.ordersChartBali !== null){
                window.ordersChartBali.destroy();
            }

            var label = {!! json_encode($positifDateBali) !!}
            var data = {!! json_encode($dataPositifBali) !!}

            window.ordersChartBali = new Chart(ctxBali, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }
                                   
                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;
                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartBali.update();
        });
        $("#btn2Bali").on("click", function() {

            if(window.ordersChartBali && window.ordersChartBali !== null){
                window.ordersChartBali.destroy();
            }

            var label = {!! json_encode($positifDateBaliDiff) !!}
            var data = {!! json_encode($dataPositifBaliDiff) !!}

            window.ordersChartBali = new Chart(ctxBali, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }
                                    
                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;
                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartBali.update();
        });
            $chartBali.data('chartBali', ordersChartBali);
            
        }

        // Init chart
        if ($chartBali.length) {
            initChart($chartBali);
        }
        })();
    </script>
    
    <script>
        var OrdersChartBaliSembuh = (function() {

        var $chartBaliSembuh = $('#chart-orderss-bali-sembuh');
        var $ordersSelectBaliSembuh = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartBaliSembuh) {

            // Create chart
            var ctxBaliSembuh = document.getElementById('chart-orderss-bali-sembuh').getContext('2d');

            window.ordersChartBaliSembuh = new Chart(ctxBaliSembuh, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }
                                    
                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;
                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($sembuhDateBali) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataSembuhBali) !!}
                    }]
                }
            });
        
                // Save to jQuery object
            function removeData(chartBaliSembuh) {
                chartBaliSembuh.destroy();
            }

            function addData(chartBaliSembuh, label, data) {
                
            }
        $("#btn1BaliSembuh").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartBaliSembuh && window.ordersChartBaliSembuh !== null){
                window.ordersChartBaliSembuh.destroy();
            }

            var label = {!! json_encode($sembuhDateBali) !!}
            var data = {!! json_encode($dataSembuhBali) !!}

            window.ordersChartBaliSembuh = new Chart(ctxBaliSembuh, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }
                                
                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartBaliSembuh.update();
        });
        $("#btn2BaliSembuh").on("click", function() {

            if(window.ordersChartBaliSembuh && window.ordersChartBaliSembuh !== null){
                window.ordersChartBaliSembuh.destroy();
            }

            var label = {!! json_encode($sembuhDateBaliDiff) !!}
            var data = {!! json_encode($dataSembuhBaliDiff) !!}

            window.ordersChartBaliSembuh = new Chart(ctxBaliSembuh, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }
                                    
                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;
                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartBaliSembuh.update();
        });
            $chartBaliSembuh.data('chartBaliSembuh', ordersChartBaliSembuh);
            
        }

        // Init chart
        if ($chartBaliSembuh.length) {
            initChart($chartBaliSembuh);
        }
        })();
    </script>

    <script>
        var OrdersChartBaliMeninggal = (function() {

        var $chartBaliMeninggal = $('#chart-orderss-bali-meninggal');
        var $ordersSelectBaliMeninggal = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartBaliMeninggal) {

            // Create chart
            var ctxBaliMeninggal = document.getElementById('chart-orderss-bali-meninggal').getContext('2d');

            window.ordersChartBaliMeninggal = new Chart(ctxBaliMeninggal, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($meninggalDateBali) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataMeninggalBali) !!}
                    }]
                }
            });
        
                // Save to jQuery object
            function removeData(chartBaliMeninggal) {
                chartBaliMeninggal.destroy();
            }

            function addData(chartBaliMeninggal, label, data) {
                
            }
        $("#btn1BaliMeninggal").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartBaliMeninggal && window.ordersChartBaliMeninggal !== null){
                window.ordersChartBaliMeninggal.destroy();
            }

            var label = {!! json_encode($meninggalDateBali) !!}
            var data = {!! json_encode($dataMeninggalBali) !!}

            window.ordersChartBaliMeninggal = new Chart(ctxBaliMeninggal, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartBaliMeninggal.update();
        });
        $("#btn2BaliMeninggal").on("click", function() {

            if(window.ordersChartBaliMeninggal && window.ordersChartBaliMeninggal !== null){
                window.ordersChartBaliMeninggal.destroy();
            }

            var label = {!! json_encode($meninggalDateBaliDiff) !!}
            var data = {!! json_encode($dataMeninggalBaliDiff) !!}

            window.ordersChartBaliMeninggal = new Chart(ctxBaliMeninggal, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartBaliMeninggal.update();
        });
            $chartBaliMeninggal.data('chartBaliMeninggal', ordersChartBaliMeninggal);
            
        }

        // Init chart
        if ($chartBaliMeninggal.length) {
            initChart($chartBaliMeninggal);
        }
        })();
    </script>

    <script>
        var OrdersChartBaliDirawat = (function() {

        var $chartBaliDirawat = $('#chart-orderss-bali-dirawat');
        var $ordersSelectBaliDirawat = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartBaliDirawat) {

            // Create chart
            var ctxBaliDirawat = document.getElementById('chart-orderss-bali-dirawat').getContext('2d');

            window.ordersChartBaliDirawat = new Chart(ctxBaliDirawat, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($dirawatDateBali) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataDirawatBali) !!}
                    }]
                }
            });
        
                // Save to jQuery object
            function removeData(chartBaliDirawat) {
                chartBaliDirawat.destroy();
            }

            function addData(chartBaliDirawat, label, data) {
                
            }
        $("#btn1BaliDirawat").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartBaliDirawat && window.ordersChartBaliDirawat !== null){
                window.ordersChartBaliDirawat.destroy();
            }

            var label = {!! json_encode($dirawatDateBali) !!}
            var data = {!! json_encode($dataDirawatBali) !!}

            window.ordersChartBaliDirawat = new Chart(ctxBaliDirawat, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartBaliDirawat.update();
        });
        $("#btn2BaliDirawat").on("click", function() {

            if(window.ordersChartBaliDirawat && window.ordersChartBaliDirawat !== null){
                window.ordersChartBaliDirawat.destroy();
            }

            var label = {!! json_encode($dirawatDateBaliDiff) !!}
            var data = {!! json_encode($dataDirawatBaliDiff) !!}

            window.ordersChartBaliDirawat = new Chart(ctxBaliDirawat, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartBaliDirawat.update();
        });
            $chartBaliDirawat.data('chartBaliDirawat', ordersChartBaliDirawat);
            
        }

        // Init chart
        if ($chartBaliDirawat.length) {
            initChart($chartBaliDirawat);
        }
        })();
    </script>

    <script>
        var OrdersChartNegara = (function() {

        var $chartNegara = $('#chart-orderss-negara');
        var $ordersSelectNegara = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartNegara) {

            // Create chart
            var ctxNegara = document.getElementById('chart-orderss-negara').getContext('2d');

            window.ordersChartNegara = new Chart(ctxNegara, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($positifDateNegara) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataPositifNegara) !!}
                    }]
                }
            });
           
                // Save to jQuery object
            function removeData(chartNegara) {
                chartNegara.destroy();
            }

            function addData(chartNegara, label, data) {
                
            }
        $("#btn1Negara").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartNegara && window.ordersChartNegara !== null){
                window.ordersChartNegara.destroy();
            }

            var label = {!! json_encode($positifDateNegara) !!}
            var data = {!! json_encode($dataPositifNegara) !!}

            window.ordersChartNegara = new Chart(ctxNegara, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartNegara.update();
        });
        $("#btn2Negara").on("click", function() {

            if(window.ordersChartNegara && window.ordersChartNegara !== null){
                window.ordersChartNegara.destroy();
            }

            var label = {!! json_encode($positifDateNegaraDiff) !!}
            var data = {!! json_encode($dataPositifNegaraDiff) !!}

            window.ordersChartNegara = new Chart(ctxNegara, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartNegara.update();
        });
            $chartNegara.data('chartNegara', ordersChartNegara);
            
        }
        
        // Init chart
        if ($chartNegara.length) {
            initChart($chartNegara);
        }
        })();

    </script>

    <script>
        var OrdersChartNegaraSembuh = (function() {

        var $chartNegaraSembuh = $('#chart-orderss-negara-sembuh');
        var $ordersSelectNegaraSembuh = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartNegaraSembuh) {

            // Create chart
            var ctxNegaraSembuh = document.getElementById('chart-orderss-negara-sembuh').getContext('2d');

            window.ordersChartNegaraSembuh = new Chart(ctxNegaraSembuh, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($sembuhDateNegara) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataSembuhNegara) !!}
                    }]
                }
            });
           
                // Save to jQuery object
            function removeData(chartNegaraSembuh) {
                chartNegaraSembuh.destroy();
            }

            function addData(chartNegaraSembuh, label, data) {
                
            }
        $("#btn1NegaraSembuh").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartNegaraSembuh && window.ordersChartNegaraSembuh !== null){
                window.ordersChartNegaraSembuh.destroy();
            }

            var label = {!! json_encode($sembuhDateNegara) !!}
            var data = {!! json_encode($dataSembuhNegara) !!}

            window.ordersChartNegaraSembuh = new Chart(ctxNegaraSembuh, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartNegaraSembuh.update();
        });
        $("#btn2NegaraSembuh").on("click", function() {

            if(window.ordersChartNegaraSembuh && window.ordersChartNegaraSembuh !== null){
                window.ordersChartNegaraSembuh.destroy();
            }

            var label = {!! json_encode($sembuhDateNegaraDiff) !!}
            var data = {!! json_encode($dataSembuhNegaraDiff) !!}

            window.ordersChartNegaraSembuh = new Chart(ctxNegaraSembuh, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartNegaraSembuh.update();
        });
            $chartNegaraSembuh.data('chartNegaraSembuh', ordersChartNegaraSembuh);
            
        }
        
        // Init chart
        if ($chartNegaraSembuh.length) {
            initChart($chartNegaraSembuh);
        }
        })();

    </script>

    <script>
        var OrdersChartNegaraMeninggal = (function() {

        var $chartNegaraMeninggal = $('#chart-orderss-negara-meninggal');
        var $ordersSelectNegaraMeninggal = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartNegaraMeninggal) {

            // Create chart
            var ctxNegaraMeninggal = document.getElementById('chart-orderss-negara-meninggal').getContext('2d');

            window.ordersChartNegaraMeninggal = new Chart(ctxNegaraMeninggal, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($meninggalDateNegara) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataMeninggalNegara) !!}
                    }]
                }
            });
           
                // Save to jQuery object
            function removeData(chartNegaraMeninggal) {
                chartNegaraMeninggal.destroy();
            }

            function addData(chartNegaraMeninggal, label, data) {
                
            }
        $("#btn1NegaraMeninggal").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartNegaraMeninggal && window.ordersChartNegaraMeninggal !== null){
                window.ordersChartNegaraMeninggal.destroy();
            }

            var label = {!! json_encode($meninggalDateNegara) !!}
            var data = {!! json_encode($dataMeninggalNegara) !!}

            window.ordersChartNegaraMeninggal = new Chart(ctxNegaraMeninggal, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartNegaraMeninggal.update();
        });
        $("#btn2NegaraMeninggal").on("click", function() {

            if(window.ordersChartNegaraMeninggal && window.ordersChartNegaraMeninggal !== null){
                window.ordersChartNegaraMeninggal.destroy();
            }
            var label = {!! json_encode($meninggalDateNegaraDiff) !!}
            var data = {!! json_encode($dataMeninggalNegaraDiff) !!}

            window.ordersChartNegaraMeninggal = new Chart(ctxNegaraMeninggal, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartNegaraMeninggal.update();
        });
            $chartNegaraMeninggal.data('chartNegaraMeninggal', ordersChartNegaraMeninggal);
            
        }
        
        // Init chart
        if ($chartNegaraMeninggal.length) {
            initChart($chartNegaraMeninggal);
        }
        })();

    </script>

    <script>
        var OrdersChartNegaraDirawat = (function() {

        var $chartNegaraDirawat = $('#chart-orderss-negara-dirawat');
        var $ordersSelectNegaraDirawat = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartNegaraDirawat) {

            // Create chart
            var ctxNegaraDirawat = document.getElementById('chart-orderss-negara-dirawat').getContext('2d');

            window.ordersChartNegaraDirawat = new Chart(ctxNegaraDirawat, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($dirawatDateNegara) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataDirawatNegara) !!}
                    }]
                }
            });
           
                // Save to jQuery object
            function removeData(chartNegaraDirawat) {
                chartNegaraDirawat.destroy();
            }

            function addData(chartNegaraDirawat, label, data) {
                
            }
        $("#btn1NegaraDirawat").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartNegaraDirawat && window.ordersChartNegaraDirawat !== null){
                window.ordersChartNegaraDirawat.destroy();
            }

            var label = {!! json_encode($dirawatDateNegara) !!}
            var data = {!! json_encode($dataDirawatNegara) !!}

            window.ordersChartNegaraDirawat = new Chart(ctxNegaraDirawat, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartNegaraDirawat.update();
        });
        $("#btn2NegaraDirawat").on("click", function() {

            if(window.ordersChartNegaraDirawat && window.ordersChartNegaraDirawat !== null){
                window.ordersChartNegaraDirawat.destroy();
            }

            var label = {!! json_encode($dirawatDateNegaraDiff) !!}
            var data = {!! json_encode($dataDirawatNegaraDiff) !!}

            window.ordersChartNegaraDirawat = new Chart(ctxNegaraDirawat, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartNegaraDirawat.update();
        });
            $chartNegaraDirawat.data('chartNegaraDirawat', ordersChartNegaraDirawat);
            
        }
        
        // Init chart
        if ($chartNegaraDirawat.length) {
            initChart($chartNegaraDirawat);
        }
        })();

    </script>

    <script>
        var OrdersChartProv = (function() {

        var $chartProv = $('#chart-orderss-prov');
        var $ordersSelectProv = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartProv) {

            // Create chart
            var ctxProv = document.getElementById('chart-orderss-prov').getContext('2d');

            window.ordersChartProv = new Chart(ctxProv, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($positifDateProv) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataPositifProv) !!}
                    }]
                }
            });
           
                // Save to jQuery object
            function removeData(chartProv) {
                chartProv.destroy();
            }

            function addData(chartProv, label, data) {
                
            }
        $("#btn1").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartProv && window.ordersChartProv !== null){
                window.ordersChartProv.destroy();
            }

            var label = {!! json_encode($positifDateProv) !!}
            var data = {!! json_encode($dataPositifProv) !!}

            window.ordersChartProv = new Chart(ctxProv, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartProv.update();
        });
        $("#btn2").on("click", function() {

            if(window.ordersChartProv && window.ordersChartProv !== null){
                window.ordersChartProv.destroy();
            }

            var label = {!! json_encode($positifDateProvDiff) !!}
            var data = {!! json_encode($dataPositifProvDiff) !!}

            window.ordersChartProv = new Chart(ctxProv, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartProv.update();
        });
            $chartProv.data('chartProv', ordersChartProv);
            
        }
        
        // Init chart
        if ($chartProv.length) {
            initChart($chartProv);
        }
        })();

    </script>

    <script>
        var OrdersChartProvSembuh = (function() {

        var $chartProvSembuh = $('#chart-orderss-prov-sembuh');
        var $ordersSelectProvSembuh = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartProvSembuh) {

            // Create chart
            var ctxProvSembuh = document.getElementById('chart-orderss-prov-sembuh').getContext('2d');

            window.ordersChartProvSembuh = new Chart(ctxProvSembuh, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($sembuhDateProv) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataSembuhProv) !!}
                    }]
                }
            });
           
                // Save to jQuery object
            function removeData(chartProvSembuh) {
                chartProvSembuh.destroy();
            }

            function addData(chartProvSembuh, label, data) {
                
            }
        $("#btn1Sembuh").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartProvSembuh && window.ordersChartProvSembuh !== null){
                window.ordersChartProvSembuh.destroy();
            }

            var label = {!! json_encode($sembuhDateProv) !!}
            var data = {!! json_encode($dataSembuhProv) !!}

            window.ordersChartProvSembuh = new Chart(ctxProvSembuh, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartProvSembuh.update();
        });
        $("#btn2Sembuh").on("click", function() {

            if(window.ordersChartProvSembuh && window.ordersChartProvSembuh !== null){
                window.ordersChartProvSembuh.destroy();
            }

            var label = {!! json_encode($sembuhDateProvDiff) !!}
            var data = {!! json_encode($dataSembuhProvDiff) !!}

            window.ordersChartProvSembuh = new Chart(ctxProvSembuh, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartProvSembuh.update();
        });
            $chartProvSembuh.data('chartProvSembuh', ordersChartProvSembuh);
            
        }
        
        // Init chart
        if ($chartProvSembuh.length) {
            initChart($chartProvSembuh);
        }
        })();

    </script>

    <script>
        var OrdersChartProvMeninggal = (function() {

        var $chartProvMeninggal = $('#chart-orderss-prov-meninggal');
        var $ordersSelectProvMeninggal = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartProvMeninggal) {

            // Create chart
            var ctxProvMeninggal = document.getElementById('chart-orderss-prov-meninggal').getContext('2d');

            window.ordersChartProvMeninggal = new Chart(ctxProvMeninggal, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($meninggalDateProv) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataMeninggalProv) !!}
                    }]
                }
            });
           
                // Save to jQuery object
            function removeData(chartProvMeninggal) {
                chartProvMeninggal.destroy();
            }

            function addData(chartProvMeninggal, label, data) {
                
            }
        $("#btn1Meninggal").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartProvMeninggal && window.ordersChartProvMeninggal !== null){
                window.ordersChartProvMeninggal.destroy();
            }

            var label = {!! json_encode($meninggalDateProv) !!}
            var data = {!! json_encode($dataMeninggalProv) !!}

            window.ordersChartProvMeninggal = new Chart(ctxProvMeninggal, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartProvMeninggal.update();
        });
        $("#btn2Meninggal").on("click", function() {

            if(window.ordersChartProvMeninggal && window.ordersChartProvMeninggal !== null){
                window.ordersChartProvMeninggal.destroy();
            }

            var label = {!! json_encode($meninggalDateProvDiff) !!}
            var data = {!! json_encode($dataMeninggalProvDiff) !!}

            window.ordersChartProvMeninggal = new Chart(ctxProvMeninggal, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartProvMeninggal.update();
        });
            $chartProvMeninggal.data('chartProvMeninggal', ordersChartProvMeninggal);
            
        }
        
        // Init chart
        if ($chartProvMeninggal.length) {
            initChart($chartProvMeninggal);
        }
        })();

    </script>

    <script>
        var OrdersChartProvDirawat = (function() {

        var $chartProvDirawat = $('#chart-orderss-prov-dirawat');
        var $ordersSelectProvDirawat = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chartProvDirawat) {

            // Create chart
            var ctxProvDirawat = document.getElementById('chart-orderss-prov-dirawat').getContext('2d');

            window.ordersChartProvDirawat = new Chart(ctxProvDirawat, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }
                                    
                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: {!! json_encode($dirawatDateProv) !!},
                    datasets: [{
                        label: 'performance',
                        data: {!! json_encode($dataDirawatProv) !!}
                    }]
                }
            });
           
                // Save to jQuery object
            function removeData(chartProvDirawat) {
                chartProvDirawat.destroy();
            }

            function addData(chartProvDirawat, label, data) {
                
            }
        $("#btn1Dirawat").on("click", function() {
            // var chart = ordersChart
            // var label = {!! json_encode($positifDateProv) !!}
            // var data = {!! json_encode($dataPositifProv) !!}

            // chart.data.labels.pop();
            // chart.data.datasets.forEach((dataset) => {
            //     dataset.data.pop();
            // });
            // chart.update();

            if(window.ordersChartProvDirawat && window.ordersChartProvDirawat !== null){
                window.ordersChartProvDirawat.destroy();
            }

            var label = {!! json_encode($dirawatDateProv) !!}
            var data = {!! json_encode($dataDirawatProv) !!}

            window.ordersChartProvDirawat = new Chart(ctxProvDirawat, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartProvDirawat.update();
        });
        $("#btn2Dirawat").on("click", function() {

            if(window.ordersChartProvDirawat && window.ordersChartProvDirawat !== null){
                window.ordersChartProvDirawat.destroy();
            }

            var label = {!! json_encode($dirawatDateProvDiff) !!}
            var data = {!! json_encode($dataDirawatProvDiff) !!}

            window.ordersChartProvDirawat = new Chart(ctxProvDirawat, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    // if (!(value % 10)) {
                                    //     //return '$' + value + 'k'
                                    //     return value
                                    // }

                                    if(parseInt(value) >= 1000){
                                        return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    }else if(value == 0){
                                        return value = "0";
                                    } else{
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                // var label = data.datasets[item.datasetIndex].label || '';
                                // var yLabel = item.yLabel;
                                // var content = '';

                                // if (data.datasets.length > 1) {
                                //     content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                // }

                                // content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                // return content;

                                var value = data.datasets[item.datasetIndex].data[item.index];

                                if(parseInt(value) >= 1000){
                                    return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                }else if(value == 0){
                                    return value = "0";
                                } else{
                                    return value;
                                }
                            }
                        }
                    }
                },
                data: {
                    labels: label,
                    datasets: [{
                        label: 'performance',
                        data: data
                    }]
                }
            });
            ordersChartProvDirawat.update();
        });
            $chartProvDirawat.data('chartProvDirawat', ordersChartProvDirawat);
            
        }
        
        // Init chart
        if ($chartProvDirawat.length) {
            initChart($chartProvDirawat);
        }
        })();

    </script>

  
    <script>
        $(document).ready(function () {
            var t = $('#table_indo').DataTable({
                "lengthMenu": [[10, 20, 25, 50, 100, -1], [10, 20, 25, 50, 100, "All"]],
                language: {
                    paginate: {
                    next: '>', // or '→'
                    previous: '<' // or '←' 
                    }
                },
                "aaSorting": [],
                columnDefs: [{
                    orderable: false,
                    targets: 0
                }]
            });
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
            var td= $('#table_dunia').DataTable({
                "lengthMenu": [[10, 20, 25, 50, 100, -1], [10, 20, 25, 50, 100, "All"]],
                language: {
                    paginate: {
                    next: '>', // or '→'
                    previous: '<' // or '←' 
                    }
                },
                "aaSorting": [],
                columnDefs: [{
                    orderable: false,
                    targets: 0
                }]

            });
            td.on( 'order.dt search.dt', function () {
                td.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
            var td= $('#table_summary').DataTable({
                "lengthMenu": [[10, 20, 25, 50, 100, -1], [10, 20, 25, 50, 100, "All"]],
                language: {
                    paginate: {
                    next: '>', // or '→'
                    previous: '<' // or '←' 
                    }
                },
                "aaSorting": [],
                columnDefs: [{
                    orderable: false,
                    targets: 0
                }]

            });
            td.on( 'order.dt search.dt', function () {
                td.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>


@endpush
