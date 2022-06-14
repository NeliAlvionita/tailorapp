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
                      <form action="{{route('checkoutfix')}}" class="horizontal" role="form" method="POST">
                            @csrf
                            <div class="col">
                              <h4>Informasi Pengiriman</h4>
                              <hr>
                              {{-- <div class="form-group">
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
                              </div> --}}
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