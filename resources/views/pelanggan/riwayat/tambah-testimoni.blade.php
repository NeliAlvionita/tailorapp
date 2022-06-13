@extends('pelanggan.layouts.app', ['title' => 'Tambah Testimoni'])
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-12">
          @include('pelanggan.layouts.header')
              <div class="row" style="margin-top: 120px;">
                <div class="col-lg-12">
                    <div class="section-heading wow fadeIn" id="top" data-wow-duration="2s" data-wow-delay="1s">
                        <center><h4>Berikan <em>Testimoni</em> Anda</h4>
                        <img src="{{ asset('assets/images/heading-line-dec.png')}}" alt="">
                        <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span>
                        <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span></center>
                    </div>
                    <br><br>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row mt-4">
                            <div class="col">
                                <h4>Pemesanan No. {{$pemesanan->id_pemesanan }}</h4>
                                <hr>
                                <p>Tanggal Pemesanan : <strong> {{$pemesanan->tanggal_pemesanan}} </p>
                                <p>Total Pemesanan : <strong> {{$pemesanan->total_pemesanan}} </p>
                            </div>
                        </div>
                        <form action="/pelanggan/riwayat/testimoni" method="post">
                        @csrf
                        <input type="hidden" name="id_pemesanan" value="{{ $pemesanan->id_pemesanan }}">
                        <div class="form-group">
                            <label for="nama_kategori">Isi Testimoni</label>
                            <input type="text" name="isi_testimoni" id="isi_testimoni" class="form-control" placeholder="Isi Testimoni atas Pesanan Anda"
                            aria-describedby="helpId">
                        </div><br>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@include('pelanggan.layouts.footer')
@endsection