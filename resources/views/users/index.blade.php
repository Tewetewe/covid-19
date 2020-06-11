<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Kawal COVID-19</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/kawal-covid-19.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">

<!-- <style> 
.body {
    background-image: url("{{ asset('argon') }}/img/brand/12.png");
    
}
</style> -->
</head>
<body class="clickup-chrome-ext_installed">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>




<nav class="navbar navbar-horizontal fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="shadow container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/covid-19.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/user.png">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a href=href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    {{-- <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Settings</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Activity</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>Support</span>
                    </a> --}}
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a  href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/covid-19.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <!-- <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div> -->
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav fixed-right">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('home') }}" style="color: #565656;">
                        <i class="ni ni-tv-2 " style="color: #565656;"></i> Dashboard
                    </a>
                </li>
                
                <!-- <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-mobile-button" style="color: #565656;"></i>
                        <span class="nav-link-text" style="color: #565656;">Hotline</span>
                    </a>

                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                        </ul>
                    </div>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.edit') }}">
                            {{ __('User profile') }}
                    </a>
                </li> -->
                @if( auth()->user()->role == "admin" )
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}" style="color: #565656;">
                        <i class="ni ni-single-copy-04" style="color: #565656;"></i>
                             {{ __('Import XLS Bali') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('provinsi') }}" style="color: #565656;">
                        <i class="ni ni-book-bookmark" style="color: #565656;"></i>
                             {{ __('Data Provinsi') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rekapIndo') }}" style="color: #565656;">
                        <i class="ni ni-chart-bar-32" style="color: #565656;"></i>
                             {{ __('Rekap Indo') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('globalData') }}" style="color: #565656;">
                        <i class="ni ni-book-bookmark" style="color: #565656;"></i>
                             {{ __('Data Global') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rekapGlobal') }}" style="color: #565656;">
                        <i class="ni ni-chart-bar-32" style="color: #565656;"></i>
                             {{ __('Rekap Global') }}
                    </a>
                </li>
                @endif
                @if( auth()->user()->role == "superadmin" )
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('loadData') }}" style="color: #565656;">
                        <i class="ni ni-circle-08" style="color: #565656;"></i>
                             {{ __('Load Data') }}
                    </a>
                </li>
                @endif
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('provinsi') }}" style="color: #565656;">
                        <i class="ni ni-circle-08" style="color: #565656;"></i>
                             {{ __('Import XLS Province') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rekapGlobal') }}" style="color: #565656;">
                        <i class="ni ni-circle-08" style="color: #565656;"></i>
                             {{ __('Import XLS Rekap Global') }}
                    </a>
                </li> --}}

                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-planet text-blue"></i> Icons
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-pin-3 text-orange"></i> Maps
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-key-25 text-info"></i> Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-circle-08 text-pink"></i> Register
                    </a>
                </li> -->

                <!-- <li class="nav-item">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold">Admin Admin</span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>My profile</span>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Settings</span>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="ni ni-calendar-grid-58"></i>
                                    <span>Activity</span>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="ni ni-support-16"></i>
                                    <span>Support</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                </li> -->



            </ul>
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->

            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
            <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/user.png">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                            </div>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>{{ __('My profile') }}</span>
                            </a>
                            {{-- <a href="#" class="dropdown-item">
                                <i class="ni ni-settings-gear-65"></i>
                                <span>{{ __('Settings') }}</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ni ni-calendar-grid-58"></i>
                                <span>{{ __('Activity') }}</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ni ni-support-16"></i>
                                <span>{{ __('Support') }}</span>
                            </a> --}}
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <i class="ni ni-user-run"></i>
                                <span>{{ __('Logout') }}</span>
                            </a>
                        </div>
                    </li>
                </ul>
            </ul>
        </div>
    </div>
</nav>   



<div class="main-content">
        <!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
<div class="container-fluid">
    <!-- Brand -->
  
    <!-- Form -->
    <!-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
        <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input class="form-control" placeholder="Search" type="text">
            </div>
        </div>
    </form> -->
    <!-- User -->
    <!-- <ul class="navbar-nav align-items-center d-none d-md-flex">
        <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                    <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg">
                    </span>
                    <div class="media-body ml-2 d-none d-lg-block">
                        <span class="mb-0 text-sm  font-weight-bold">Admin Admin</span>
                    </div>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <i class="ni ni-single-02"></i>
                    <span>My profile</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-settings-gear-65"></i>
                    <span>Settings</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-calendar-grid-58"></i>
                    <span>Activity</span>
                </a>
                <a href="#" class="dropdown-item">
                    <i class="ni ni-support-16"></i>
                    <span>Support</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="ni ni-user-run"></i>
                    <span>Logout</span>
                </a>
            </div>
        </li>
    </ul> -->
