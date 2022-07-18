@extends('pelanggan.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-12">
            @include('pelanggan.layouts.header')

            <div class="row">
                <div class="col-md-12">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
            </div>
            
            <!-- ***** Start form order ***** -->
            <div class="row" style="margin-top: 120px;">
                <div class="col-lg-12">
                    <div class="section-heading wow fadeIn" id="top" data-wow-duration="2s" data-wow-delay="1s">
                        <center><h4>Form <em> Pesanan</em> </h4>
                        <img src="{{ asset('assets/images/heading-line-dec.png')}}" alt="">
                        <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span>
                        <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span></center>
                    </div>
                    <br><br>

                    <form action="/pelanggan/pemesanan" method="post" enctype="multipart/form-data"> 
                        @csrf
                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><h6> Kategori :</h6></label>
                                    <input type="hidden" name="id_kategori" value={{ $produk->id_kategori}}>
                                    <input type="text" name="kategori" disabled class="form-control" placeholder="{{ $produk->kategori->nama_kategori }}">
                 
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><h6> Nama Produk :</h6></label>
                                    <input type="text" name="produk" readonly class="form-control" placeholder="{{ $produk->nama_produk }}">
                                    <input type="hidden" name="harga" value="{{ $produk->harga}}">
                                    <input type="hidden" name="harga_jahit" value="{{ $produk->harga_jahit}}">
                                    <input type="hidden" name="berat_produk" value="{{ $produk->berat_produk}}">
                                    <input type="hidden" name="id_produk" value="{{ $produk->id_produk}}">
                                    <input type="hidden" name="nama_bahan" value="{{ $produk->nama_bahan }}">
                                    <input type="hidden" name="nama_kategori" value="{{ $produk->kategori->nama_kategori}}">
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><h6> Nama Pelanggan :</h6></label>
                                    <input type="text" name="name" readonly class="form-control" placeholder="{{ Auth::user()->name }}">
                                    
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><h6> Nomor Telepon :</h6></label>
                                    <input type="text" name="notelp" readonly class="form-control" placeholder="{{ Auth::user()->nomorhp }}">
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><h6> Upload model baju yang akan dibuat :</h6></label>
                                    <input id="foto_model" type="file"
                                        class="form-control @error('foto_model') is-invalid @enderror"
                                        name="foto_model" value="{{ old('foto_model') }}"
                                        autocomplete="name" autofocus>

                                    @error('foto_model')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <input type="hidden" name="tanggal_pemesanan" value="<?php echo date("Y-m-d"); ?>">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><h6> Jumlah Pesanan:</h6></label>
                                    <input id="jumlah" type="number"
                                        class="form-control @error('jumlah') is-invalid @enderror"
                                        name="jumlah" value="{{ old('jumlah') }}" required
                                        autocomplete="name" autofocus>

                                    @error('jumlah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><h6> Catatan :</h6></label>
                                    <textarea class="form-control @error('catatan') is-invalid @enderror" 
                                        name="catatan" rows="3" id="catatan" value="{{ old('catatan') }}"
                                        autocomplete="name" autofocus>
                                    </textarea>

                                    @error('catatan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label><h6> Bahan :</h6></label>
                                    <select name="pilih_bahan" id="pilih_bahan" class="form-control @error('pilih_bahan') is-invalid @enderror">
                                        <option value=""> --Pilih--</option>
                                        <option value="Bahan Sendiri">Bahan Sendiri</option>
                                        <option value="Bahan Penjahit">Bahan Penjahit</option>
                                    </select>
                                    @error('pilih_bahan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group tanggal">
                                    <label><h6> Tanggal Pengiriman Bahan :</h6></label>
                                    <input type="date" name="tanggal_pengiriman_bahan" id="tanggal_pengiriman_bahan" class="form-control" 
                                    aria-describedby="helpId">
                                    @error('tanggal_pengiriman_bahan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 
                        </div><br>


                        <div class="heading">
                            <h4> Pengukuran</h4>
                            <hr style="height:5px;color:black;background-color:black"> 
                        </div>

                        <div class="alert alert-primary">
                                <ol class="list-group list-group-numbered" >
                                    <li class="list-group-item" style="border:none;">Anda hanya membutuhkan alat bantu berupa meteran</li>
                                    <li class="list-group-item" style="border:none;">Mengukur dengan cara langsung mengukur di badan atau Mengukur dengan baju yang pas</li>
                                    <li class="list-group-item" style="border:none;">Melihat Contoh Model Yang mengenakan</li>
                                    <li class="list-group-item" style="border:none;">Mencatat Ukuran Pakaian Anda</li>
                                </ol>
                        </div>

                        <div class="row">
                            <div class="card-body">
                                <img src="/gambar_ukuran/{{ $produk->kategori->gambar_ukuran }}" class="img-fluid">
                            </div>
                        </div><br>

                        @if($produk->kategori->nama_kategori=='Celana')
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>A. Lingkar Pinggang :</h6> </label>
                                    <input id="lingkar_pinggang" type="text"
                                        class="form-control @error('lingkar_pinggang') is-invalid @enderror"
                                        name="lingkar_pinggang" value="{{ old('lingkar_pinggang') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_pinggang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>B. Lingkar Panggul :</h6> </label>
                                    <input id="lingkar_panggul" type="text"
                                        class="form-control @error('lingkar_panggul') is-invalid @enderror"
                                        name="lingkar_panggul" value="{{ old('lingkar_panggul') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_panggul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>C. Lingkar Keris :</h6> </label>
                                    <input id="lingkar_keris" type="text"
                                        class="form-control @error('lingkar_keris') is-invalid @enderror"
                                        name="lingkar_keris" value="{{ old('lingkar_keris') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_keris')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>D. Panjang Celana :</h6> </label>
                                    <input id="panjang_celana" type="text"
                                        class="form-control @error('panjang_celana') is-invalid @enderror"
                                        name="panjang_celana" value="{{ old('panjang_celana') }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_celana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>E. Lingkar Bawah :</h6> </label>
                                    <input id="lingkar_bawah" type="text"
                                        class="form-control @error('lingkar_bawah') is-invalid @enderror"
                                        name="lingkar_bawah" value="{{ old('lingkar_bawah') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_bawah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        @endif
                        
                        @if($produk->kategori->nama_kategori=='Rok')
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>A. Lingkar Pinggang :</h6> </label>
                                    <input id="lingkar_pinggang" type="text"
                                        class="form-control @error('lingkar_pinggang') is-invalid @enderror"
                                        name="lingkar_pinggang" value="{{ old('lingkar_pinggang') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_pinggang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>B. Lingkar Panggul :</h6> </label>
                                    <input id="lingkar_panggul" type="text"
                                        class="form-control @error('lingkar_panggul') is-invalid @enderror"
                                        name="lingkar_panggul" value="{{ old('lingkar_panggul') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_panggul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>C. Panjang Rok :</h6> </label>
                                    <input id="panjang_rok" type="text"
                                        class="form-control @error('panjang_rok') is-invalid @enderror"
                                        name="panjang_rok" value="{{ old('panjang_rok') }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_rok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>D. Tinggi Duduk :</h6> </label>
                                    <input id="tinggi_duduk" type="text"
                                        class="form-control @error('tinggi_duduk') is-invalid @enderror"
                                        name="tinggi_duduk" value="{{ old('tinggi_duduk') }}"
                                        autocomplete="name" autofocus>

                                    @error('tinggi_duduk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        @endif

                        @if($produk->kategori->nama_kategori=='Jas')
                        <div class="heading">
                            <h6>Atasan</h6>
                            <hr style="height:5px;color:black;background-color:black">
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>A. Lebar Bahu :</h6> </label>
                                    <input id="lebar_bahu" type="text"
                                        class="form-control @error('lebar_bahu') is-invalid @enderror"
                                        name="lebar_bahu" value="{{ old('lebar_bahu') }}"
                                        autocomplete="name" autofocus>

                                    @error('lebar_bahu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>B. Panjang Tangan :</h6> </label>
                                    <input id="panjang_tangan" type="text"
                                        class="form-control @error('panjang_tangan') is-invalid @enderror"
                                        name="panjang_tangan" value="{{ old('panjang_tangan') }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_tangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>C. Panjang Baju :</h6> </label>
                                    <input id="panjang_baju" type="text"
                                        class="form-control @error('panjang_baju') is-invalid @enderror"
                                        name="panjang_baju" value="{{ old('panjang_baju') }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_baju')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>D. Lingkar Dada :</h6> </label>
                                    <input id="lingkar_dada" type="text"
                                        class="form-control @error('lingkar_dada') is-invalid @enderror"
                                        name="lingkar_dada" value="{{ old('lingkar_dada') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_dada')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>E. Lingkar Lengan :</h6> </label>
                                    <input id="lingkar_lengan" type="text"
                                        class="form-control @error('lingkar_lengan') is-invalid @enderror"
                                        name="lingkar_lengan" value="{{ old('lingkar_lengan') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_lengan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>F. Lingkar Ketiak :</h6> </label>
                                    <input id="lingkar_ketiak" type="text"
                                        class="form-control @error('lingkar_ketiak') is-invalid @enderror"
                                        name="lingkar_ketiak" value="{{ old('lingkar_ketiak') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_ketiak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>G. Lingkar Lengan Bawah :</h6> </label>
                                    <input id="lingkar_lenganbawah" type="text"
                                        class="form-control @error('lingkar_lenganbawah') is-invalid @enderror"
                                        name="lingkar_lenganbawah" value="{{ old('lingkar_lenganbawah') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_lenganbawah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        <div class="heading">
                            <h6>Bawahan</h6>
                            <hr style="height:5px;color:black;background-color:black">
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>H. Lingkar Pinggang :</h6> </label>
                                    <input id="lingkar_pinggang" type="text"
                                        class="form-control @error('lingkar_pinggang') is-invalid @enderror"
                                        name="lingkar_pinggang" value="{{ old('lingkar_pinggang') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_pinggang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>I. Panjang Celana :</h6> </label>
                                    <input id="panjang_celana" type="text"
                                        class="form-control @error('panjang_celana') is-invalid @enderror"
                                        name="panjang_celana" value="{{ old('panjang_celana') }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_celana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>J. Lingkar Panggul :</h6> </label>
                                    <input id="lingkar_panggul" type="text"
                                        class="form-control @error('lingkar_panggul') is-invalid @enderror"
                                        name="lingkar_panggul" value="{{ old('lingkar_panggul') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_panggul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>K. Lingkar Keris :</h6> </label>
                                    <input id="lingkar_keris" type="text"
                                        class="form-control @error('lingkar_keris') is-invalid @enderror"
                                        name="lingkar_keris" value="{{ old('lingkar_keris') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_keris')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>L. Lingkar Bawah :</h6> </label>
                                    <input id="lingkar_bawah" type="text"
                                        class="form-control @error('lingkar_bawah') is-invalid @enderror"
                                        name="lingkar_bawah" value="{{ old('lingkar_bawah') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_bawah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        @endif

                        @if($produk->kategori->nama_kategori=='Kemeja')
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>A. Lebar Bahu :</h6> </label>
                                    <input id="lebar_bahu" type="text"
                                        class="form-control @error('lebar_bahu') is-invalid @enderror"
                                        name="lebar_bahu" value="{{ old('lebar_bahu') }}"
                                        autocomplete="name" autofocus>

                                    @error('lebar_bahu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>B. Panjang Tangan :</h6> </label>
                                    <input id="panjang_tangan" type="text"
                                        class="form-control @error('panjang_tangan') is-invalid @enderror"
                                        name="panjang_tangan" value="{{ old('panjang_tangan') }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_tangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>C. Panjang Baju :</h6> </label>
                                    <input id="panjang_baju" type="text"
                                        class="form-control @error('panjang_baju') is-invalid @enderror"
                                        name="panjang_baju" value="{{ old('panjang_baju') }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_baju')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>D. Lingkar Lengan :</h6> </label>
                                    <input id="lingkar_lengan" type="text"
                                        class="form-control @error('lingkar_lengan') is-invalid @enderror"
                                        name="lingkar_lengan" value="{{ old('lingkar_lengan') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_lengan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>E. Lingkar Dada :</h6> </label>
                                    <input id="lingkar_dada" type="text"
                                        class="form-control @error('lingkar_dada') is-invalid @enderror"
                                        name="lingkar_dada" value="{{ old('lingkar_dada') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_dada')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>F. Lingkar Ketiak :</h6> </label>
                                    <input id="lingkar_ketiak" type="text"
                                        class="form-control @error('lingkar_ketiak') is-invalid @enderror"
                                        name="lingkar_ketiak" value="{{ old('lingkar_ketiak') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_ketiak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>G. Lingkar Lengan Bawah :</h6> </label>
                                    <input id="lingkar_lenganbawah" type="text"
                                        class="form-control @error('lingkar_lenganbawah') is-invalid @enderror"
                                        name="lingkar_lenganbawah" value="{{ old('lingkar_lenganbawah') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_lenganbawah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        @endif

                        @if($produk->kategori->nama_kategori=='Seragam Pria')
                        <div class="heading">
                            <h6>Atasan</h6>
                            <hr style="height:5px;color:black;background-color:black">
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>A. Lebar Bahu :</h6> </label>
                                    <input id="lebar_bahu" type="text"
                                        class="form-control @error('lebar_bahu') is-invalid @enderror"
                                        name="lebar_bahu" value="{{ old('lebar_bahu') }}"
                                        autocomplete="name" autofocus>

                                    @error('lebar_bahu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>B. Lingkar Ketiak :</h6> </label>
                                    <input id="lingkar_ketiak" type="text"
                                        class="form-control @error('lingkar_ketiak') is-invalid @enderror"
                                        name="lingkar_ketiak" value="{{ old('lingkar_ketiak') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_ketiak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>C. Lingkar Lengan :</h6> </label>
                                    <input id="lingkar_lengan" type="text"
                                        class="form-control @error('lingkar_lengan') is-invalid @enderror"
                                        name="lingkar_lengan" value="{{ old('lingkar_lengan') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_lengan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>D. Panjang Baju :</h6> </label>
                                    <input id="panjang_baju" type="text"
                                        class="form-control @error('panjang_baju') is-invalid @enderror"
                                        name="panjang_baju" value="{{ old('panjang_baju') }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_baju')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>E. Lingkar Dada :</h6> </label>
                                    <input id="lingkar_dada" type="text"
                                        class="form-control @error('lingkar_dada') is-invalid @enderror"
                                        name="lingkar_dada" value="{{ old('lingkar_dada') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_dada')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>F. Panjang Tangan :</h6> </label>
                                    <input id="panjang_tangan" type="text"
                                        class="form-control @error('panjang_tangan') is-invalid @enderror"
                                        name="panjang_tangan" value="{{ old('panjang_tangan') }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_tangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        <div class="heading">
                            <h6>Bawahan</h6>
                            <hr style="height:5px;color:black;background-color:black">
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>G. Lingkar Pinggang :</h6> </label>
                                    <input id="lingkar_pinggang" type="text"
                                        class="form-control @error('lingkar_pinggang') is-invalid @enderror"
                                        name="lingkar_pinggang" value="{{ old('lingkar_pinggang') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_pinggang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>H. Lingkar Keris :</h6> </label>
                                    <input id="lingkar_keris" type="text"
                                        class="form-control @error('lingkar_keris') is-invalid @enderror"
                                        name="lingkar_keris" value="{{ old('lingkar_keris') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_keris')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>I. Panjang Celana :</h6> </label>
                                    <input id="panjang_celana" type="text"
                                        class="form-control @error('panjang_celana') is-invalid @enderror"
                                        name="panjang_celana" value="{{ old('panjang_celana') }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_celana')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>J. Lingkar Panggul :</h6> </label>
                                    <input id="lingkar_panggul" type="text"
                                        class="form-control @error('lingkar_panggul') is-invalid @enderror"
                                        name="lingkar_panggul" value="{{ old('lingkar_panggul') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_panggul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br><br>
                        @endif
                        @if($produk->kategori->nama_kategori=='Seragam Perempuan')
                        <div class="heading">
                            <h6>Atasan</h6>
                            <hr style="height:5px;color:black;background-color:black">
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>A. Lebar Bahu :</h6> </label>
                                    <input id="lebar_bahu" type="text"
                                        class="form-control @error('lebar_bahu') is-invalid @enderror"
                                        name="lebar_bahu" value="{{ old('lebar_bahu') }}"
                                        autocomplete="name" autofocus>

                                    @error('lebar_bahu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>B. Lingkar Ketiak :</h6> </label>
                                    <input id="lingkar_ketiak" type="text"
                                        class="form-control @error('lingkar_ketiak') is-invalid @enderror"
                                        name="lingkar_ketiak" value="{{ old('lingkar_ketiak') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_ketiak')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>C. Lingkar Lengan :</h6> </label>
                                    <input id="lingkar_lengan" type="text"
                                        class="form-control @error('lingkar_lengan') is-invalid @enderror"
                                        name="lingkar_lengan" value="{{ old('lingkar_lengan') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_lengan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>D. Panjang Baju :</h6> </label>
                                    <input id="panjang_baju" type="text"
                                        class="form-control @error('panjang_baju') is-invalid @enderror"
                                        name="panjang_baju" value="{{ old('panjang_baju') }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_baju')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>E. Lingkar Dada :</h6> </label>
                                    <input id="lingkar_dada" type="text"
                                        class="form-control @error('lingkar_dada') is-invalid @enderror"
                                        name="lingkar_dada" value="{{ old('lingkar_dada') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_dada')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>F. Panjang Tangan :</h6> </label>
                                    <input id="panjang_tangan" type="text"
                                        class="form-control @error('panjang_tangan') is-invalid @enderror"
                                        name="panjang_tangan" value="{{ old('panjang_tangan') }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_tangan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        <div class="heading">
                            <h6>Bawahan</h6>
                            <hr style="height:5px;color:black;background-color:black">
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>G. Lingkar Pinggang :</h6> </label>
                                    <input id="lingkar_pinggang" type="text"
                                        class="form-control @error('lingkar_pinggang') is-invalid @enderror"
                                        name="lingkar_pinggang" value="{{ old('lingkar_pinggang') }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_pinggang')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>I. Panjang Rok :</h6> </label>
                                    <input id="panjang_rok" type="text"
                                        class="form-control @error('panjang_rok') is-invalid @enderror"
                                        name="panjang_rok" value="{{ old('panjang_rok') }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_rok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br><br>
                        @endif
                        <div class="row wow fadeIn" id="top" data-wow-duration="4s" data-wow-delay="0.5s"><br><br>
                            <div class="col" >
                                <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-shopping-cart"></i>  Masukkan Keranjang</button>
                            </div>
                        </div>
                    </form><br><br>

                    
                </div>
            </div>
            <!-- ***** End form order ***** -->  
        </div>
    </div>
</div>
<script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script>
     $('select[name="pilih_bahan"]').on('change', function (){
        let bahan = $(this).val();
        if (bahan == 'Bahan Sendiri') {
            $('.tanggal').show();
        } else {
            $('.tanggal').hide();
        }
    });
</script>
@include('pelanggan.layouts.footer')
@endsection