@extends('layouts.admin', ['title' => 'Ubah Detail Pengeluaran'])

@section('title', 'Ubah Detail Pengeluaran')

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Ubah Detail Pengeluaran</h3>
        </div>
         <div class="card-body">
            <form action="/admin/detailpengeluaran/{{ $detailpengeluaran->id_detailpengeluaran }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_pengeluaran">Id Pengeluaran</label>
                <input type="text" name="id_pengeluaran" id="id_pengeluaran" class="form-control @error('id_pengeluaran') is-invalid @enderror" placeholder="Nama Kategori"
                aria-describedby="helpId" value="{{ $detailpengeluaran->id_pengeluaran }}" readonly>
                @error('id_pengeluaran')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_pengeluaran">Tanggal</label>
                <input type="text" name="tanggal_pengeluaran" id="tanggal_pengeluaran" class="form-control @error('tanggal_pengeluaran') is-invalid @enderror" placeholder="Nama Kategori"
                aria-describedby="helpId" value="{{ $detailpengeluaran->pengeluaran->tanggal_pengeluaran }}" readonly>
                @error('tanggal_pengeluaran')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ $detailpengeluaran->nama_barang }}" >
                @error('nama_barang')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" name="satuan" id="satuan" class="form-control @error('satuan') is-invalid @enderror" value="{{ $detailpengeluaran->satuan }}">
                @error('satuan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" name="jumlah" id="jumlah" class="form-control @error('jumlah') is-invalid @enderror" value="{{ $detailpengeluaran->jumlah }}">
                @error('jumlah')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="harga">Harga /Satuan</label>
                <input type="text" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ $detailpengeluaran->harga }}">
                @error('harga')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="subtotal">Sub Total</label>
                <input type="text" name="subtotal" id="subtotal" class="form-control @error('subtotal') is-invalid @enderror" value="{{ $detailpengeluaran->subtotal }}">
                @error('subtotal')
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