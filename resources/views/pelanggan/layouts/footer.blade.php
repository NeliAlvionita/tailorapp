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
            <p>{{$footer->nama_toko}}</p>
            <p>{{$footer->alamat_toko}}</p>
            <p><a href="#">{{$footer->nomor_telepon}}</a></p>
            <p><a href="#">{{$footer->email_toko}}</a></p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer-widget">
            <h4>Tentang Kami</h4>
            <p>
            {{$footer->tentang}}
            </p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="footer-widget">
            <h4>About Our Company</h4>
            <div class="logo">
              <img src="{{ asset('assets/logo.png') }}" alt="">
            </div>
            <p></p>
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