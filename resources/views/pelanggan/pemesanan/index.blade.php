@extends('pelanggan.layouts.app')
@section('content')

<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ '/' }}" class="text-dark">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('produk') }}" class="text-dark">Layanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pemesanan</li>
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
            <form action="/pelanggan/pemesanan" method="post" enctype="multipart/form-data"> 
            @csrf
            <table class="table" style="border-top : hidden">
                <tr>
                    <td>Kategori</td>
                    <td>:</td>
                    <td>{{ $produk->kategori->nama_kategori }}</td>
                </tr>
                <tr>
                    <td>Nama Produk</td>
                    <td>:</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <input type="hidden" name="harga" value={{ $produk->harga}}>
                    <input type="hidden" name="id_produk" value={{ $produk->id_produk}}>

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
                <input type="hidden" name="tanggal_pemesanan" value="<?php echo date("Y-m-d"); ?>">
                <tr>
                    <td>Jumlah Pesanan</td>
                    <td>:</td>
                    <td>
                        <input id="jumlah" type="number"
                            class="form-control @error('jumlah') is-invalid @enderror"
                            name="jumlah" value="{{ old('jumlah') }}" required
                            autocomplete="name" autofocus>

                        @error('jumlah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Upload model yang akan dibuat</td>
                    <td>:</td>
                    <td>
                        <input id="foto_model" type="file"
                            class="form-control @error('foto_model') is-invalid @enderror"
                            name="foto_model" value="{{ old('foto_model') }}"
                            autocomplete="name" autofocus>

                        @error('foto_model')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td>:</td>
                    <td>
                        <input id="catatan" type="text"
                            class="form-control @error('catatan') is-invalid @enderror"
                            name="catatan" value="{{ old('catatan') }}"
                            autocomplete="name" autofocus>

                        @error('catatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Pengukuran</strong> </td>
                </tr>
                <tr>
                    <div class="card-body">
                        <img src="/gambar_ukuran/{{ $produk->kategori->gambar_ukuran }}" class="img-fluid">
                    </div>
                </tr>
                @if($produk->kategori->nama_kategori=='Celana')
                <tr>
                    <td>lingkar_pinggang</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_pinggang" type="text"
                            class="form-control @error('lingkar_pinggang') is-invalid @enderror"
                            name="lingkar_pinggang" value="{{ old('lingkar_pinggang') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_pinggang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_keris</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_keris" type="text"
                            class="form-control @error('lingkar_keris') is-invalid @enderror"
                            name="lingkar_keris" value="{{ old('lingkar_keris') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_keris')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_lutut</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_lutut" type="text"
                            class="form-control @error('lingkar_lutut') is-invalid @enderror"
                            name="lingkar_lutut" value="{{ old('lingkar_lutut') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_lutut')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_paha</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_paha" type="text"
                            class="form-control @error('lingkar_paha') is-invalid @enderror"
                            name="lingkar_paha" value="{{ old('lingkar_paha') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_paha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>panjang_celana</td>
                    <td>:</td>
                    <td>
                        <input id="panjang_celana" type="text"
                            class="form-control @error('panjang_celana') is-invalid @enderror"
                            name="panjang_celana" value="{{ old('panjang_celana') }}"
                            autocomplete="name" autofocus>

                        @error('panjang_celana')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lebar_bawah</td>
                    <td>:</td>
                    <td>
                        <input id="lebar_bawah" type="text"
                            class="form-control @error('lebar_bawah') is-invalid @enderror"
                            name="lebar_bawah" value="{{ old('lebar_bawah') }}"
                            autocomplete="name" autofocus>

                        @error('lebar_bawah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                @endif
                @if($produk->kategori->nama_kategori=='Rok')
                <tr>
                    <td>lingkar_pinggang</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_pinggang" type="text"
                            class="form-control @error('lingkar_pinggang') is-invalid @enderror"
                            name="lingkar_pinggang" value="{{ old('lingkar_pinggang') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_pinggang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>panjang_celana</td>
                    <td>:</td>
                    <td>
                        <input id="panjang_celana" type="text"
                            class="form-control @error('panjang_celana') is-invalid @enderror"
                            name="panjang_celana" value="{{ old('panjang_celana') }}"
                            autocomplete="name" autofocus>

                        @error('panjang_celana')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lebar_bawah</td>
                    <td>:</td>
                    <td>
                        <input id="lebar_bawah" type="text"
                            class="form-control @error('lebar_bawah') is-invalid @enderror"
                            name="lebar_bawah" value="{{ old('lebar_bawah') }}"
                            autocomplete="name" autofocus>

                        @error('lebar_bawah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                @endif
                @if($produk->kategori->nama_kategori=='Jas')
                <tr>
                    <td>panjang bahu</td>
                    <td>:</td>
                    <td>
                        <input id="panjang_bahu" type="text"
                            class="form-control @error('panjang_bahu') is-invalid @enderror"
                            name="panjang_bahu" value="{{ old('panjang_bahu') }}"
                            autocomplete="name" autofocus>

                        @error('panjang_bahu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>panjanglengan</td>
                    <td>:</td>
                    <td>
                        <input id="panjang_lengan" type="text"
                            class="form-control @error('panjang_lengan') is-invalid @enderror"
                            name="panjang_lengan" value="{{ old('panjang_lengan') }}"
                            autocomplete="name" autofocus>

                        @error('panjang_lengan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>panjang_baju</td>
                    <td>:</td>
                    <td>
                        <input id="panjang_baju" type="text"
                            class="form-control @error('panjang_baju') is-invalid @enderror"
                            name="panjang_baju" value="{{ old('panjang_baju') }}"
                            autocomplete="name" autofocus>

                        @error('panjang_baju')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_dada</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_dada" type="text"
                            class="form-control @error('lingkar_dada') is-invalid @enderror"
                            name="lingkar_dada" value="{{ old('lingkar_dada') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_dada')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_lengan</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_lengan" type="text"
                            class="form-control @error('lingkar_lengan') is-invalid @enderror"
                            name="lingkar_lengan" value="{{ old('lingkar_lengan') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_lengan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_ketiak</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_ketiak" type="text"
                            class="form-control @error('lingkar_ketiak') is-invalid @enderror"
                            name="lingkar_ketiak" value="{{ old('lingkar_ketiak') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_ketiak')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_leher</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_leher" type="text"
                            class="form-control @error('lingkar_leher') is-invalid @enderror"
                            name="lingkar_leher" value="{{ old('lingkar_leher') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_leher')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_perut</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_perut" type="text"
                            class="form-control @error('lingkar_perut') is-invalid @enderror"
                            name="lingkar_perut" value="{{ old('lingkar_perut') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_perut')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                @endif
                @if($produk->kategori->nama_kategori=='Kemeja')
                <tr>
                    <td>panjang bahu</td>
                    <td>:</td>
                    <td>
                        <input id="panjang_bahu" type="text"
                            class="form-control @error('panjang_bahu') is-invalid @enderror"
                            name="panjang_bahu" value="{{ old('panjang_bahu') }}"
                            autocomplete="name" autofocus>

                        @error('panjang_bahu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>panjanglengan</td>
                    <td>:</td>
                    <td>
                        <input id="panjang_lengan" type="text"
                            class="form-control @error('panjang_lengan') is-invalid @enderror"
                            name="panjang_lengan" value="{{ old('panjang_lengan') }}"
                            autocomplete="name" autofocus>

                        @error('panjang_lengan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>panjang_baju</td>
                    <td>:</td>
                    <td>
                        <input id="panjang_baju" type="text"
                            class="form-control @error('panjang_baju') is-invalid @enderror"
                            name="panjang_baju" value="{{ old('panjang_baju') }}"
                            autocomplete="name" autofocus>

                        @error('panjang_baju')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_dada</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_dada" type="text"
                            class="form-control @error('lingkar_dada') is-invalid @enderror"
                            name="lingkar_dada" value="{{ old('lingkar_dada') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_dada')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_lengan</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_lengan" type="text"
                            class="form-control @error('lingkar_lengan') is-invalid @enderror"
                            name="lingkar_lengan" value="{{ old('lingkar_lengan') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_lengan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_ketiak</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_ketiak" type="text"
                            class="form-control @error('lingkar_ketiak') is-invalid @enderror"
                            name="lingkar_ketiak" value="{{ old('lingkar_ketiak') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_ketiak')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_leher</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_leher" type="text"
                            class="form-control @error('lingkar_leher') is-invalid @enderror"
                            name="lingkar_leher" value="{{ old('lingkar_leher') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_leher')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                @endif
                @if($produk->kategori->nama_kategori=='Seragam')
                <tr>
                    <td colspan="3"><strong>Atasan</strong> </td>
                </tr>
                <tr>
                    <td>panjang bahu</td>
                    <td>:</td>
                    <td>
                        <input id="panjang_bahu" type="text"
                            class="form-control @error('panjang_bahu') is-invalid @enderror"
                            name="panjang_bahu" value="{{ old('panjang_bahu') }}"
                            autocomplete="name" autofocus>

                        @error('panjang_bahu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>panjanglengan</td>
                    <td>:</td>
                    <td>
                        <input id="panjang_lengan" type="text"
                            class="form-control @error('panjang_lengan') is-invalid @enderror"
                            name="panjang_lengan" value="{{ old('panjang_lengan') }}"
                            autocomplete="name" autofocus>

                        @error('panjang_lengan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>panjang_baju</td>
                    <td>:</td>
                    <td>
                        <input id="panjang_baju" type="text"
                            class="form-control @error('panjang_baju') is-invalid @enderror"
                            name="panjang_baju" value="{{ old('panjang_baju') }}"
                            autocomplete="name" autofocus>

                        @error('panjang_baju')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_dada</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_dada" type="text"
                            class="form-control @error('lingkar_dada') is-invalid @enderror"
                            name="lingkar_dada" value="{{ old('lingkar_dada') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_dada')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_lengan</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_lengan" type="text"
                            class="form-control @error('lingkar_lengan') is-invalid @enderror"
                            name="lingkar_lengan" value="{{ old('lingkar_lengan') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_lengan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_ketiak</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_ketiak" type="text"
                            class="form-control @error('lingkar_ketiak') is-invalid @enderror"
                            name="lingkar_ketiak" value="{{ old('lingkar_ketiak') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_ketiak')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_leher</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_leher" type="text"
                            class="form-control @error('lingkar_leher') is-invalid @enderror"
                            name="lingkar_leher" value="{{ old('lingkar_leher') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_leher')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Bawahan</strong> </td>
                </tr>
                <tr>
                    <td>lingkar_pinggang</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_pinggang" type="text"
                            class="form-control @error('lingkar_pinggang') is-invalid @enderror"
                            name="lingkar_pinggang" value="{{ old('lingkar_pinggang') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_pinggang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_keris</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_keris" type="text"
                            class="form-control @error('lingkar_keris') is-invalid @enderror"
                            name="lingkar_keris" value="{{ old('lingkar_keris') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_keris')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_lutut</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_lutut" type="text"
                            class="form-control @error('lingkar_lutut') is-invalid @enderror"
                            name="lingkar_lutut" value="{{ old('lingkar_lutut') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_lutut')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lingkar_paha</td>
                    <td>:</td>
                    <td>
                        <input id="lingkar_paha" type="text"
                            class="form-control @error('lingkar_paha') is-invalid @enderror"
                            name="lingkar_paha" value="{{ old('lingkar_paha') }}"
                            autocomplete="name" autofocus>

                        @error('lingkar_paha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>panjang_celana</td>
                    <td>:</td>
                    <td>
                        <input id="panjang_celana" type="text"
                            class="form-control @error('panjang_celana') is-invalid @enderror"
                            name="panjang_celana" value="{{ old('panjang_celana') }}"
                            autocomplete="name" autofocus>

                        @error('panjang_celana')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>lebar_bawah</td>
                    <td>:</td>
                    <td>
                        <input id="lebar_bawah" type="text"
                            class="form-control @error('lebar_bawah') is-invalid @enderror"
                            name="lebar_bawah" value="{{ old('lebar_bawah') }}"
                            autocomplete="name" autofocus>

                        @error('lebar_bawah')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </td>
                </tr>
                @endif
                <tr>
                    <td colspan="3">
                        <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-shopping-cart"></i>  Masukkan Keranjang</button>
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
@endsection