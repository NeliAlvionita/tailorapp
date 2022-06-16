@extends('layouts.admin', ['title' => 'Ubah Data'])

@section('title', 'Ubah Data')

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Bahan</h3>
        </div>
         <div class="card-body">
            <form action="/admin/bahan/{{ $bahan->id_bahan }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_bahan">Nama Bahan</label>
                <input type="text" name="nama_bahan" id="nama_bahan" value="{{ $bahan->nama_bahan}}" class="form-control @error('nama_bahan') is-invalid @enderror" placeholder="Nama Bahan"
                aria-describedby="helpId">
                @error('nama_bahan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                 @enderror
            </div>
            <div class="form-group">
                <label for="ukuran">Ukuran </label>
                <input type="text" name="ukuran" id="ukuran" value="{{ $bahan->ukuran}}" class="form-control @error('ukuran') is-invalid @enderror" placeholder="Ukuran"
                aria-describedby="helpId">
                @error('ukuran')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="harga_tambah">Harga</label>
                <input type="text" name="harga_tambah" id="harga_tambah" value="{{ $bahan->harga_tambah}}" class="form-control @error('harga_tambah') is-invalid @enderror" placeholder="Harga (Rp.)"
                aria-describedby="helpId">
                @error('harga_tambah')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="cancel" class="btn btn-default">Batal</button>
            </form>
        </div>
    </div>                   
@endsection