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
                                    <h6><span class="h2 font-weight-bold text-white mb-0 ">{{ $persenSembuhGlobal}}% </span></h6>
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
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ $persenMeninggalGlobal}}% </span></h6>
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
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ $persenDirawatGlobal}}% </span></h6>
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
    
    <div class="container-fluid mt--7 ">
            <div class="col-xl-14 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Statistik Positif COVID-19 Dunia</h2>
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
            <hr>

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
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ $persenSembuh }}% </span></h6>
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
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ $persenMeninggal }}% </span></h6>
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
                                    <h6><span class="h2 font-weight-bold text-white mb-0">{{ $persenDirawat }}% </span></h6>
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
            <div class="col-xl-14 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Statistik Positif COVID-19 Indonesia</h2>
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
            <div class="col-xl-14 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Statistik Positif COVID-19 Bali</h2>
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
            <hr>

            <div class="shadow alert alert-white text-muted" role="alert">
                <h2><b>Rekapitulasi Data Penyebaran COVID-19 Provinsi di Indonesia</b></h2>
             </div>

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
            <div class="col-xl-14 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="row align-items-right">
                                <div class="col-xl-10">
                                    <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                    <h2 class="text-white mb-0">Statistik Positif COVID-19 Provinsi di Indonesia</h2>
                                </div>
                              
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
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orderss-prov" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-xl-6 mb-5">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Data COVID-19 Dunia</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" style="height:350px;overflow:auto;">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Negara</th>
                                        <th scope="col">Positif</th>
                                        <th scope="col">Sembuh</th>
                                        <th scope="col">Meninggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 1; $i <= sizeof($global); $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $global[$i-1]->OBJECTID }}</td>
                                            <td>{{ $global[$i-1]->Confirmed }}</td>
                                            <td>{{ $global[$i-1]->Recovered }}</td>
                                            <td>{{ $global[$i-1]->Deaths }}</td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 mb-5 mb-xl-0">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">Data COVID-19 Indonesia</h3>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive" style="height:350px;overflow:auto;">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Provinsi</th>
                                        <th scope="col">Positif</th>
                                        <th scope="col">Sembuh</th>
                                        <th scope="col">Meninggal1</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i = 1; $i <= sizeof($provinsi); $i++)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $provinsi[$i-1]->FID }}</td>
                                            <td>{{ $provinsi[$i-1]->Kasus_Posi }}</td>
                                            <td>{{ $provinsi[$i-1]->Kasus_Semb }}</td>
                                            <td>{{ $provinsi[$i-1]->Kasus_Meni }}</td>
                                        </tr>
                                    @endfor
                                </tbody>
                            </table>
                        </div>
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
                                    if (!(value % 10)) {
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                var label = data.datasets[item.datasetIndex].label || '';
                                var yLabel = item.yLabel;
                                var content = '';

                                if (data.datasets.length > 1) {
                                    content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                }

                                content += yLabel ;
                                return content;
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
                                    if (!(value % 10)) {
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                var label = data.datasets[item.datasetIndex].label || '';
                                var yLabel = item.yLabel;
                                var content = '';

                                if (data.datasets.length > 1) {
                                    content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                }

                                content += yLabel ;
                                return content;
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
                                    if (!(value % 10)) {
                                        return value;
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                var label = data.datasets[item.datasetIndex].label || '';
                                var yLabel = item.yLabel;
                                var content = '';

                                if (data.datasets.length > 1) {
                                    content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                }

                                content += yLabel ;
                                return content;
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
            
            var SalesChart = (function() {
    
            // Variables
    
            var $chart = $('#chart-saless-prov');
    
    
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
                                        if (!(value % 10)) {
                                            return value;
                                        }
                                    }
                                }
                            }]
                        },
                        tooltips: {
                            callbacks: {
                                label: function(item, data) {
                                    var label = data.datasets[item.datasetIndex].label || '';
                                    var yLabel = item.yLabel;
                                    var content = '';
    
                                    if (data.datasets.length > 1) {
                                        content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                    }
    
                                    content += yLabel ;
                                    return content;
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
    
                $chart.data('chart', salesChart);
    
            };
    
    
            // Events
    
            if ($chart.length) {
                init($chart);
            }
    
            })();
        </script>

    <script>
        var OrdersChart = (function() {

        var $chart = $('#chart-orderss');
        var $ordersSelect = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chart) {

            // Create chart
            var ordersChart = new Chart($chart, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    if (!(value % 10)) {
                                        //return '$' + value + 'k'
                                        return value
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                var label = data.datasets[item.datasetIndex].label || '';
                                var yLabel = item.yLabel;
                                var content = '';

                                if (data.datasets.length > 1) {
                                    content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                }

                                content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                return content;
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
            $chart.data('chart', ordersChart);
        }


        // Init chart
        if ($chart.length) {
            initChart($chart);
        }

        })();
    </script>

    <script>
        var OrdersChart = (function() {

        var $chart = $('#chart-orderss-global');
        var $ordersSelect = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chart) {

            // Create chart
            var ordersChart = new Chart($chart, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    if (!(value % 10)) {
                                        //return '$' + value + 'k'
                                        return value
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                var label = data.datasets[item.datasetIndex].label || '';
                                var yLabel = item.yLabel;
                                var content = '';

                                if (data.datasets.length > 1) {
                                    content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                }

                                content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                return content;
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
            $chart.data('chart', ordersChart);
        }


        // Init chart
        if ($chart.length) {
            initChart($chart);
        }

        })();
    </script>

<script>
        var OrdersChart = (function() {

        var $chart = $('#chart-orderss-bali');
        var $ordersSelect = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chart) {

            // Create chart
            var ordersChart = new Chart($chart, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    if (!(value % 10)) {
                                        //return '$' + value + 'k'
                                        return value
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                var label = data.datasets[item.datasetIndex].label || '';
                                var yLabel = item.yLabel;
                                var content = '';

                                if (data.datasets.length > 1) {
                                    content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                }

                                content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                return content;
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
            $chart.data('chart', ordersChart);
        }


        // Init chart
        if ($chart.length) {
            initChart($chart);
        }

        })();
    </script>
    
    <script>
        var OrdersChart = (function() {

        var $chart = $('#chart-orderss-prov');
        var $ordersSelect = $('[name="ordersSelect"]');


        //
        // Methods
        //

        // Init chart
        function initChart($chart) {

            // Create chart
            var ordersChart = new Chart($chart, {
                type: 'bar',
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                callback: function(value) {
                                    if (!(value % 10)) {
                                        //return '$' + value + 'k'
                                        return value
                                    }
                                }
                            }
                        }]
                    },
                    tooltips: {
                        callbacks: {
                            label: function(item, data) {
                                var label = data.datasets[item.datasetIndex].label || '';
                                var yLabel = item.yLabel;
                                var content = '';

                                if (data.datasets.length > 1) {
                                    content += '<span class="popover-body-label mr-auto">' + label + '</span>';
                                }

                                content += '<span class="popover-body-value">' + yLabel + '</span>';
                                
                                return content;
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
            $chart.data('chart', ordersChart);
        }


        // Init chart
        if ($chart.length) {
            initChart($chart);
        }

        })();
    </script>

@endpush
