@extends('layouts.admin', ['title' => 'Detail Pemesanan'])

@section('title', 'Detail Pemesanan')

@section('content')

<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Detail Pemesanan</h3>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Pemesanan</th>
                    <th>Pelanggan</th>
                    <th>Pengiriman</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tanggal   : {{ $pemesanan->tanggal_pemesanan }}</td>
                    <td>Nama      : {{ $pemesanan->pelanggan->name }}</td>
                    <td>Alamat    : {{ $pemesanan->alamat_pengiriman }}</td>
                </tr>
                <tr>
                    <td>Total     : {{ $pemesanan->total_pemesanan}}</td>
                    <td>Nomor Hp  : {{ $pemesanan->pelanggan->nomorhp }}</td>
                    @if($pemesanan->ekspedisi == NULL)
                    <td>Ekspedisi : Belum Dikirim</td>
                    @else
                    <td>Ekspedisi : {{ $pemesanan->ekspedisi}}</td>
                    @endif
                </tr>
                <tr>
                    <td>Status`   : {{ $pemesanan->status_pemesanan }}</td>
                    <td>Email     : {{ $pemesanan->pelanggan->email }}</td>
                    @if($pemesanan->no_resi == NULL)
                    <td>Nomor Resi: Belum Dikirim</td>
                    @else
                    <td>Nomor Resi: {{ $pemesanan->no_resi}}</td>
                    @endif
                </tr>
                <tr>
                  <td>Tanggal Dimulai Proses Jahit : 
                    @if($pemesanan->tanggal_mulai_jahit == NULL) belum diproses
                    @else{{ $pemesanan->tanggal_mulai_jahit}} @endif
                  </td>
                </tr>
                <tr>
                  <td>Perkiraan Selesai Waktu Jahit :
                    @if($pemesanan->tanggal_selesai_jahit == NULL) belum diproses
                    @else{{ $pemesanan->tanggal_selesai_jahit}} @endif </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card card-info card-outline">
    <div class="card-body p-0">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Sub Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pemesanan->detail_pemesanan as $index => $item)
            <tr>
              <td>{{$index + 1}}</td>
              <td>{{$item->produk->nama_produk}}</td>
              <td>{{$item->produk->harga}}</td>
              <td>{{$item->jumlah}}</td>
              <td>{{$item->subtotal}}</td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
</div>
  
@endsection