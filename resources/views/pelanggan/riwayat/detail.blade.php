@extends('pelanggan.layouts.app')
@section('content')

<div class="card card-info card-outline">
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
                    <td>Tanggal: {{ $pemesanan->tanggal_pemesanan }}</td>
                    <td>Nama: {{ $pemesanan->pelanggan->name }}</td>
                    <td rowspan="3">Alamat: {{ $pemesanan->alamat_pengiriman }}</td>
                </tr>
                <tr>
                    <td>Total: {{ $pemesanan->total_pemesanan}}</td>
                    <td>Nomor Hp: {{ $pemesanan->pelanggan->nomorhp }}</td>
                </tr>
                <tr>
                    <td>Status: {{ $pemesanan->status_pemesanan }}</td>
                    <td>Email: {{ $pemesanan->pelanggan->email }}</td>
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
              <th>Nama</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Sub Total</th>
              <th>Aksi</th>
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
              <td>
                <a class="btn btn-primary" href="/pelanggan/riwayat/detail/{{$item->id_detailpemesanan}}">Detail Pemesanan</a>
              </td>
            </tr>
            @endforeach
            <tr>
                <td align="left"><strong>Total Pembayaran : </strong></td>
                <td align="left"><strong>Rp. {{ number_format($pemesanan->total_pemesanan) }}</strong> </td>
                <td></td>
            </tr>
          </tbody>
      </table>
      @if($pemesanan->pembayaran->status_pembayaran=='Belum Lunas')
      <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <p>Untuk kekurangan pembayaran sebanyak Rp. {{ number_format($pemesanan->total_pemesanan-$pemesanan->pembayaran->jumlah) }} silahkan dapat transfer di rekening dibawah ini : </p>
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0">BANK BNI</h5>
                            No. Rekening 012345-678-910 atas nama <strong>Neli Alvionita</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    </div>
</div>
  
  @endsection