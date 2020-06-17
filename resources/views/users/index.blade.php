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

                <div class="table-responsive" style="padding-right: 25px;padding-left: 25px;">
                    <table id="table_import" class="table align-items-center table-flush table-striped" cellspacing="0" width="100%">
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
    @include('layouts.footers.auth')
</div>
        
@endsection

@push('js')

<!-- MDBootstrap Datatables  -->
<script type="text/javascript" src="{{ asset('argon') }}/js/addons/datatables.min.js"></script>

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