<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>San Tailor</title>

    <!-- fav icons -->
    <link rel="shortcut icon" href="{{ asset('assets/logo1.png')}}">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/template.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

    <a href="https://api.whatsapp.com/send?phone=6281339908155">
      <img src="https://hantamo.com/free/whatsapp.svg" class="wabutton" alt="Whatsapp-Button" />
    </a>
    <style>
      b {
        color: #4b8ef1;
      }
      p {
        color: #504e4e;
      }
      .wabutton{
        width:50px;
        height:50px;
        position:fixed;
        bottom:20px;
        right:20px;
        z-index:100;
      }
    </style>

  </head>
  <body>

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

<script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js')}}"></script>
    <script src="{{ asset('assets/js/animation.js')}}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js')}}"></script>
    <script src="{{ asset('assets/js/popup.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
  </body>
</html>