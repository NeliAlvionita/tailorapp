<footer id="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Social Media San Tailor</h4>
          </div>
        </div>
        <div class="col-lg-6 offset-lg-3">
          <form id="search">
            <div class="row">
              <div class="col-lg-4 col-sm-4">
                <a class="social-media-icon" href="https://link_social_mendia_anda" style="text-shadow: 1px 1px 1px #ccc;font-size: 3em; color:#fff;">
                  <span class="fab fa-facebook"></span>
                </a>
              </div>
              <div class="col-lg-4 col-sm-4">
                <a class="social-media-icon" href="https://link_social_mendia_anda" style="text-shadow: 1px 1px 1px #ccc;font-size: 3em; color:#fff;">
                  <span class="fab fa-instagram"></span>
                </a>
              </div>
              <div class="col-lg-4 col-sm-4">
                <a class="social-media-icon" href="https://api.whatsapp.com/send?phone=6281339908155" style="text-shadow: 1px 1px 1px #ccc;font-size: 3em; color:#fff;">
                  <span class="fab fa-whatsapp"></span>
                </a>
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
            <h4>Teknologi Informasi Politeknik Negeri Malang</h4>
            <div class="logo">
              <img src="{{ asset('assets/polinema.png') }}" alt="">
              <span>&nbsp;<img src="{{ asset('assets/logojti.png') }}" alt=""></span>
            </div>
            <p>Chafidhoturrochimah / 1931710013 <br> Neli Alvionita / 1931710087</p>
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