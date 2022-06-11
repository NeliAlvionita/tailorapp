@extends('pelanggan.layouts.app')
@section('content')
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
          <li class="scroll-to-section"><a href="{{ route('riwayat') }}" class="active">Pesanan</a></li>
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
@if (session('message'))
<div class="alert alert-success alert-dismissible">
  {{ session('message') }}
</div>
@endif

<div class="container">

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row" style="margin-top: 120px;">
        <div class="col">
            <div class="section-heading wow fadeIn" id="top" data-wow-duration="2s" data-wow-delay="1s">
                <center><h4>Detail <em> Pesanan</em> </h4>
                <img src="{{ asset('assets/images/heading-line-dec.png')}}" alt="">
                <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span>
                <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span></center>
            </div>
            <br><br>

            <form> 
                <div class="row ">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><h6> Kategori :</h6></label>
                            <input type="text" name="kategori" class="form-control" placeholder="{{ $detail->produk->kategori->nama_kategori }}" readonly>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><h6> Nama Produk :</h6></label>
                            <input type="text" name="produk" class="form-control" placeholder="{{ $detail->produk->nama_produk }}" readonly>
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
                            <label><h6> Jumlah Pesanan :</h6></label>
                            <input type="text" name="jumlah" readonly class="form-control" placeholder="{{ $detail->jumlah }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><h6> Catatan :</h6></label>
                            <input type="text" name="catatan" readonly class="form-control" placeholder="{{ $detail->ukuran->catatan }}" rows="3" >
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <strong>Model Baju yang akan dibuat :</strong>
                        </div>
                        <img src="/foto_model/{{ $detail->ukuran->foto_model }}" width="50"> 
                    </div>
                </div><br><br>

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
                        <img src="/gambar_ukuran/{{ $detail->produk->kategori->gambar_ukuran }}" class="img-fluid">
                    </div>
                </div><br>

                @if($detail->produk->kategori->nama_kategori=='Celana')
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>Lingkar Pinggang :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_pinggang }}" readonly>
                        </div>
                    </div> 
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>Lingkar Keris :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_keris }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>Lingkar Lutut :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_lutut }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>Lingkar Paha :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_paha }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>Panjang Celana :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_celana }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>Lebar Bawah :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lebar_bawah }}" readonly>
                        </div>
                    </div>
                </div><br>
                @endif

                @if($detail->produk->kategori->nama_kategori=='Rok')
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Pinggang :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_pinggang }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Panjang Rok :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_celana }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lebar Bawah :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lebar_bawah }}" readonly>
                        </div>
                    </div>
                </div><br>
                @endif

                @if($detail->produk->kategori->nama_kategori=='Jas')
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Panjang Bahu :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_bahu }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Panjang Lengan :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_lengan }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Panjang Baju :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_baju }}" readonly>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Dada :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_dada }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Lengan :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_lengan }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Ketiak :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_ketiak }}" readonly>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Leher :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_leher }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Perut :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_perut }}" readonly>
                        </div>
                    </div>
                </div><br>
                @endif

                @if($detail->produk->kategori->nama_kategori=='Kemeja')
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Panjang Bahu :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_bahu }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Panjang Lengan :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_lengan }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Panjang Baju :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_baju }}" readonly>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Dada :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_dada }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Lengan :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_lengan }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Ketiak :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_ketiak }}" readonly>
                        </div>
                    </div>
                </div><br>
                    
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Leher :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_leher }}" readonly>
                        </div>
                    </div>
                </div><br>
                @endif

                @if($detail->produk->kategori->nama_kategori=='Seragam')
                <br>
                <div class="alert alert-success">
                    <h6>Atasan</h6>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Panjang Bahu :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_bahu }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Panjang Lengan :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_lengan }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Panjang Baju :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_baju }}" readonly>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Dada :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_dada }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Lengan :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_lengan }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Ketiak :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_ketiak }}" readonly>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Leher :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_leher }}" readonly>
                        </div>
                    </div>
                </div><br><br>

                <div class="alert alert-success">
                    <h6>Bawahan</h6>
                </div><br>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Pinggang :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_pinggang }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Keris :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_keris }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Lutut :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_lutut }}" readonly>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lingkar Paha :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_paha }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Panjang Celana :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_celana }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>Lebar Bawah :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lebar_bawah }}" readonly>
                        </div>
                    </div>
                </div><br>
                @endif
            </form>
        </div>
    </div>
</div>

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