@extends('pelanggan.layouts.app')
@section('content')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-dark">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('keranjang') }}" class="text-dark">Keranjang</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="{{ route('keranjang') }}" class="btn btn-sm btn-dark"><i class="fas fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <form action="{{route('checkout')}}" method="post" enctype="multipart/form-data"> 
        @csrf
    <div class="row mt-4">
        <div class="col">
            <h4>Total Tagihan</h4>
            <hr>
            <p>Untuk pembayaran silahkan dapat transfer di rekening dibawah ini sebesar : <strong> Rp. {{ number_format($pemesanan->total_pemesanan) }}</strong> </p>
            <div class="media">
                {{-- <img class="mr-3" src="{{ url('assets/bri.png') }}" alt="Bank BRI" width="60"> --}}
                <div class="media-body">
                    <h5 class="mt-0">BANK BRI</h5>
                    No. Rekening 012345-678-910 atas nama <strong>Neli Alvionita</strong>
                </div>
            </div>
            <input type="hidden" name="tanggal_pemesanan" value="<?php echo date("Y-m-d"); ?>">
            <div class="form-group">
                <label for="">Nama Penyetor</label>
                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                autocomplete="nama" autofocus>

                @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Bank</label>
                <input id="bank" type="text" class="form-control @error('bank') is-invalid @enderror" name="bank"
                autocomplete="bank" autofocus>

                @error('bank')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Jumlah</label>
                <input id="jumlah" type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah"
                autocomplete="jumlah" autofocus>

                @error('jumlah')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Tanggal Pembayaran</label>
                <input id="tanggal_pembayaran" type="date" class="form-control @error('tanggal_pembayaran') is-invalid @enderror" name="tanggal_pembayaran"
                autocomplete="tanggal_pembayaran" autofocus>

                @error('tanggal_pembayaran')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Bukti</label>
                <input id="bukti" type="file" class="form-control @error('bukti') is-invalid @enderror" name="bukti"
                autocomplete="bukti" autofocus>

                @error('bukti')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            

        </div>
        <div class="col">
            <h4>Informasi Pengiriman</h4>
            <hr>

                <div class="form-group">
                    <label for="">Alamat Pengiriman</label>
                    <textarea name="alamat_pengiriman" class="form-control @error('alamat_pengiriman') is-invalid @enderror"></textarea>

                    @error('alamat_pengiriman')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>    
        </div>
    </div>
    <button type="submit" class="btn btn-success btn-block"> <i class="fas fa-arrow-right"></i> Checkout </button>
</form>
</div>
@endsection