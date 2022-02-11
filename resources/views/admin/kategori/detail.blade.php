@extends('layouts.admin', ['title' => 'Detail Kategori'])
@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
        <h3 class="card-title">Data Kategori Pakaian</h3>
        <a href="/admin/kategori/" class="btn btn-primary float-right">Back</a>
        </div>
        <div class="card-body p-0">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama :</strong>
                    {{ $kategori->nama_kategori }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail Ukuran {{$kategori->nama_kategori}} :</strong>
                </div>
                <img src="/gambar_ukuran/{{ $kategori->gambar_ukuran }}" width="500px">
            </div>
        </div>
    </div>
@endsection