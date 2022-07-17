@extends('layouts.admin', ['title' => 'Data Detail Pembayaran'])

@section('title', 'Data Detail Pembayaran')

@section('content')
<div class="card card-info card-outline">
    <div class="card-header">
        <h3 class="card-title">Data Detail Pembayaran DP</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <p>Nama   : {{$pemesanan->pembayaran->nama }}</p>
          <p>Bank   : {{$pemesanan->pembayaran->bank }}</p>
          <p>Total  : {{$pemesanan->pembayaran->jumlah }}</p>
          <p>Tanggal  : {{$pemesanan->pembayaran->tanggal_pembayaran }}</p>
          <p>Update Status Pembayaran DP: </p>
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
        <div class="col-lg-6">
          <p>Bukti  : </p>
          <p><img src="/bukti/{{ $pemesanan->pembayaran->bukti }}" width="400px"> </p>
        </div>
      </div>
    </div>
</div>
<div class="card card-info card-outline">
  <div class="card-header">
      <h3 class="card-title">Data Detail Pelunasan</h3>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <p>Nama   : {{$pemesanan->pelunasan->nama }}</p>
        <p>Bank   : {{$pemesanan->pelunasan->bank }}</p>
        <p>Total  : {{$pemesanan->pelunasan->jumlah }}</p>
        <p>Tanggal  : {{$pemesanan->pelunasan->tanggal_pelunasan }}</p>
        <p>Update Status Pembayaran Pelunasan: </p>
        <form action="/admin/pemesanan/{{$pemesanan->id_pemesanan}}/updatelunas" method="post">
          @csrf
          @method('PUT')
          {{-- <input type="hidden" name="id_pemesanan" value="{{$pemesanan->id_pemesanan}}"> --}}
          <div class="form-group">
            <select name="status_pelunasan" id="status_pelunasan" class="form-control">
              <option value="">-- Pilih Opsi --</option>
              <option value="Belum Dicek">Belum Dicek</option>
              <option value="Lunas">Lunas</option>
            </select> 
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
      <div class="col-lg-6">
        <p>Bukti  : </p>
        @if($pemesanan->pelunasan->bukti == NULL)
        -
        @else
        <p><img src="/buktilunas/{{ $pemesanan->pelunasan->bukti }}" width="400px"> </p>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection