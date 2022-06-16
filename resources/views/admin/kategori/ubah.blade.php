@extends('layouts.admin', ['title' => 'Ubah Kategori'])

@section('content')
<div class="card card-info card-outline">
    <div class="card-header">
    <h3 class="card-title">Data Kategori Pakaian</h3>
    </div>
    <div class="card-body">
        <form action="/admin/kategori/{{$kategori->id_kategori}}" method="POST" enctype="multipart/form-data"> 
            @csrf
            @method('PUT')
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" name="nama_kategori" id="nama_kategori" value="{{ $kategori->nama_kategori }}" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Nama_kategori">
            @error('nama_kategori')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="gambar_ukuran">File Gambar Ukuran</label>
            <input type="file" name="gambar_ukuran" id="gambar_ukuran" class="form-control @error('gambar_ukuran') is-invalid @enderror" placeholder="gambar_ukuran">
            @error('gambar_ukuran')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <img src="/gambar_ukuran/{{ $kategori->gambar_ukuran }}" width="300px">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="cancel" class="btn btn-default">Batal</button>
        </form>
    </div>
</div>
@endsection