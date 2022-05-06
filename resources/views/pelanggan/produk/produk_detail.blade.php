@extends('pelanggan.layouts.master')
@section('slider')
@endsection
@section('content')
<div class="container">
    <div class="container">
        <div class="container">
           <div class="row mb-2">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card gambar-product">
                <div class="card-body">
                    <img src="/foto_produk/{{ $produk_detail->foto_produk }}" class="img-fluid">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>
                <strong>{{ $produk_detail->nama_produk }}</strong>
            </h2>
            <h4>
                Rp. {{ number_format($produk_detail->harga) }}
            </h4>
            <h5>
                {{ $produk_detail->detail_produk }}
            </h5>
            <div class="row">
                <div class="col">
                    <a class="btn btn-dark btn-block" href="{{route('pemesanan.index', $produk_detail->id_produk)}}">Buat Pesanan</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    
@endsection