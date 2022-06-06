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

    <style>
        b {
            color: #4b8ef1;
        }
        p {
            color: #504e4e;
        }
        .btns{
            font-family: 'Roboto', sans-serif;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            font-weight: 500;
            color: #fff;
            background-color: #3490dc;
            border: none;
            border-radius: 45px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
        }
        .btns:hover {
            background-color: #2EE59D;
            box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
            color: #fff;
            transform: translateY(-7px);
        }
        .edit{
            background-color: white; 
            color: black; 
            border: 2px solid #008CBA;
        }
        .edit:hover{
            background-color: #008CBA;
            color: white;
        }
        .hapus{
            background-color: white; 
            color: black; 
            border: 2px solid #f44336;
        }
        .hapus:hover{
            background-color: #f44336;
            color: white;
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
                <li class="scroll-to-section"><a href="{{ route('riwayat') }}">Pesanan</a></li>
                <li class="scroll-to-section"><a href="{{ route('keranjang') }}" class="active">Keranjang</a></li>
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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>

        <div class="row" style="margin-top: 120px;">
            <div class="col">
                <div class="table-responsive">
                    <table class="table mb-0 text-center">
                        <thead class="table" style="background: #35A9DB;  color: #fff;  font-weight: normal; ">
                            <tr>
                                <td>No.</td>
                                <td>Kategori</td>
                                <td>Produk</td>
                                <td>Jumlah</td>
                                <td>Harga</td>
                                <td>Aksi</td>
                                <td><strong>Sub Total</strong></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @forelse ($detail_pemesanan as $detail_pemesanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $detail_pemesanan->produk->kategori->nama_kategori }}</td>
                                <td>{{ $detail_pemesanan->produk->nama_produk }}</td>
                                <td>{{ $detail_pemesanan->jumlah }}</td>
                                <td>Rp. {{ number_format($detail_pemesanan->produk->harga) }}</td>
                                <td>
                                    <a href="/pelanggan/keranjang/{{$detail_pemesanan->id_detailpemesanan}}/ubah">
                                        <button class="edit">
                                            <i class="fa fa-edit"></i> Ubah&nbsp;
                                        </button>
                                    </a>
                                        <form action="/pelanggan/keranjang/{{$detail_pemesanan->id_detailpemesanan}}" method="post"  style="margin-top:5px;>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="hapus">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    
                                </td>
                                <td class="text-left"><strong>Rp. {{ number_format($detail_pemesanan->subtotal) }}</strong></td>
                                
                            </tr>    
                            @empty
                            <tr>
                                <td colspan="7">Data Kosong</td>
                            </tr>   
                            @endforelse
                        
                            @if(!empty($pemesanan))
                                <tr>
                                    <td colspan="6" align="right"><strong>Total Yang Harus dibayarkan : </strong></td>
                                    <td align="center"><strong>Rp. {{ number_format($pemesanan->total_pemesanan) }}</strong> </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="6"></td>
                                    <td colspan="2">
                                        <div class="gradient-button">
                                            <a href="{{ route('checkout')}}" class="btns btn-xs ">
                                                <i class="fa fa-arrow-right"></i> Check Out
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
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
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js')}}"></script>
    <script src="{{ asset('assets/js/animation.js')}}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js')}}"></script>
    <script src="{{ asset('assets/js/popup.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
  
</body>
</html>