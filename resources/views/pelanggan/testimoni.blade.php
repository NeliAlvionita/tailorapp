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
            <a href=" " class="logo">
              <img src="{{asset('assets/logo.png')}}" alt=" ">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="/">Beranda</a></li>
              <li class="scroll-to-section"><a href="/pelanggan/produk">Katalog</a></li>
              <li class="scroll-to-section"><a href="{{ route('produk') }}">Layanan
                  <ul class="dropdown-menu">
                    {{-- @foreach ($kategori as $index => $item)
                    <li><a href="{{ route('produk.kategori', $item->id_kategori) }}">
                        {{$item->nama_kategori}}</a>
                    </li>
                    @endforeach --}}
                    <a class="dropdown-item" href="{{ route('produk') }}">Semua Kategori</a>
                  </ul>
              </li>
              <li class="scroll-to-section">
                <a href="{{ route('riwayat') }}">Pesanan</a>
                <!-- <ul>
                  <li>Status Pemesanan</li>
                </ul> -->
              </li>
              <li class="scroll-to-section"><a href="{{ route('keranjang') }}">Keranjang</a></li>
              @guest
              <li><div class="gradient-button"><a id="modal_trigger" href="{{ route('login') }}">
                <i class="fa fa-sign-in-alt"></i> Masuk</a></div></li> 
            </ul>   
            @else  
            <li>
            <div class="gradient-button"><a id="modal_trigger" href="#">
                                            <i class="fa fa-sign-in-alt"></i> {{ Auth::user()->name }}</a>
                                        </div>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                            </li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                            </form>
                                            @endguest  
                                        </ul>
            </li> 
            </ul>   
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

  <div class="row" style="margin-top:120px;">
  <div class="col col-lg-3">
  <h1>Sek nel bijim ntar tinggal taro front end nya aku ws biin.. ujian dulu</h1>
  </div>
     
  </div>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js')}}"></script>
    <script src="{{ asset('assets/js/animation.js')}}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js')}}"></script>
    <script src="{{ asset('assets/js/popup.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
  </body>
</html>