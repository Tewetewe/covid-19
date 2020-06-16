@extends('layouts.app')

@section('content')

<div class="header body pb-1 pt-3 pt-md-5 " >
<div class="container-fluid">
        <!-- Card stats -->
</div>
</div>
<div class="container-fluid mt-0">
    <div class="row">
        <div class="col mb-5">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h2 class="mb-0">Data Harian Provinsi di Indonesia</h2>
                        </div>
                       
                        <!-- Import Excel -->
                            {{-- <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="post" action="/ProvinsiData/import_excel" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
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
                            </div> --}}
                    </div>
                </div>
                       <!-- Form Cari Data Dunia -->
                       <div class="p-4 bg-secondary">
                            <form action="/ProvinsiData/filter" method="GET">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Nama Provinsi (Kosongkan untuk mendapat data seluruh provinsi)</label>
                                    <select class="form-control" id="drop" name="nama">
                                        <option value="">Pilih Provinsi</option>
                                            @foreach ($namaProvinsi as $item)
                                                <option value="{{$item->FID}}">{{ucfirst($item->FID)}}</option>      
                                            @endforeach
                                        </select>
                                </div>
                                <div class="input-daterange datepicker row align-items-center">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Start Date (Maksimal input dimulai dari 2 Maret 2020)</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control datepicker" placeholder="Start date" type="text" name="startDate" value="06/02/2020">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">End Date (Maksimal input tanggal hari ini )</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control datepicker" placeholder="End date" type="text" name="endDate" value="06/04/2020">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-outline-success" value="Cari Data">
                                <a href="/ProvinsiData/export" class="btn btn-success my-3" target="_blank">Export Excel</a>

                            </form>
                        </div>

                 
 
                    <div class="table-responsive" style="padding-right: 25px;padding-left: 25px;">
                        <!-- Projects table -->
                        <table id="table_import" class="table align-items-center table-flush" cellspacing="0" width="100%">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">Kasus Positif</th>
                                <th scope="col">Kasus Sembuh</th>
                                <th scope="col">Kasus Meninggal</th>
                                <th scope="col">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= sizeof($provinsiData); $i++)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{ $provinsiData[$i-1]->FID}}</td>
                                    <td>{{ $provinsiData[$i-1]->Kasus_Posi}}</td>
                                    <td>{{ $provinsiData[$i-1]->Kasus_Semb}}</td>
                                    <td>{{ $provinsiData[$i-1]->Kasus_Meni}}</td>
                                    <td>{{ $provinsiData[$i-1]->created_at}}</td>
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
    @include('layouts.footers.auth')
</div>
        
@endsection
<style>
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
    <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- MDBootstrap Datatables  -->
    <script type="text/javascript" src="{{ asset('argon') }}/js/addons/datatables.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            $('.datepicker').datepicker({

            });
        });
    </script>

    <script>
        $(document).ready(function () {
        $('#table_import').DataTable({
            language: {
                paginate: {
                next: '>', // or '→'
                previous: '<' // or '←' 
                }
            }
        });
        $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endpush

