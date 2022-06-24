@extends('layouts.admin', ['title' => 'Detail Produk'])
@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
        <h3 class="card-title">Detail Produk</h3>
        <a href="/admin/kategori/" class="btn btn-primary float-right">Back</a>
        </div>
        <div class="card-body p-10 mt-10">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kategori &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong>
                    {{ $produk->kategori->nama_kategori}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Produk &nbsp;&nbsp;&nbsp;:</strong>
                    {{ $produk->nama_produk}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Bahan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
                    {{ $produk->nama_bahan}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong>
                    Rp. {{ number_format($produk->harga)}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Berat (gr) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong>
                    {{ number_format($produk->berat_produk)}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail Deskripsi :</strong>
                    {{ $produk->detail_produk}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Foto Produk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong>
                </div>
                <img src="/foto_produk/{{ $produk->foto_produk }}" width="500px" style="box-shadow: 10px 10px 5px #ccc;">
            </div>
        </div>
    </div>
@endsection