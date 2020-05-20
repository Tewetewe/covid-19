@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-6 mb-5 mb-xl-4">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Statistik Positif COVID-19 Indonesia</h2>
                            </div>
                            {{-- <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                  <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-saless" data-update="#chart-saless-global">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Global</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                     <li class="nav-item" data-toggle="chart" data-target="#chart-saless" data-update="#chart-saless">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Indonesia</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-saless" class="chart-canvas"></canvas>
                        </div>
                    </div>
                    
                    {{-- <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-saless-global" class="chart-canvas"></canvas>
                        </div>
                    </div> --}}
                </div>
            </div>
            {{-- <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Total orders</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-xl-6 mb-5 mb-xl-2">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Statistik Positif COVID-19 Dunia</h2>
                            </div>
                            {{-- <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                  <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-saless" data-update="#chart-saless-global">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Global</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                     <li class="nav-item" data-toggle="chart" data-target="#chart-saless" data-update="#chart-saless">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Indonesia</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-saless" class="chart-canvas"></canvas>
                        </div>
                    </div> --}}
                    
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chart">
                                <!-- Chart wrapper -->
                                <canvas id="chart-saless-global" class="chart-canvas"></canvas>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-xl-12 mb-5 mb-xl-2">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Statistik Positif COVID-19 Bali</h2>
                            </div>
                            {{-- <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                  <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-saless" data-update="#chart-saless-global">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Global</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                     <li class="nav-item" data-toggle="chart" data-target="#chart-saless" data-update="#chart-saless">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Indonesia</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div> --}}
                        </div>
                    </div>
                    {{-- <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-saless" class="chart-canvas"></canvas>
                        </div>
                    </div> --}}
                    
                        <div class="card-body">
                            <!-- Chart -->
                            <div class="chart">
                                <!-- Chart wrapper -->
                                <canvas id="chart-saless-bali" class="chart-canvas"></canvas>
                            </div>
                        </div>
                </div>
            </div>
            {{-- <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Total orders</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row mt-5">
            <div class="col-xl-6 mb-5">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Data COVID-19 Dunia</h3>
                            </div>
                            {{-- <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div> --}}
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
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Kota</th>
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
                                        <td>{{ $global[$i-1]->Province }}</td>
                                        <td>{{ $global[$i-1]->City }}</td>
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
                            {{-- <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div> --}}
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
            <div class="col-xl-12 mt-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Data COVID-19 Bali</h3>
                            </div>
                            {{-- <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="table-responsive" style="height:350px;overflow:auto;">
                        <!-- Projects table -->
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
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

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
@endpush
