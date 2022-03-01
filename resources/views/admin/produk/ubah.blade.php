@extends('layouts.admin', ['title' => 'Ubah Produk'])

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Ubah Produk</h3>
        </div>
         <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="/admin/produk/{{$produk->id_produk}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Layanan</label>
                <select name="id_layanan" id="id_layanan" class="form-control">
                    @foreach ($listLayanan as $layanan)
                    <option value="{{$layanan->id_layanan}}">{{$layanan->nama_layanan}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
                <select name="id_kategori" id="id_kategori" class="form-control">
                    @foreach ($listKategori as $kategori)
                    <option value="{{$kategori->id_kategori}}">{{$kategori->nama_kategori}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" id="nama_produk" class="form-control" value="{{ $produk->nama_produk }}" placeholder="Nama Produk"
                aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="foto_produk">File Foto Produk</label>
                <input type="file" name="foto_produk" id="foto_produk" class="form-control">
                <img src="/foto_produk/{{ $produk->foto_produk }}" width="500px">
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" class="form-control" value="{{ $produk->harga }}" placeholder="Harga (Rp.)"
                aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="detail_produk">Detail</label>
                <input type="text" name="detail_produk" id="detail_produk" class="form-control" value="{{ $produk->detail_produk }}" placeholder="Tulis Detail"
                aria-describedby="helpId">
            </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="cancel" class="btn btn-default">Batal</button>
            </form>
        </div>
    </div>                   
@endsection