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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <style>
      b {
        color: #4b8ef1;
      }
      p {
        color: #504e4e;
      }
    </style>
</head>
<body>
    @include('pelanggan.layouts.header')
      <div class="container">
        <div class="row">
            
        </div>
        <div class="row" style="margin-top: 120px;">
            <div class="section-heading wow fadeIn" id="top" data-wow-duration="2s" data-wow-delay="1s">
                <center><h4>Riwayat <em>Pemesanan</em> </h4>
                <img src="{{ asset('assets/images/heading-line-dec.png')}}" alt="">
                <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span></center>
            </div>
            <br><br><br>
            <div class="col-md-12">
                @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
                @endif
            </div>
            <div class="col">
                <div class="table-responsive">
                    <table id="riwayat" class="table mt-2 mb-0 text-center" >
                        <thead class="table" style="background: #35A9DB;  color: #fff;  font-weight: normal;">
                            <tr>
                                <td>No.</td>
                                <td>Tanggal</td>
                                <td>Status Pemesanan</td>
                                <td>Pembayaran</td>
                                <td>Total Pesanan</td>
                                <td>Biaya Kirim</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                        @forelse ($pemesanan as $pemesanan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $pemesanan->tanggal_pemesanan }}</td>
                            <td>{{ $pemesanan->status_pemesanan }}</td>
                            <td>
                                @if($pemesanan->status_pemesanan == 'belum bayar')
                                belum bayar
                                @else
                                {{ $pemesanan->pembayaran->status_pembayaran }}
                                @endif
                            </td>
                            <td>Rp. {{ number_format($pemesanan->total_pemesanan) }}</td>
                            <td>Rp. {{ number_format($pemesanan->biaya_ongkir) }}</td>
                            <td>
                                    <a class="btn" href="/pelanggan/riwayat/{{$pemesanan->id_pemesanan}}" style="background-color: #008CBA;">
                                        Detail
                                    </a>&nbsp;
                                    <a class="btn" href="{{ route('riwayat.bayar', $pemesanan->id_pemesanan) }}" style="background-color: #ffae00">
                                        Pembayaran
                                    </a>
                                    @if($pemesanan->status_pemesanan=='Pesanan Selesai')
                                    <a class="btn" href="{{ route('tambah.testimoni', $pemesanan->id_pemesanan)}}" style="background-color: #4CAF50;">
                                        Tambah Testimoni
                                    </a>
                                    @endif
                            </td>
                        </tr>
                        @empty 
                        <tr>
                            <td colspan="7">Data Kosong</td>
                        </tr>
                        @endforelse
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
    <script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
    src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
          $('#riwayat').DataTable();
        });
    </script>
  
</body>
</html>