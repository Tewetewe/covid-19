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
                            <h2 class="mb-0">Rekapitulasi Data Indonesia</h2>
                          
                        </div>
                        <div class="col-10 text-left">
                            <a href="/RekapIndo/export" class="btn btn-success my-3" target="_blank">Export Excel</a>
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
                

                
                


                <div class="table-responsive" style="padding-right: 25px;padding-left: 25px;">
                    <!-- Projects table -->
                    <table id="table_import" class="table align-items-center table-flush table-striped" cellspacing="0" width="100%">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Kasus Positif</th>
                                <th scope="col">Kasus Sembuh</th>
                                <th scope="col">Kasus Meninggal</th>
                                <th scope="col">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 1; $i <= sizeof($rekapIndo); $i++)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td align="right">{{ $rekapIndo[$i-1]->positif}}</td>
                                    <td align="right">{{ $rekapIndo[$i-1]->sembuh}}</td>
                                    <td align="right">{{ $rekapIndo[$i-1]->meninggal}}</td>
                                    <td>{{ $rekapIndo[$i-1]->created_at}}</td>
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
    $('.dataTables_length').addClass('bs-select');
    });
</script>
    
@endpush