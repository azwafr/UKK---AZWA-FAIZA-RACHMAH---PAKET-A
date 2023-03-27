@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">
                    DASHBOARD <br>
                    <p class="title-dashboard">
                        PENGADUAN MASYARAKAT SMK Wikrama Bogor</p>
                </h3>
                <br>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <div class="card border-primary">
            <div class="card-body">
                <div class="media">
                    <div class="media-body my-auto">
                        <h4 class="font-weight-bolder mb-0" id="lblTotalRDN">{{ $petugas }}</h4>
                        <p class="card-text font-small-3 mb-0">Petugas</p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <div class="card border-info">
            <div class="card-body">
                <div class="media">
                    <div class="media-body my-auto">
                        <h4 class="font-weight-bolder mb-0" id="lblTotalRDN">{{ $masyarakat }}</h4>
                        <p class="card-text font-small-3 mb-0">Masyarakat</p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
        <div class="card border-info">
            <div class="card-body">
                <div class="media">
                    <div class="media-body my-auto">
                        <h4 class="font-weight-bolder mb-0" id="lblTotalRDN">{{ $selesai }}</h4>
                        <p class="card-text font-small-3 mb-0">Pengaduan Sukses</p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 col-12">
        <div class="card border-danger">
            <div class="card-body">
                <div class="media">
                    <div class="media-body my-auto">
                        <h4 class="font-weight-bolder mb-0" id="lblTotalRDNAno">{{ $pending }}</h4>
                        <p class="card-text font-small-3 mb-0">Pengaduan Pending</p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection