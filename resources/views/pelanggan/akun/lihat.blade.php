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

              <div class="row" style="margin-top: 120px;">
                <div class="col-lg-12">
                    <div class="section-heading wow fadeIn" id="top" data-wow-duration="2s" data-wow-delay="1s">
                        <center><h4>Profil</h4>
                        <img src="{{ asset('assets/images/heading-line-dec.png')}}" alt="">
                        <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span>
                        <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span></center>
                    </div>
                    <br><br>
                    <!-- <div class="sidenav">
                      <div class="profile">
                        <div class="name">
                          {{ Auth::user()->name }}
                        </div>
                      </div>
                    </div> -->
                    <div class="card card-info card-outline">
                        <div class="card-body">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->name}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->email}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->alamat}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomorhp" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->nomorhp}}
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <a class="btn" href="{{ route('ubah.akun', Auth::user()->id) }}">Edit Akun</a>
                              <a class="btn" href="/">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
