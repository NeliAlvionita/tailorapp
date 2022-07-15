@extends('layouts.admin', ['title' => 'Ubah Produk'])

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Ubah Produk</h3>
        </div>
         <div class="card-body">
            <form action="/admin/produk/{{$produk->id_produk}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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
                <input type="text" name="nama_produk" id="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror" value="{{ $produk->nama_produk }}" placeholder="Nama Produk"
                aria-describedby="helpId">
                @error('nama_produk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_bahan">Nama Bahan</label>
                <select name="nama_bahan" id="nama_bahan" class="form-control @error('nama_bahan') is-invalid @enderror" value="{{$produk->nama_bahan}}">
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
                <img src="/foto_produk/{{ $produk->foto_produk }}" width="500px">
                @error('foto_produk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ $produk->harga }}" placeholder="Harga (Rp.)"
                aria-describedby="helpId">
                @error('harga')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="harga_jahit">Harga Jahit Tanpa Bahan</label>
                <input type="text" name="harga_jahit" id="harga_jahit" class="form-control @error('harga_jahit') is-invalid @enderror" placeholder="harga jahit" value="{{ $produk->harga_jahit}}"
                aria-describedby="helpId">
                @error('harga_jahit')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="berat_produk">Berat (gr)</label>
                <input type="text" name="berat_produk" id="berat_produk" class="form-control @error('berat_produk') is-invalid @enderror" value="{{ $produk->berat_produk }}" placeholder="Harga (Rp.)"
                aria-describedby="helpId">
                @error('berat_produk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="stok_bahan">Stok Bahan</label>
                <input type="text" name="stok_bahan" id="stok_bahan" class="form-control @error('stok_bahan') is-invalid @enderror" placeholder="stok_bahan" value="{{ $produk->stok_bahan }}"
                aria-describedby="helpId">
                @error('stok_bahan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="detail_produk">Detail</label>
                <input type="text" name="detail_produk" id="detail_produk" class="form-control @error('detail_produk') is-invalid @enderror" value="{{ $produk->detail_produk }}" placeholder="Tulis Detail"
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