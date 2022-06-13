<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <title>San Tailor</title>

    <!-- fav icons -->
    <link rel="shortcut icon" href="{{ asset('assets/logo1.png')}}">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/template.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  </head>
  <body>
    @include('pelanggan.layouts.header')
  @if (session('message'))
  <div class="alert alert-success alert-dismissible">
    {{ session('message') }}
  </div>
  @endif
  </section>
  </div>

  <div class="row">
    <div class="col-lg-10 offset-lg-1">
      <div class="card card-info" style="margin-top: 120px; border:none;">
        <div class="card-body">
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
                    <td style="border:none;">Tanggal&nbsp; : {{ $pemesanan->tanggal_pemesanan }}</td>
                    <td style="border:none;">Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $pemesanan->pelanggan->name }}</td>
                    <td style="border:none;">Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $pemesanan->alamat_pengiriman }}</td>
                </tr>
                <tr>
                    <td style="border:none;">Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $pemesanan->total_pemesanan}}</td>
                    <td style="border:none;">Nomor Hp&nbsp; : {{ $pemesanan->pelanggan->nomorhp }}</td>
                    @if($pemesanan->ekspedisi == NULL)
                    <td style="border:none;">Ekspedisi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Belum Dikirim</td>
                    @else
                    <td style="border:none;">Ekspedisi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $pemesanan->ekspedisi}}</td>
                    @endif
                </tr>
                <tr>
                    <td style="border:none;">Status&nbsp;&nbsp;&nbsp;&nbsp;: {{ $pemesanan->status_pemesanan }}</td>
                    <td style="border:none;">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $pemesanan->pelanggan->email }}</td>
                    @if($pemesanan->no_resi == NULL)
                    <td style="border:none;">Nomor Resi&nbsp;&nbsp;: Belum Dikirim</td>
                    @else
                    <td style="border:none;">Nomor Resi&nbsp;&nbsp;: {{ $pemesanan->no_resi}}</td>
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
</div>

<div class="col-lg-10 offset-lg-1">
<div class="card card-info card-outline" style="border:none;">
    <div class="card-body">
        <table class="table shadow table-hover">
          <thead class="table" style="background: #35A9DB;  color: #fff;  font-weight: normal;">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Biaya Tambahan</th>
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
              <td>Rp. {{ number_format($item->biaya_tambahan)}} /pcs</td>
              <td>Rp. {{ number_format($item->subtotal)}}</td>
              <td>
                <a class="btn" href="/pelanggan/riwayat/detail/{{$item->id_detailpemesanan}}" style="background-color: #008CBA;">
                  <i class="fa fa-eye"></i>  
                  Detail
                </a>
            </td>
            </tr>
            @endforeach
            <tr>
              <td colspan="6" style="border:none;"></td>
            </tr>
            <tr>
              <td colspan="3" style="border:none;"></td>
                <td style="border:none;"><strong>Total Pembayaran : </strong></td>
                <td align="left" style="border:none;"><strong>Rp. {{ number_format($pemesanan->total_pemesanan) }}</strong> </td>
                <td></td>
            </tr>
            <tr>
              <td colspan="6" style="border:none;"></td>
            </tr>
          </tbody>
      </table>
    </div>
</div>
</div>
</div>
@include('pelanggan.layouts.footer')

<script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js')}}"></script>
    <script src="{{ asset('assets/js/animation.js')}}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js')}}"></script>
    <script src="{{ asset('assets/js/popup.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
  </body>
</html>