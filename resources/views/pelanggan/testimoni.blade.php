<div id="clients" class="the-clients">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 offset-lg-2">
        <div class="section-heading">
          <h4>Testimoni <em> Pelanggan </em> San Tailor</h4>
          <img src="assets/images/heading-line-dec.png" alt="">
          <p>Berikut merupakan testimoni pelanggan San Tailor yang sudah pernah order.</p>
        </div>
      </div>

      <div class="col-lg-12">
        <div class="naccs">
          <div class="grid">
            <div class="row">
              <div class="col-lg-7 align-self-center">
                <div class="menu">
                  @foreach($testimoni as $index => $item)
                  <div class="first-thumb active">
                    <div class="thumb">
                      <div class="row">
                        <div class="col-lg-4 col-sm-4 col-12">
                          <h4>{{$item->pemesanan->pelanggan->name }}</h4>
                          <span class="date">{{$item->pemesanan->tanggal_pemesanan }}</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-12">
                              <span class="rating">{{$item->pemesanan->pelanggan->email}}</span>
                          </div>
                        <div class="col-lg-4 col-sm-4 d-none d-sm-block">
                          <span class="category">{{$item->pemesanan->pelanggan->alamat}}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
              <div class="col-lg-5">
                <ul class="nacc">
                  @foreach($testimoni as $index => $item)
                  <li class="active">
                    <div>
                      <div class="thumb">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="client-content">
                              <img src="assets/images/quote.png" alt="">
                              <p>{{$item->isi_testimoni}}</p>
                            </div>
                            <div class="down-content">
                              <div class="right-content">
                                <h4>{{$item->pemesanan->pelanggan->name }}</h4>
                                <span>{{$item->pemesanan->pelanggan->alamat}}</span>
                              </div>
                            </div>
                          </div>
                         </div>
                      </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>