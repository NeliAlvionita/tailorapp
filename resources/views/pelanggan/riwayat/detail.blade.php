<!-- @extends('pelanggan.layouts.app')
@section('content') -->
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
    </section>
</div>
 <div class="row" style="margin-top: 120px;">
<div class="card card-info ">
    <div class="card-body p-0">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Pemesanan</th>
                    <th>Pelanggan</th>
                    <th>Pengiriman</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tanggal: {{ $pemesanan->tanggal_pemesanan }}</td>
                    <td>Nama: {{ $pemesanan->pelanggan->name }}</td>
                    <td rowspan="3">Alamat: {{ $pemesanan->alamat_pengiriman }}</td>
                </tr>
                <tr>
                    <td>Total: {{ $pemesanan->total_pemesanan}}</td>
                    <td>Nomor Hp: {{ $pemesanan->pelanggan->nomorhp }}</td>
                </tr>
                <tr>
                    <td>Status: {{ $pemesanan->status_pemesanan }}</td>
                    <td>Email: {{ $pemesanan->pelanggan->email }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card card-info card-outline">
    <div class="card-body p-0">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Sub Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pemesanan->detail_pemesanan as $index => $item)
            <tr>
              <td>{{$index + 1}}</td>
              <td>{{$item->produk->nama_produk}}</td>
              <td>{{$item->produk->harga}}</td>
              <td>{{$item->jumlah}}</td>
              <td>{{$item->subtotal}}</td>
              <td>
                  <div class="gradient-button">
                <a class="btn" href="/pelanggan/riwayat/detail/{{$item->id_detailpemesanan}}">Detail Pemesanan</a>
                </div>
            </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4"><strong>Total Pembayaran : </strong></td>
                <td align="left"><strong>Rp. {{ number_format($pemesanan->total_pemesanan) }}</strong> </td>
                <td></td>
            </tr>
          </tbody>
      </table>
      @if($pemesanan->pembayaran->status_pembayaran=='Belum Lunas')
      <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <p>Untuk kekurangan pembayaran sebanyak Rp. {{ number_format($pemesanan->total_pemesanan-$pemesanan->pembayaran->jumlah) }} silahkan dapat transfer di rekening dibawah ini : </p>
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0">BANK BRI</h5>
                            No. Rekening 012345-678-910 atas nama <strong>San Tailor</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
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
  
  <!-- @endsection -->