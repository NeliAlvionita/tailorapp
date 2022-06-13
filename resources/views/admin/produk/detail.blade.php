@extends('layouts.admin', ['title' => 'Detail Produk'])
@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
        <h3 class="card-title">Detail Produk</h3>
        <a href="/admin/kategori/" class="btn btn-primary float-right">Back</a>
        </div>
        <div class="card-body p-0">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kategori :</strong>
                    {{ $produk->kategori->nama_kategori}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Produk :</strong>
                    {{ $produk->nama_produk}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Bahan :</strong>
                    {{ $produk->nama_bahan}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Harga :</strong>
                    Rp. {{ number_format($produk->harga)}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Berat (gr) :</strong>
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
                    <strong>Foto Produk :</strong>
                </div>
                <img src="/foto_produk/{{ $produk->foto_produk }}" width="500px">
            </div>
        </div>
    </div>
@endsection