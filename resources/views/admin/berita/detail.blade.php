@extends('layouts.admin', ['title' => 'Detail Berita'])
@section('content')
<div class="card card-info card-outline">
    <div class="card-header">
    <h3 class="card-title">Data Berita</h3>
    <a href="/admin/berita/" class="btn btn-primary float-right">Back</a>
    </div>
    <div class="card-body p-10 mt-10">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Judul :</strong>
                {{ $berita->judul }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Detail Berita :</strong>
                {{ $berita->detail }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <img src="/gambar_berita/{{ $berita->gambar_berita }}" width="500px">
            </div>
        </div>
    </div>
</div>
@endsection