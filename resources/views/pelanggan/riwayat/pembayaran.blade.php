@extends('pelanggan.layouts.app')
@section('content')

<div class="card card-info card-outline">
    <div class="card-body p-0">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <td>No Pemesanan: {{ $pemesanan->id_pemesanan}}</td>
                    <td>Nama Pelanggan: {{ $pemesanan->pelanggan->name }}</td>
                </tr>
                <tr>
                    <td>Tanggal Pemesanan: {{ $pemesanan->tanggal_pemesanan }}</td>
                    <td>Nama Penyetor : {{ $pemesanan->pembayaran->nama }}</td>
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
            <tr>
                <td align="left"><strong>Total Yang Harus dibayarkan : </strong></td>
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
    @if($pemesanan->pembayaran->status_pembayaran=='Lunas')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <p>Malang, Tanggal Bulan Tahun</p>
                    <p>Hormat kami</p>
                    <p>San Tailor</p>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <a class="btn btn-primary" href="#">Cetak</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    </div>
</div>
  
  @endsection