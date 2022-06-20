@extends('pelanggan.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-12">
          @include('pelanggan.layouts.header')
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
                    <div class="row mt-4">
                      <div class="col">
                          <div class="table-responsive shadow">
                              <table class="table mb-0 text-center">
                                  <thead class="table" style="background: #35A9DB;  color: #fff;  font-weight: normal; ">
                                      <tr>
                                          <td>No.</td>
                                          <td>Kategori</td>
                                          <td>Produk</td>
                                          <td>Jumlah</td>
                                          <td>Harga</td>
                                          <td>Biaya Tambahan</td>
                                          <td><strong>Sub Total</strong></td>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php $no = 1 ?>
                                      @foreach ($pemesanan->detail_pemesanan as $detail_pemesanan)
                                      <tr>
                                          <td>{{ $no++ }}</td>
                                          <td>{{ $detail_pemesanan->produk->kategori->nama_kategori }}</td>
                                          <td>{{ $detail_pemesanan->produk->nama_produk }}</td>
                                          <td>{{ $detail_pemesanan->jumlah }}</td>
                                          <td>Rp. {{ number_format($detail_pemesanan->produk->harga) }}</td>
                                          <td>Rp. {{ number_format($detail_pemesanan->biaya_tambahan) }} /pcs</td>
                                          <td class="text-left"><strong>Rp. {{ number_format($detail_pemesanan->subtotal) }}</strong></td>    
                                      </tr> 
                                      @endforeach   
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div><br><br>

                    <div class="row mt-4">
                        <form action="{{route('checkoutfix')}}" class="horizontal" role="form" method="POST">
                            @csrf
                            <div class="col">
                                <h4>Informasi Pengiriman</h4>
                                <hr style="border:3px solid; color:#000000;">
                                <div class="form-group">
                                    <label for="" style="font-weight:bold;">Provinsi Tujuan</label>
                                    <select name="province_destination" class="form-control provinsi-tujuan @error('province_destination') is-invalid @enderror">
                                        <option value=""> --Provinsi-- </option>
                                        @foreach ($provinces as $province => $value)
                                        <option value="{{$province}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    @error('province_destination')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <label for="" style="font-weight:bold;">Kota Tujuan</label>
                                    <select name="city_destination" class="form-control kota-tujuan @error('city_destination') is-invalid @enderror">
                                        <option> --Kota-- </option>
                                    </select>
                                    @error('city_destination')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> <br>
                                <div class="form-group">
                                    <label for="" style="font-weight:bold;">Alamat Lengkap</label>
                                    <textarea name="alamat_pengiriman" rows="5" class="form-control @error('alamat_pengiriman') is-invalid @enderror"></textarea>
                                    @error('alamat_pengiriman')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> <br>
                                <input type="hidden" name="total_berat" value={{ $pemesanan->total_berat}}>
                                <input type="hidden" name="tanggal_pemesanan" value="<?php echo date("Y-m-d"); ?>">
                                <div class="gradient-button">
                                    <button type="submit" class="btn btn-success btn-block"> Submit </button>
                                </div>  
                            </div>
                        </form>         
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@include('pelanggan.layouts.footer')
@endsection