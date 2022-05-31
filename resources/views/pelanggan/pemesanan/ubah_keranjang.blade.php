@extends('pelanggan.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-12">
            <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
                <div class="container">
                <div class="row">
                    <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                        <img src="{{ asset('assets/logo.png')}}" alt=" ">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                        <li class="scroll-to-section"><a href="/" >Beranda</a></li>
                        <li class="scroll-to-section"><a href="{{ route('produk') }}">Katalog</a></li>
                        <li class="scroll-to-section"><a href="{{ route('riwayat') }}">Pesanan</a></li>
                        <li class="scroll-to-section"><a href="{{ route('keranjang') }}">Keranjang</a></li>
                        @guest
                        <li><div class="gradient-button"><a id="modal_trigger" href="{{ route('login') }}">
                          <i class="fa fa-sign-in-alt"></i> Masuk</a></div></li> 
                      </ul>   
                      @else  
                        <li><div class="gradient-button"><a id="modal_trigger" href="#">
                          <i class="fa fa-sign-in-alt"></i> {{ Auth::user()->name }}</a></div>
                          <ul>
                            <a class="dropdown-item"  href="{{ route('lihat.akun')}}">Lihat Akun</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                           </a>
              
                          </ul> 
                        </li> 
                      
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                    </form>
                    @endguest
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                    </div>
                </div>
                </div>
              </header>
            <!-- ***** Header Area End ***** -->

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

                    <form action="/pelanggan/keranjang/{{$detailpemesanan->id_detailpemesanan}}" method="post" enctype="multipart/form-data"> 
                        @csrf
                        @method('PUT')
                        <div class="row ">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><h6> Kategori :</h6></label>
                                    <input type="text" name="kategori" disabled class="form-control" placeholder="{{ $detailpemesanan->produk->kategori->nama_kategori }}">
                                    
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><h6> Nama Produk :</h6></label>
                                    <input type="text" name="produk" disabled class="form-control" placeholder="{{ $detailpemesanan->produk->nama_produk }}">
                                    <input type="hidden" name="harga" value={{ $detailpemesanan->produk->harga}}>
                                    <input type="hidden" name="id_produk" value={{ $detailpemesanan->produk->id_produk}}>
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><h6> Nama Pelanggan :</h6></label>
                                    <input type="text" name="name" disabled class="form-control" placeholder="{{ Auth::user()->name }}">
                                    
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><h6> Nomor Telepon :</h6></label>
                                    <input type="text" name="notelp" disabled class="form-control" placeholder="{{ Auth::user()->nomorhp }}">
                                </div>
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label><h6> Upload model baju yang akan dibuat :</h6></label>
                                    <input id="foto_model" type="file"
                                        class="form-control @error('foto_model') is-invalid @enderror"
                                        name="foto_model" value="{{ $detailpemesanan->ukuran->foto_model}}"
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
                                        name="jumlah" value="{{ $detailpemesanan->jumlah }}" required
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
                                    <input id="catatan" type="text"
                                    class="form-control @error('catatan') is-invalid @enderror"
                                    name="catatan" value="{{ $detailpemesanan->ukuran->catatan }}" required
                                    autocomplete="name" autofocus>

                                    @error('catatan')
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
                            <h6 style="color:black;">PANDUAN PENGUKURAN</h6><br>
                                <ol class="list-group list-group-numbered">
                                    <li class="list-group-item">Anda hanya membutuhkan alat bantu berupa meteran</li>
                                    <li class="list-group-item">Mengukur dengan cara langsung mengukur di badan atau Mengukur dengan baju yang pas</li>
                                    <li class="list-group-item">Melihat Contoh Model Yang mengenakan</li>
                                    <li class="list-group-item">Mencatat Ukuran Pakaian Anda</li>
                                </ol>
                        </div>

                        <div class="row">
                            <div class="card-body">
                                <img src="/gambar_ukuran/{{ $detailpemesanan->produk->kategori->gambar_ukuran }}" class="img-fluid">
                            </div>
                        </div><br>

                        @if($detailpemesanan->produk->kategori->nama_kategori=='Celana')
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Lingkar Pinggang :</h6> </label>
                                    <input id="lingkar_pinggang" type="text"
                                        class="form-control @error('lingkar_pinggang') is-invalid @enderror"
                                        name="lingkar_pinggang" value="{{ $detailpemesanan->ukuran->lingkar_pinggang }}"
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
                                    <label><h6>Lingkar Keris :</h6> </label>
                                    <input id="lingkar_keris" type="text"
                                        class="form-control @error('lingkar_keris') is-invalid @enderror"
                                        name="lingkar_keris" value="{{ $detailpemesanan->ukuran->lingkar_keris }}"
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
                                    <label><h6>Lingkar Lutut :</h6> </label>
                                    <input id="lingkar_lutut" type="text"
                                        class="form-control @error('lingkar_lutut') is-invalid @enderror"
                                        name="lingkar_lutut" value="{{ $detailpemesanan->ukuran->lingkar_lutut }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_lutut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Lingkar Paha :</h6> </label>
                                    <input id="lingkar_paha" type="text"
                                        class="form-control @error('lingkar_paha') is-invalid @enderror"
                                        name="lingkar_paha" value="{{ $detailpemesanan->ukuran->lingkar_paha}}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_paha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Panjang Celana :</h6> </label>
                                    <input id="panjang_celana" type="text"
                                        class="form-control @error('panjang_celana') is-invalid @enderror"
                                        name="panjang_celana" value="{{ $detailpemesanan->ukuran->panjang_celana}}"
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
                                    <label><h6>Lebar Bawah :</h6> </label>
                                    <input id="lebar_bawah" type="text"
                                        class="form-control @error('lebar_bawah') is-invalid @enderror"
                                        name="lebar_bawah" value="{{ $detailpemesanan->ukuran->lebar_bawah }}"
                                        autocomplete="name" autofocus>

                                    @error('lebar_bawah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        @endif
                        
                        @if($detailpemesanan->produk->kategori->nama_kategori=='Rok')
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Lingkar Pinggang :</h6> </label>
                                    <input id="lingkar_pinggang" type="text"
                                        class="form-control @error('lingkar_pinggang') is-invalid @enderror"
                                        name="lingkar_pinggang" value="{{ $detailpemesanan->ukuran->lingkar_pinggang }}"
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
                                    <label><h6>Panjang Rok :</h6> </label>
                                    <input id="panjang_celana" type="text"
                                        class="form-control @error('panjang_celana') is-invalid @enderror"
                                        name="panjang_celana" value="{{ $detailpemesanan->ukuran->panjang_celana }}"
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
                                    <label><h6>Lebar Bawah :</h6> </label>
                                    <input id="lebar_bawah" type="text"
                                        class="form-control @error('lebar_bawah') is-invalid @enderror"
                                        name="lebar_bawah" value="{{ $detailpemesanan->ukuran->lebar_bawah}}"
                                        autocomplete="name" autofocus>

                                    @error('lebar_bawah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        @endif

                        @if($detailpemesanan->produk->kategori->nama_kategori=='Jas')
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Panjang Bahu :</h6> </label>
                                    <input id="panjang_bahu" type="text"
                                        class="form-control @error('panjang_bahu') is-invalid @enderror"
                                        name="panjang_bahu" value="{{ $detailpemesanan->ukuran->panjang_bahu }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_bahu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Panjang Lengan :</h6> </label>
                                    <input id="panjang_lengan" type="text"
                                        class="form-control @error('panjang_lengan') is-invalid @enderror"
                                        name="panjang_lengan" value="{{ $detailpemesanan->ukuran->panjang_lengan }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_lengan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Panjang Baju :</h6> </label>
                                    <input id="panjang_baju" type="text"
                                        class="form-control @error('panjang_baju') is-invalid @enderror"
                                        name="panjang_baju" value="{{ $detailpemesanan->ukuran->panjang_baju }}"
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
                                    <label><h6>Lingkar Dada :</h6> </label>
                                    <input id="lingkar_dada" type="text"
                                        class="form-control @error('lingkar_dada') is-invalid @enderror"
                                        name="lingkar_dada" value="{{ $detailpemesanan->ukuran->lingkar_dada }}"
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
                                    <label><h6>Lingkar Lengan :</h6> </label>
                                    <input id="lingkar_lengan" type="text"
                                        class="form-control @error('lingkar_lengan') is-invalid @enderror"
                                        name="lingkar_lengan" value="{{ $detailpemesanan->ukuran->lingkar_lengan }}"
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
                                    <label><h6>Lingkar Ketiak :</h6> </label>
                                    <input id="lingkar_ketiak" type="text"
                                        class="form-control @error('lingkar_ketiak') is-invalid @enderror"
                                        name="lingkar_ketiak" value="{{ $detailpemesanan->ukuran->lingkar_ketiak }}"
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
                                    <label><h6>Lingkar Leher :</h6> </label>
                                    <input id="lingkar_leher" type="text"
                                        class="form-control @error('lingkar_leher') is-invalid @enderror"
                                        name="lingkar_leher" value="{{ $detailpemesanan->ukuran->lingkar_leher }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_leher')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Lingkar Perut :</h6> </label>
                                    <input id="lingkar_perut" type="text"
                                        class="form-control @error('lingkar_perut') is-invalid @enderror"
                                        name="lingkar_perut" value="{{ $detailpemesanan->ukuran->lingkar_perut }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_perut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        @endif

                        @if($detailpemesanan->produk->kategori->nama_kategori=='Kemeja')
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Panjang Bahu :</h6> </label>
                                    <input id="panjang_bahu" type="text"
                                        class="form-control @error('panjang_bahu') is-invalid @enderror"
                                        name="panjang_bahu" value="{{ $detailpemesanan->ukuran->panjang_bahu }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_bahu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Panjang Lengan :</h6> </label>
                                    <input id="panjang_lengan" type="text"
                                        class="form-control @error('panjang_lengan') is-invalid @enderror"
                                        name="panjang_lengan" value="{{ $detailpemesanan->ukuran->panjang_lengan }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_lengan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Panjang Baju :</h6> </label>
                                    <input id="panjang_baju" type="text"
                                        class="form-control @error('panjang_baju') is-invalid @enderror"
                                        name="panjang_baju" value="{{ $detailpemesanan->ukuran->panjang_baju }}"
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
                                    <label><h6>Lingkar Dada :</h6> </label>
                                    <input id="lingkar_dada" type="text"
                                        class="form-control @error('lingkar_dada') is-invalid @enderror"
                                        name="lingkar_dada" value="{{ $detailpemesanan->ukuran->lingkar_dada }}"
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
                                    <label><h6>Lingkar Lengan :</h6> </label>
                                    <input id="lingkar_lengan" type="text"
                                        class="form-control @error('lingkar_lengan') is-invalid @enderror"
                                        name="lingkar_lengan" value="{{ $detailpemesanan->ukuran->lingkar_lengan }}"
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
                                    <label><h6>Lingkar Ketiak :</h6> </label>
                                    <input id="lingkar_ketiak" type="text"
                                        class="form-control @error('lingkar_ketiak') is-invalid @enderror"
                                        name="lingkar_ketiak" value="{{ $detailpemesanan->ukuran->lingkar_ketiak }}"
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
                                    <label><h6>Lingkar Leher :</h6> </label>
                                    <input id="lingkar_leher" type="text"
                                        class="form-control @error('lingkar_leher') is-invalid @enderror"
                                        name="lingkar_leher" value="{{ $detailpemesanan->ukuran->lingkar_leher }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_leher')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br>
                        @endif

                        @if($detailpemesanan->produk->kategori->nama_kategori=='Seragam')
                        <div class="heading">
                            <h6>Atasan</h6>
                            <hr style="height:5px;color:black;background-color:black">
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Panjang Bahu :</h6> </label>
                                    <input id="panjang_bahu" type="text"
                                        class="form-control @error('panjang_bahu') is-invalid @enderror"
                                        name="panjang_bahu" value="{{ $detailpemesanan->ukuran->panjang_bahu }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_bahu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div> 

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Panjang Lengan :</h6> </label>
                                    <input id="panjang_lengan" type="text"
                                        class="form-control @error('panjang_lengan') is-invalid @enderror"
                                        name="panjang_lengan" value="{{ $detailpemesanan->ukuran->panjang_lengan }}"
                                        autocomplete="name" autofocus>

                                    @error('panjang_lengan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Panjang Baju :</h6> </label>
                                    <input id="panjang_baju" type="text"
                                        class="form-control @error('panjang_baju') is-invalid @enderror"
                                        name="panjang_baju" value="{{ $detailpemesanan->ukuran->panjang_baju }}"
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
                                    <label><h6>Lingkar Dada :</h6> </label>
                                    <input id="lingkar_dada" type="text"
                                        class="form-control @error('lingkar_dada') is-invalid @enderror"
                                        name="lingkar_dada" value="{{ $detailpemesanan->ukuran->lingkar_dada }}"
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
                                    <label><h6>Lingkar Lengan :</h6> </label>
                                    <input id="lingkar_lengan" type="text"
                                        class="form-control @error('lingkar_lengan') is-invalid @enderror"
                                        name="lingkar_lengan" value="{{ $detailpemesanan->ukuran->lingkar_lengan }}"
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
                                    <label><h6>Lingkar Ketiak :</h6> </label>
                                    <input id="lingkar_ketiak" type="text"
                                        class="form-control @error('lingkar_ketiak') is-invalid @enderror"
                                        name="lingkar_ketiak" value="{{ $detailpemesanan->ukuran->lingkar_ketiak }}"
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
                                    <label><h6>Lingkar Leher :</h6> </label>
                                    <input id="lingkar_leher" type="text"
                                        class="form-control @error('lingkar_leher') is-invalid @enderror"
                                        name="lingkar_leher" value="{{ $detailpemesanan->ukuran->lingkar_leher }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_leher')
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
                                    <label><h6>Lingkar Pinggang :</h6> </label>
                                    <input id="lingkar_pinggang" type="text"
                                        class="form-control @error('lingkar_pinggang') is-invalid @enderror"
                                        name="lingkar_pinggang" value="{{ $detailpemesanan->ukuran->lingkar_pinggang }}"
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
                                    <label><h6>Lingkar Keris :</h6> </label>
                                    <input id="lingkar_keris" type="text"
                                        class="form-control @error('lingkar_keris') is-invalid @enderror"
                                        name="lingkar_keris" value="{{ $detailpemesanan->ukuran->lingkar_keris }}"
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
                                    <label><h6>Lingkar Lutut :</h6> </label>
                                    <input id="lingkar_lutut" type="text"
                                        class="form-control @error('lingkar_lutut') is-invalid @enderror"
                                        name="lingkar_lutut" value="{{ $detailpemesanan->ukuran->lingkar_lutut }}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_lutut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Lingkar Paha :</h6> </label>
                                    <input id="lingkar_paha" type="text"
                                        class="form-control @error('lingkar_paha') is-invalid @enderror"
                                        name="lingkar_paha" value="{{ $detailpemesanan->ukuran->lingkar_paha}}"
                                        autocomplete="name" autofocus>

                                    @error('lingkar_paha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label><h6>Panjang Celana :</h6> </label>
                                    <input id="panjang_celana" type="text"
                                        class="form-control @error('panjang_celana') is-invalid @enderror"
                                        name="panjang_celana" value="{{ $detailpemesanan->ukuran->panjang_celana}}"
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
                                    <label><h6>Lebar Bawah :</h6> </label>
                                    <input id="lebar_bawah" type="text"
                                        class="form-control @error('lebar_bawah') is-invalid @enderror"
                                        name="lebar_bawah" value="{{ $detailpemesanan->ukuran->lebar_bawah }}"
                                        autocomplete="name" autofocus>

                                    @error('lebar_bawah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div><br><br>
                        @endif
                        <div class="row wow fadeIn" id="top" data-wow-duration="4s" data-wow-delay="0.5s">
                            <div class="col" >
                                <button type="submit" class="btn btn-dark btn-block"><i class="fas fa-shopping-cart"></i>  IUpdate Keranjang</button>
                            </div>
                        </div>
                    </form><br><br>

                    
                </div>
            </div>
            <!-- ***** End form order ***** -->  
        </div>
    </div>
</div>

<!-- ***** footer ***** -->
<footer id="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Bergabunglah dengan email kami untuk menerima berita &amp; promo terbaru</h4>
          </div>
        </div>
        <div class="col-lg-6 offset-lg-3">
          <form id="search" action="#" method="GET">
            <div class="row">
              <div class="col-lg-6 col-sm-6">
                <fieldset>
                  <input type="address" name="address" class="email" placeholder="Alamat Email..." autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6 col-sm-6">
                <fieldset>
                  <button type="submit" class="main-button">Langganan <i class="fa fa-angle-right"></i></button>
                </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4">
          <div class="footer-widget">
            <h4>Kontak Kami</h4>
            <p>San Tailor</p>
            <p>Jl. Silikat No.50A, Kota Malang</p>
            <p><a href="#">08123456789</a></p>
            <p><a href="#">santailor@gmail.com</a></p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer-widget">
            <h4>Tentang Kami</h4>
            <p>
            San Tailor merupakan penjahit yang melayani jasa menjahit 
            pakaian dari kemeja, seragam sekolah, celana, rok, sampai jas, 
            baik untuk laki-laki maupun perempuan. 
            </p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer-widget">
            <h4>About Our Company</h4>
            <div class="logo">
              <img src="assets/logo.png" alt="">
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="copyright-text">
            <p>Copyright © 2022 San Tailor. All Rights Reserved. 
              <br> 
              <!-- Design: <a href="https://templatemo.com/" target="_blank" title="css templates">TemplateMo</a> -->
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
@endsection