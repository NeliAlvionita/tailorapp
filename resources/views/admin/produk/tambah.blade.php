@extends('layouts.admin', ['title' => 'Tambah Produk'])

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Tambah Produk</h3>
        </div>
         <div class="card-body">
            <form action="/admin/produk" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Kategori</label>
                <select name="id_kategori" id="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
                    @foreach ($listKategori as $kategori)
                    <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                    @endforeach
                </select>
                @error('id_kategori')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" id="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" placeholder="Nama Produk"
                aria-describedby="helpId">
                @error('nama_produk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_bahan">Nama Bahan</label>
                <select name="nama_bahan" id="nama_bahan" class="form-control @error('nama_bahan') is-invalid @enderror">
                    @foreach ($listBahan as $bahan)
                    <option value="{{$bahan->nama_bahan}}">{{$bahan->nama_bahan}}</option>
                    @endforeach 
                </select>
                @error('nama_bahan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="foto_produk">File Foto Produk</label>
                <input type="file" name="foto_produk" id="foto_produk" class="form-control @error('foto_produk') is-invalid @enderror">
                @error('foto_produk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="Harga (Rp.)"
                aria-describedby="helpId">
                @error('harga')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="berat_produk">Berat Produk</label>
                <input type="text" name="berat_produk" id="berat_produk" class="form-control @error('berat_produk') is-invalid @enderror" placeholder="Berat Produk (gram)"
                aria-describedby="helpId">
                @error('berat_produk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="detail_produk">Detail</label>
                <input type="text" name="detail_produk" id="detail_produk" class="form-control @error('detail_produk') is-invalid @enderror" placeholder="Tulis Detail"
                aria-describedby="helpId">
                @error('detail_produk')
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