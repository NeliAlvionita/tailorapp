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


            <div class="row" style="margin-top: 120px;">
                <div class="col-lg-12">
                    <div class="section-heading wow fadeIn" id="top" data-wow-duration="2s" data-wow-delay="1s">
                        <center><h4><em>Checkout</em> </h4>
                        <img src="{{ asset('assets/images/heading-line-dec.png')}}" alt="">
                        <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span></center>
                    </div>
                    <br><br>
                    <form action="{{route('checkout')}}" method="post" enctype="multipart/form-data"> 
                        @csrf
                    <div class="row mt-4">
                        <div class="col">
                            <h4>Total Tagihan</h4>
                            <hr>
                            <div class="alert alert-info">
                              <h5>
                                Untuk pembayaran silahkan dapat transfer di rekening dibawah ini sebesar <strong> Rp. {{ number_format($pemesanan->total_pemesanan) }}</strong> 
                              </h5><br>
                              <h6>BANK BRI</h6>
                              No. Rekening 012345-678-910 atas nama <strong>San Tailor</strong><br><br>
                              <h6>BANK BCA</h6>
                              No. Rekening 016789-234-510 atas nama <strong>San Tailor</strong><br>
                            </div>

                            <input type="hidden" name="tanggal_pemesanan" value="<?php echo date("Y-m-d"); ?>">
                            <div class="form-group">
                                <label for="">Nama Penyetor</label>
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                autocomplete="nama" autofocus>
                
                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Bank</label>
                                <input id="bank" type="text" class="form-control @error('bank') is-invalid @enderror" name="bank"
                                autocomplete="bank" autofocus>
                
                                @error('bank')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input id="jumlah" type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                                autocomplete="jumlah" autofocus>
                
                                @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Tanggal Pembayaran</label>
                                <input id="tanggal_pembayaran" type="date" class="form-control @error('tanggal_pembayaran') is-invalid @enderror" name="tanggal_pembayaran"
                                autocomplete="tanggal_pembayaran" autofocus>
                
                                @error('tanggal_pembayaran')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div><br>
                            <div class="form-group">
                                <label for="">Bukti</label>
                                <input id="bukti" type="file" class="form-control @error('bukti') is-invalid @enderror" name="bukti"
                                autocomplete="bukti" autofocus>
                
                                @error('bukti')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div><br>
                        <div class="col">
                            <h4>Informasi Pengiriman</h4>
                            <hr>
                
                                <div class="form-group">
                                    <h6>Alamat Pengiriman :</h6>
                                    <textarea name="alamat_pengiriman" rows="5" class="form-control @error('alamat_pengiriman') is-invalid @enderror"></textarea>
                
                                    @error('alamat_pengiriman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>    
                        </div>
                    </div><br><br>
                    <div class="gradient-button">
                      <button type="submit" class="btn btn-success btn-block"> <i class="fas fa-arrow-right"></i> Checkout </button>
                    </div>
                  </form>
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