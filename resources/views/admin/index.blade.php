@extends('layouts.admin')
@section('content')
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif
<div class="container-fluid"><br>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 texty-gray-800  text-uppercase mb-1">Dashboard {{ Auth::user()->level }}</h1>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-primary text-uppercase mb-1"> Data Pelanggan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$user}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300" style="color:#1E90FF;">
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-success text-uppercase mb-1"> Data Produk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $produk}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard fa-2x text-gray-300" style="color:#006400;">
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-warning text-uppercase mb-1"> Data Pemesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$pemesanan}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300" style="color:#FF8C00;">
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card-border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-uppercase mb-1" style="color:#FF1493;"> Data Transaksi</div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800"></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x" style="color:#FF1493;">
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection