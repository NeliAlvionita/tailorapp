@extends('layouts.admin', ['title' => 'Ubah Berita'])

@section('title', 'Ubah Berita')

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Ubah Berita</h3>
        </div>
         <div class="card-body">
            <form action="/admin/berita/{{ $berita->id_berita }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Judul Berita</label>
                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Judul Berita"
                aria-describedby="helpId" value="{{$berita->judul}}">
                @error('judul')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="isi">Isi Berita</label>
                <input type="text" name="isi" id="isi" class="form-control @error('isi') is-invalid @enderror" placeholder="Isi Berita"
                aria-describedby="helpId" value="{{$berita->isi}}">
                @error('isi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="detail">Detail Berita</label>
                <input type="text" name="detail" id="detail" class="form-control @error('detail') is-invalid @enderror" placeholder="Detail Berita"
                aria-describedby="helpId" value="{{$berita->detail}}">
                @error('detail')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="gambar_berita">File Gambar Berita</label>
                <input type="file" name="gambar_berita" id="gambar_berita" class="form-control @error('gambar_berita') is-invalid @enderror">
                @error('gambar_berita')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <img src="/gambar_berita/{{ $berita->gambar_berita }}" width="300px">
            </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="cancel" class="btn btn-default">Batal</button>
            </form>
        </div>
    </div>                   
@endsection