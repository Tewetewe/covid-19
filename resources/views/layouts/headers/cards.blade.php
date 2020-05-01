<style> 
.body {
    background-image: url("{{ asset('argon') }}/img/brand/12.png");
    
}
</style>
<div class="header body pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Terkonfirmasi</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $positif }} Orang</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <img height="30" widht="30" src="{{ asset('argon') }}/img/brand/emoticon-sad.png" alt="...">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-warning mr-2"><i class="fa fa-arrow-up"></i> +{{ $diffPositif }}</span>
                                <span class="text-nowrap">Dari Kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Sembuh</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $sembuh }} Orang</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                        <img height="30" widht="30" src="{{ asset('argon') }}/img/brand/emoticon-happy.png" alt="...">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> +{{ $diffSembuh }} </span>
                                <span class="text-nowrap">Dari Kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Meninggal</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $meninggal }} Orang</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-black text-white rounded-circle shadow">
                                        <img height="30" widht="30" src="{{ asset('argon') }}/img/brand/emoticon-cry.png" alt="...">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-black mr-2"><i class="fa fa-arrow-up"></i> +{{ $diffMeninggal }}</span>
                                <span class="text-nowrap">Dari kemarin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Dunia</h5>
                                    <span class="h2 font-weight-bold mb-0"> Positif : {{ $positifGlobal }} Orang  <br> Sembuh : {{ $sembuhGlobal }} Orang <br> Meninggal : {{ $meninggalGlobal }} Orang</span>
                                    {{-- <p class="text-white mb-0"><b>10,118</b> POSITIF, <b>1,522</b> <br>SEMBUH, <b>792</b> MENINGGAL</p> --}}
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <img height="30" widht="30" src="{{ asset('argon') }}/img/brand/maps-and-flags.png" alt="...">
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-warning mr-2"><i class="fas fa-arrow-up"></i> +{{ $diffPositifGlobal }} </span>
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> +{{ $diffSembuhGlobal }}</span>
                                <span class="text-black mr-2"><i class="fas fa-arrow-up"></i> +{{ $diffMeninggalGlobal }}</span>
                                <span class="text-nowrap">Dari Kemarin</span>
                            </p>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>