</div>
</nav>   

<div class="header body pb-1 pt-3 pt-md-5 " >
<div class="container-fluid">
        <!-- Card stats -->
</div>
</div>
<div class="container-fluid mt-0">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h2 class="mb-3">Rekapitulasi Data Provinsi Bali</h2>
                        </div>
                        <div class="col-4 text-left">
                           
                        </div>
                        <div class="col-12 text-left">
                            <a href="/BaliData/export" class="btn btn-outline-success" target="_blank">Export Excel</a>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importExcel">
                                Import Data
                            </button>
                        </div>
                        <!-- Import Excel -->
                            <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="post" action="/BaliData/import_excel" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"  id="exampleModalLabel">Import Excel</h5>
                                            </div>
                                            <div class="modal-body">
                                                {{ csrf_field() }}
                    
                                                <label>Pilih file excel</label>
                                                <div class="form-group">
                                                    <input type="file" name="file" required="required" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                                </div>
                    
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Import</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>

                
                
                <div class="col-12">
                </div>

                <div class="table-responsive" style="height:500px;overflow:auto;">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Tanggal Import</th>
                                <th scope="col">Resiko</th>
                                <th scope="col">Paparan</th>
                                <th scope="col">Bantu</th>
                                <th scope="col">No Baru</th>
                                <th scope="col">No Kemarin</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">status</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Penularan</th>
                                <th scope="col">Negara</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Umur</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Desa</th>
                                <th scope="col">Kecamatan</th>
                                <th scope="col">Kabupaten</th>
                                <th scope="col">Faskes</th>
                                <th scope="col">ket</th>
                                <th scope="col">Kondisi</th>
                                <th scope="col">Kelompok Umur</th>
                                <th scope="col">Kategori Kasus</th>
                                <th scope="col">Hubungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= sizeof($baliData); $i++)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{ $baliData[$i-1]->Tanggal_Import}}</td>
                                    <td>{{ $baliData[$i-1]->Resiko}}</td>
                                    <td>{{ $baliData[$i-1]->Paparan}}</td>
                                    <td>{{ $baliData[$i-1]->Bantu}}</td>
                                    <td>{{ $baliData[$i-1]->No_Baru}}</td>
                                    <td>{{ $baliData[$i-1]->No_kemarin}}</td>
                                    <td>{{ $baliData[$i-1]->Tanggal}}</td>
                                    <td>{{ $baliData[$i-1]->Status}}</td>
                                    <td>{{ $baliData[$i-1]->Nama}}</td>
                                    <td>{{ $baliData[$i-1]->Penularan}}</td>
                                    <td>{{ $baliData[$i-1]->Negara}}</td>
                                    <td>{{ $baliData[$i-1]->Jenis_Kelamin}}</td>
                                    <td>{{ $baliData[$i-1]->Umur}}</td>
                                    <td>{{ $baliData[$i-1]->Alamat}}</td>
                                    <td>{{ $baliData[$i-1]->Desa}}</td>
                                    <td>{{ $baliData[$i-1]->Kecamatan}}</td>
                                    <td>{{ $baliData[$i-1]->Kabupaten}}</td>
                                    <td>{{ $baliData[$i-1]->Faskes}}</td>
                                    <td>{{ $baliData[$i-1]->Keterangan}}</td>
                                    <td>{{ $baliData[$i-1]->Kondisi}}</td>
                                    <td>{{ $baliData[$i-1]->Kelompok_Umur}}</td>
                                    <td>{{ $baliData[$i-1]->Kategori_Kasus}}</td>
                                    <td>{{ $baliData[$i-1]->Hubungan}}</td>
                                    <!-- <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                                                        <a class="dropdown-item" href="">Edit</a>
                                                                                                </div>
                                        </div>
                                    </td> -->
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-0">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
        
    <footer class="footer">
<div class="row align-items-center justify-content-xl-between">
<div class="col-xl-6">
    <div class="copyright text-center text-xl-left text-muted">
        © 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a> &amp;
        <a href="https://www.updivision.com" class="font-weight-bold ml-1" target="_blank">Updivision</a>
    </div>
</div>
<div class="col-xl-6">
    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
        <li class="nav-item">
            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
        </li>
        <li class="nav-item">
            <a href="https://www.updivision.com" class="nav-link" target="_blank">Updivision</a>
        </li>
        <li class="nav-item">
            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
        </li>
        <li class="nav-item">
            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
        </li>
        <li class="nav-item">
            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
        </li>
    </ul>
</div>
</div>
</footer>    
</div>
</div>

    
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
            
    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
</body></html>
