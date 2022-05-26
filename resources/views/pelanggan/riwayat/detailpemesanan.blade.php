@extends('pelanggan.layouts.app')
@section('content')

<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ '/' }}" class="text-dark">Beranda</a></li>
                    {{-- <li class="breadcrumb-item"><a href="{{ route('riwayat.detail') }}" class="text-dark">Pesanan</a></li> --}}
                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table" style="border-top : hidden">
                <tr>
                    <td>Kategori</td>
                    <td>:</td>
                    <td>{{ $detail->produk->kategori->nama_kategori }}</td>
                </tr>
                <tr>
                    <td>Nama Produk</td>
                    <td>:</td>
                    <td>{{ $detail->produk->nama_produk }}</td>
                </tr>
                <tr>
                    <td>Nama Pelanggan</td>
                    <td>:</td>
                    <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                    <td>Nomor Telepon</td>
                    <td>:</td>
                    <td>{{ Auth::user()->nomorhp }}</td>
                </tr>
                <tr>
                    <td>Jumlah Pesanan</td>
                    <td>:</td>
                    <td>{{ $detail->jumlah }}</td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td>:</td>
                    <td>{{ $detail->ukuran->catatan }}</td>
                </tr>
            </table>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Model Baju yang akan dibuat :</strong>
                </div>
                <img src="/foto_model/{{ $detail->ukuran->foto_model }}" width="50px"> 
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>PENGUKURAN</strong>
                </div>
                <img src="/gambar_ukuran/{{ $detail->produk->kategori->gambar_ukuran }}" class="img-fluid">
            </div>
            <table>
                @if($detail->produk->kategori->nama_kategori=='Celana')
                <tr>
                    <td>Lingkar Pinggang</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_pinggang }}</td>
                </tr>
                <tr>
                    <td>Lingkar Keris</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_keris }}</td>
                </tr>
                <tr>
                    <td>Lingkar Lutut</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_lutut }}</td>
                </tr>
                <tr>
                    <td>Lingkar Paha</td><td>:</td>
                    <td> {{ $detail->ukuran->lingkar_paha}}</td>
                </tr>
                <tr>
                    <td>Panjang Celana</td><td>:</td>
                    <td>{{ $detail->ukuran->panjang_celana }}</td>
                </tr>
                <tr>
                    <td>lebar_bawah</td><td>:</td>
                    <td>{{ $detail->ukuran->lebar_bawah }}</td>
                </tr>
                @endif
                @if($detail->produk->kategori->nama_kategori=='Rok')
                <tr>
                    <td>Lingkar Pinggang</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_pinggang }}</td>
                </tr>
                <tr>
                    <td>Panjang Celana</td><td>:</td>
                    <td>{{ $detail->ukuran->panjang_celana }}</td>
                </tr>
                <tr>
                    <td>Lebar Bawah</td><td>:</td>
                    <td>{{ $detail->ukuran->lebar_bawah }}</td>
                </tr>
                @endif
                @if($detail->produk->kategori->nama_kategori=='Jas')
                <tr>
                    <td>Panjang Bahu</td><td>:</td>
                    <td>{{ $detail->ukuran->panjang_bahu }}</td>
                </tr>
                <tr>
                    <td>Panjang Lengan</td><td>:</td>
                    <td>{{ $detail->ukuran->panjang_lengan }}</td>
                </tr>
                <tr>
                    <td>Panjang Baju</td><td>:</td>
                    <td>{{ $detail->ukuran->panjang_baju }}</td>
                </tr>
                <tr>
                    <td>Lingkar Dada</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_dada }}</td>
                </tr>
                <tr>
                    <td>Lingkar Lengan</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_lengan }}</td>
                </tr>
                <tr>
                    <td>Lingkar Ketiak</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_ketiak }}</td>
                </tr>
                <tr>
                    <td>Lingkar Leher</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_leher }}</td>
                </tr>
                <tr>
                    <td>Lingkar Perut</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_perut }}</td>
                </tr>
                @endif
                @if($detail->produk->kategori->nama_kategori=='Kemeja')
                <tr>
                    <td>Panjang Bahu</td><td>:</td>
                    <td>{{ $detail->ukuran->panjang_bahu }}</td>
                </tr>
                <tr>
                    <td>Panjang Lengan</td><td>:</td>
                    <td>{{ $detail->ukuran->panjang_lengan }}</td>
                </tr>
                <tr>
                    <td>Panjang Baju</td><td>:</td>
                    <td>{{ $detail->ukuran->panjang_baju }}</td>
                </tr>
                <tr>
                    <td>Lingkar Dada</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_dada }}</td>
                </tr>
                <tr>
                    <td>Lingkar Lengan</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_lengan }}</td>
                </tr
                <tr>
                    <td>Lingkar Ketiak</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_ketiak }}</td>
                </tr>
                <tr>
                    <td>lingkar_leher</td>
                    <td>:</td>
                    <td>{{ $detail->ukuran->lingkar_leher }} </td>
                </tr>
                @endif
                @if($detail->produk->kategori->nama_kategori=='Seragam')
                <tr>
                    <td colspan="3"><strong>Atasan</strong> </td>
                </tr>
                <tr>
                    <td>Panjang Bahu</td><td>:</td>
                    <td>{{ $detail->ukuran->panjang_bahu }}</td>
                </tr>
                <tr>
                    <td>Panjang Lengan</td><td>:</td>
                    <td>{{ $detail->ukuran->panjang_lengan }}</td>
                </tr>
                <tr>
                    <td>Panjang Baju</td><td>:</td>
                    <td>{{ $detail->ukuran->panjang_baju }}</td>
                </tr>
                <tr>
                    <td>Lingkar Dada</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_dada }}</td>
                </tr>
                <tr>
                    <td>Lingkar Lengan</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_lengan }}</td>
                </tr>
                <tr>
                    <td>Lingkar Ketiak</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_ketiak }}</td>
                </tr>
                <tr>
                    <td>lingkar_leher</td>
                    <td>:</td>
                    <td>{{ $detail->ukuran->lingkar_leher }} </td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Bawahan</strong> </td>
                </tr>
                <tr>
                    <td>Lingkar Pinggang</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_pinggang }}</td>
                </tr>
                <tr>
                    <td>Lingkar Keris</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_keris }}</td>
                </tr>
                <tr>
                    <td>Lingkar Lutut</td><td>:</td>
                    <td>{{ $detail->ukuran->lingkar_lutut }}</td>
                </tr>
                <tr>
                    <td>Lingkar Paha</td><td>:</td>
                    <td> {{ $detail->ukuran->lingkar_paha}}</td>
                </tr>
                <tr>
                    <td>Panjang Celana</td><td>:</td>
                    <td>{{ $detail->ukuran->panjang_celana }}</td>
                </tr>
                <tr>
                    <td>lebar_bawah</td><td>:</td>
                    <td>{{ $detail->ukuran->lebar_bawah }}</td>
                </tr>
                @endif
            </table>
            </form>
        </div>
    </div>
</div>
@endsection