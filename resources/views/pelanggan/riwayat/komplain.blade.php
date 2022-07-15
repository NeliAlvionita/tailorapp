@extends('pelanggan.layouts.app', ['title' => 'Komplain'])
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-12">
          @include('pelanggan.layouts.header')
            @if($pemesanan->komplain == NULL)
              <div class="row" style="margin-top: 120px;">
                <div class="col-lg-12">
                    <div class="section-heading wow fadeIn" id="top" data-wow-duration="2s" data-wow-delay="1s">
                        <center><h4>Ajukan <em> Komplain</em></h4>
                        <img src="{{ asset('assets/images/heading-line-dec.png')}}" alt="">
                        <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span>
                        <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span></center>
                    </div>
                    <br><br>
                    <div class="card-body">
                        <div class="row mt-4">
                            <div class="col">
                                <h4>Pemesanan No. {{$pemesanan->id_pemesanan }}</h4>
                                <hr>
                                <p>Tanggal Pemesanan : <strong> {{$pemesanan->tanggal_pemesanan}} </p>
                                <p>Total Pemesanan : <strong> {{$pemesanan->total_pemesanan}} </p>
                            </div>
                        </div>
                        <form action="/pelanggan/riwayat/komplain" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pemesanan" value="{{ $pemesanan->id_pemesanan }}">
                        <div class="form-group">
                            <label for="">Masukkan Isi Komplain</label>
                            <input id="isi_komplain" type="text" class="form-control @error('isi_komplain') is-invalid @enderror" name="isi_komplain"
                            autocomplete="isi_komplain" autofocus>
            
                            @error('isi_komplain')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div><br>
                        <div class="form-group">
                            <label for="">Upload Bukti Komplain</label>
                            <input id="bukti_komplain" type="file" class="form-control @error('bukti_komplain') is-invalid @enderror" name="bukti_komplain"
                            autocomplete="bukti_komplain" autofocus>
                            @error('bukti_komplain')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> <br>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
              </div>
            @else
            <div class="row" style="margin-top: 120px;">
                <div class="col-lg-12">
                    <div class="section-heading wow fadeIn" id="top" data-wow-duration="2s" data-wow-delay="1s">
                        <center><h4>Riwayat <em> Komplain</em></h4>
                        <img src="{{ asset('assets/images/heading-line-dec.png')}}" alt="">
                        <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span>
                        <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span></center>
                    </div><br><br>
                    <h5>KOMPLAIN</h5>
                    <div class="row mt-100 wow fadeIn" id="top" data-wow-duration="4s" data-wow-delay="0.5s">
                        <div class="col col-md-6"><br>
                            <div class="card zoom-effect" style="margin-top:10px;">
                                <div class="card-body kotak text-center">
                                    <img src="/bukti_komplain/{{ $pemesanan->komplain->bukti_komplain }}" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="font-family: sans-serif;">
                            <h5> <center> Isi Komplain </center> </h5> <br>
                            <p> {{ $pemesanan->komplain->isi_komplain }}</p><br>
                        </div>
                        <br><br>
                    </div><br><br>
                    <h5>RESPON</h5>
                    <div class="row mt-100 wow fadeIn" id="top" data-wow-duration="4s" data-wow-delay="0.5s">
                        <div class="col col-md-6">
                            <p>Bukti Transfer Return (Jika Komplain Diterima</p>
                            <div class="card zoom-effect" style="margin-top:10px;">
                                <div class="card-body kotak text-center">
                                    @if($pemesanan->komplain->bukti_return == NULL)
                                    -
                                    @else
                                    <img src="/bukti_return/{{ $pemesanan->komplain->bukti_return }}" class="img-fluid">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="font-family: sans-serif;">
                            <h5> Status Komplain:  {{ $pemesanan->komplain->status_komplain }}</h5> <br>
                            <h6> Respon Komplain </h6> <br>
                            <p> {{ $pemesanan->komplain->isi_respon }}</p><br>
                        </div>
                        <br><br>
                    </div>
                    <br><br>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@include('pelanggan.layouts.footer')
@endsection