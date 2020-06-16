@extends('layouts.app')

@section('content')

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
                            <h2 class="mb-0">Data Harian Seluruh Negara di Dunia</h2>
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
                    <form action="/GlobalData/filter" method="GET">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Nama Negara (Kosongkan untuk mendapat data seluruh negara)</label>
                            <select class="form-control" id="drop" name="nama">
                                <option value="">Pilih Negara</option>
                                    @foreach ($namaNegara as $item)
                                        <option value="{{$item->OBJECTID}}">{{ucfirst($item->OBJECTID)}}</option>      
                                    @endforeach
                            </select>
                        </div>
                        <div class="input-daterange datepicker row align-items-center">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Start Date (Maksimal input dimulai dari 21 Januari 2020)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                        </div>
                                        <input class="form-control datepicker" placeholder="Start date" type="text" name="startDate" value="01/21/2020">
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
                                        <input class="form-control datepicker" placeholder="End date" type="text" name="endDate" value="01/25/2020">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-outline-success" value="Cari Data">
                        <a href="/GlobalData/export" class="btn btn-success my-3" target="_blank">Export Excel</a>
                    </form>
                       
                </div>

         
            <!-- Form Cari Data Dunia -->
                


            <div class="table-responsive" style="padding-right: 25px;padding-left: 25px;">
                <!-- Projects table -->
                <table id="table_import" class="table align-items-center table-flush" cellspacing="0" width="100%">
                    <thead class="thead-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Negara</th>
                                <th scope="col">Positif</th>
                                <th scope="col">Sembuh</th>
                                <th scope="col">Meninggal</th>
                                <th scope="col">Provinsi</th>
                                <th scope="col">Kota</th>
                                <th scope="col">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= sizeof($globalData); $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $globalData[$i-1]->OBJECTID }}</td>
                                    <td>{{ $globalData[$i-1]->Confirmed }}</td>
                                    <td>{{ $globalData[$i-1]->Recovered }}</td>
                                    <td>{{ $globalData[$i-1]->Deaths }}</td>
                                    <td>{{ $globalData[$i-1]->Province }}</td>
                                    <td>{{ $globalData[$i-1]->City }}</td>
                                    <td>{{ $globalData[$i-1]->created_at }}</td>
                                </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
                {{-- <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div> --}}
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