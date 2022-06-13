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
                    <br><br>
                        <div class="row mt-4">
                            <div class="col">
                              <form action="/ongkir" class="horizontal" role="form" method="POST">
                                @csrf
                              <h4>Informasi Pengiriman</h4>
                              <hr>
                                  <div class="form-group">
                                      <label for="">Provinsi Asal</label>
                                      <select  name="province_origin" class="form-control provinsi-asal">
                                          <option value=""> --Provinsi-- </option>
                                          @foreach ($provinces as $province => $value)
                                          <option value="{{$province}}">{{$value}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Kota Asal</label>
                                    <select name="city_origin" class="form-control kota-asal">
                                        <option> --Kota-- </option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Provinsi Tujuan</label>
                                    <select name="province_destination" class="form-control provinsi-tujuan">
                                        <option value=""> --Provinsi-- </option>
                                        @foreach ($provinces as $province => $value)
                                        <option value="{{$province}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Kota Tujuan</label>
                                    <select name="city_destination" class="form-control kota-tujuan">
                                        <option> --Kota-- </option>
                                    </select>
                                  </div> <br>
                                  <div class="form-group">
                                      <h6>Alamat Lengkap :</h6>
                                      <textarea name="alamat_pengiriman" rows="5" class="form-control @error('alamat_pengiriman') is-invalid @enderror"></textarea>
                  
                                      @error('alamat_pengiriman')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div> <br>
                                  <input type="hidden" name="total_berat" value={{ $pemesanan->total_berat}}>
                                  <div class="gradient-button">
                                    <button type="submit" class="btn btn-success btn-block"> Submit Alamat </button>
                                  </div>  
                              </form>
                            </div>
                            <div class="col">
                              <form action="{{route('checkout')}}" method="post" enctype="multipart/form-data"> 
                                @csrf
                                <h4>Total Tagihan</h4>
                                <hr>
                                <div class="alert alert-info">
                                  @if($pemesanan->alamat_pengiriman == NULL)
                                  <h5>
                                    Submit pengiriman terlebih dahulu untuk mendapatkan biaya ongkos kirim</Datag>
                                  </h5><br>
                                  @else
                                  <h5>
                                    Untuk pembayaran silahkan dapat transfer di rekening dibawah ini sebesar <strong> Rp. {{ number_format($pemesanan->total_pemesanan+$pemesanan->biaya_ongkir) }}</strong> 
                                  </h5><br>
                                  <h6> Total pemesanan : <strong> Rp. {{ number_format($pemesanan->total_pemesanan) }} </strong></h6>
                                  Ongkor kirim : <strong>Rp. {{ number_format($pemesanan->biaya_ongkir) }}</strong><br><br>
                                  <h6>BANK BRI</h6>
                                  No. Rekening 012345-678-910 atas nama <strong>San Tailor</strong><br><br>
                                  <h6>BANK BCA</h6>
                                  No. Rekening 016789-234-510 atas nama <strong>San Tailor</strong><br>
                                  @endif
                                </div>

                                <input type="hidden" name="tanggal_pemesanan" value="<?php echo date("Y-m-d"); ?>">
                                <div class="col-lg-12">
                                <div class="form-group col-lg-12">
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
                                    <input id="jumlah" type="text"  disabled class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                                    autocomplete="jumlah" value={{$pemesanan->total_pemesanan+$pemesanan->biaya_ongkir}}>
                                    <input type="hidden" name="jumlah" value={{ $pemesanan->total_pemesanan+$pemesanan->biaya_ongkir}}>
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
                                </div> <br>
                              <div class="gradient-button">
                                <button type="submit" class="btn btn-success btn-block"> <i class="fas fa-arrow-right"></i> Checkout </button>
                              </div>
                            </form>
                            
                          </div>    
                    </div><br><br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('pelanggan.layouts.footer')
@endsection