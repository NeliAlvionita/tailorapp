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
                        <center><h4>Konfirmasi <em>Pembayaran</em> Uang Muka</h4>
                        <img src="{{ asset('assets/images/heading-line-dec.png')}}" alt="">
                        <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span></center>
                    </div>
                    <br><br>
                    <form action="{{route('konfirm_bayar')}}" method="post" enctype="multipart/form-data"> 
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                              
                                <h5>Total Tagihan</h5>
                                <hr style="border:2px solid; color:#000000;">
                                <div class="alert alert-info">
                                    <h6>
                                        Untuk pembayaran uang muka (DP) silahkan dapat transfer di rekening dibawah ini sebesar &nbsp;
                                        <strong style="font-size:20px;">Rp. {{ number_format($uangmuka) }}</strong>
                                    </h6><br>
                                  
                                  <h6>BANK BRI</h6>
                                  No. Rekening 012345-678-910 atas nama <strong>San Tailor</strong><br><br>
                                  <h6>BANK BCA</h6>
                                  No. Rekening 016789-234-510 atas nama <strong>San Tailor</strong><br>
                                </div>

                                <input type="hidden" name="id_pemesanan" value={{ $pemesanan->id_pemesanan}}>
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
                                    autocomplete="jumlah" value={{$uangmuka}}>
                                    <input type="hidden" name="jumlah" value={{ $uangmuka}}>
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
                                <button type="submit" class="btn btn-success btn-block"> <i class="fas fa-arrow-right">&nbsp;</i> Submit</button>
                              </div>
                          
                            
                          </div>    
                    </div><br><br>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('pelanggan.layouts.footer')
@endsection