<div id="clients" class="the-clients">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Testimoni <em> Pelanggan </em> San Tailor</h4>
            <img src="assets/images/heading-line-dec.png" alt="">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor incididunt ut labore et dolore magna.</p>
          </div>
        </div>
        <div class="col-lg-15">
          <div class="naccs">
              <div class="row">
                  <div class="menu">
                    @foreach($testimoni as $index => $item)
                    <div>
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-4 col-sm-4 col-12">
                            <h4>{{$item->pemesanan->pelanggan->name }}</h4>
                            <span class="date">{{$item->pemesanan->tanggal_pemesanan }}</span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">
                              {{$item->pemesanan->pelanggan->alamat}}
                            </span>
                          </div>
                          <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                            <span class="category">{{$item->isi_testimoni}}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>         
              </div>
            </div>
          </div>
        </div>
      </div>