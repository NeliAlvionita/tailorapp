@extends('layouts.admin', ['title' => 'Data Detail Pembayaran'])

@section('title', 'Data Detail Pembayaran')

@section('content')
<div class="card card-info card-outline">
    <div class="card-header">
        <h3 class="card-title">Data Detail Pembayaran</h3>
    </div>
    <div class="card-body">
        <p>Nama   : {{$pemesanan->pembayaran->nama }}</p>
        <p>Bank   : {{$pemesanan->pembayaran->bank }}</p>
        <p>Total  : {{$pemesanan->pembayaran->jumlah }}</p>
        <p>Tanggal  : {{$pemesanan->pembayaran->tanggal_pembayaran }}</p>
        <p>Bukti  : </p>
        <p><img src="/bukti/{{ $pemesanan->pembayaran->bukti }}" width="400px"> </p>
    </div>
</div>
<div class="card card-info card-outline">
    <div class="card-header">
        <h3 class="card-title">Update Status Pembayaran</h3>
    </div>
    <div class="card-body">
        <form action="/admin/pemesanan/{{$pemesanan->id_pemesanan}}/update" method="post">
        @csrf
        @method('PUT')
        {{-- <input type="hidden" name="id_pemesanan" value="{{$pemesanan->id_pemesanan}}"> --}}
        <div class="form-group">
          <select name="status_pembayaran" id="status_pembayaran" class="form-control">
            <option value="">-- Pilih Opsi --</option>
            <option value="Belum Dicek">Belum Dicek</option>
            <option value="Lunas">Lunas</option>
          </select> 
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
      </form>
    </div>
</div>
@endsection