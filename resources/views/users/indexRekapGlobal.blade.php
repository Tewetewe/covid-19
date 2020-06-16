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
                        <div class="col-10">
                            <h2 class="mb-0">Rekapitulasi Data Dunia</h2>
                            
                        </div>
                        <div class="col-10 text-left">
                            <a href="/RekapGlobalData/export" class="btn btn-success my-3" target="_blank">Export Excel</a>
                        </div>
                        <!-- Import Excel -->
                            {{-- <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form method="post" action="/RekapGlobalData/import_excel" enctype="multipart/form-data">
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

                
                
                <div class="col-12">
                </div>

                <div class="table-responsive" style="height:500px;overflow:auto;">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Positif</th>
                                <th scope="col">Sembuh</th>
                                <th scope="col">Meninggal</th>
                                <th scope="col">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= sizeof($rekapGlobalData); $i++)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{ $rekapGlobalData[$i-1]->positif}}</td>
                                    <td>{{ $rekapGlobalData[$i-1]->sembuh}}</td>
                                    <td>{{ $rekapGlobalData[$i-1]->meninggal}}</td>
                                    <td>{{ $rekapGlobalData[$i-1]->created_at}}</td>
                                    
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