<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href=" " class="logo">
              <img src="assets/logo.png" alt=" ">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Beranda</a></li>
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
            <li><div class="gradient-button"><a id="modal_trigger" href="#">
                <i class="fa fa-sign-in-alt"></i> {{ Auth::user()->name }}</a></div></li> 
            </ul> 
            <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
            </a>
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
  
  <div id="modal" class="popupContainer" style="display:none;">
    <div class="popupHeader">
        <span class="header_title">Login</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </div>

    <section class="popupBody">
        <!-- Social Login -->
        <div class="social_login">
            <div class="">
                <a href="#" class="social_box fb">
                    <span class="icon"><i class="fab fa-facebook"></i></span>
                    <span class="icon_title">Connect with Facebook</span>

                </a>

                <a href="#" class="social_box google">
                    <span class="icon"><i class="fab fa-google-plus"></i></span>
                    <span class="icon_title">Connect with Google</span>
                </a>
            </div>

            <div class="centeredText">
                <span>Or use your Email address</span>
            </div>

            <div class="action_btns">
                <div class="one_half"><a href="#" id="login_form" class="btn">Login</a></div>
                <div class="one_half last"><a href="#" id="register_form" class="btn">Sign up</a></div>
            </div>
        </div>
    </section>
</div>