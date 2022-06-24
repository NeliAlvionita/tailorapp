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
        <style>
            b {
                color: #4b8ef1;
            }
            p {
                color: #504e4e;
            }
            .btns{
                font-family: 'Roboto', sans-serif;
                font-size: 15px;
                text-transform: uppercase;
                letter-spacing: 2.5px;
                font-weight: 500;
                color: #fff;
                background-color: #3490dc;
                border: none;
                border-radius: 45px;
                box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease 0s;
                cursor: pointer;
                outline: none;
            }
            .btns:hover {
                background-color: #2EE59D;
                box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
                color: #fff;
                transform: translateY(-7px);
            }
        </style>
    </head>
    <body>
        @include('pelanggan.layouts.header')
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="card card-info" style="margin-top: 120px; border:none;">
                    <div class="card-body">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td style="border:none;"><strong>No Pemesanan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong>  {{ $pemesanan->id_pemesanan}}</td>
                                    <td style="border:none;"><strong>Nama Pelanggan&nbsp;: </strong>  {{ $pemesanan->pelanggan->name }}</td>
                                </tr>
                                <tr>
                                    <td style="border:none;"><strong>Tanggal Pemesanan&nbsp;&nbsp; :</strong> {{ $pemesanan->tanggal_pemesanan }}</td>
                                    <td style="border:none;"><strong>Nama Penyetor&nbsp;&nbsp;&nbsp; :</strong> {{ $pemesanan->pembayaran->nama }}</td>
                                </tr>
                                <tr>
                                    @if($pemesanan->pilihan_pengiriman == "Dikirim")
                                    <td style="border:none;"><strong>Ekspedisi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong> {{ $pemesanan->ekspedisi}}</td>
                                    @else 
                                    <td></td>
                                    @endif
                                    <td style="border:none;"><strong>Bank&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong> {{ $pemesanan->pembayaran->bank}} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card card-info card-outline">
                    <div class="card-body p-0" >
                        <table class="table table-hover" >
                            <thead class="table" style="background: #35A9DB;  color: #fff;  font-weight: normal; border:none;">
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
                                <td>Rp. {{ number_format($item->produk->harga) }}</td>
                                <td>{{$item->jumlah}}</td>
                                <td>Rp. {{ number_format($item->subtotal) }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5"style="border:none;"></td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="border:none;"></td>
                                    <td style="border:none;">
                                        <strong>Biaya Kirim </strong>
                                    </td>
                                    <td style="border:none;">
                                        Rp. {{ number_format($pemesanan->biaya_ongkir) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="border:none;"></td>
                                    <td style="border:none;"><strong>Total Pembayaran  </strong></td>
                                    <td style="border:none;">
                                        <strong>
                                            Rp. {{ number_format($pemesanan->total_pemesanan+$pemesanan->biaya_ongkir) }}
                                        </strong> 
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                </tr>
                                @if($pemesanan->pembayaran->status_pembayaran=='Lunas')
                                <tr>
                                    <td colspan="5" style="border:none;"></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="border:none;"></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="border:none;"></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="border:none;"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="border:none;"></td>
                                    <td style="border:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hormat Kami,</td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="border:none;"></td>
                                    <td style="border:none;"><img src="{{ asset('assets/stempel.png') }}" class="img-fluid" style="padding: 2px; width: 150px;"></td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="border:none;"></td>
                                    <td style="border:none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; San Tailor</td>
                                </tr>
                                @endif
                            </tbody>
                        </table> 
                    </div>
                </div><br><br>
                @if($pemesanan->pembayaran->status_pembayaran=='Lunas')
                <div class="gradient-button">
                <a class="btns" href="{{ route('cetak.nota', $pemesanan->id_pemesanan) }}">
                    <i class="fas fa-print"></i> Cetak Nota
                </a>
                </div>
                @endif
                @if($pemesanan->pembayaran->status_pembayaran=='belum dicek')
                <div class="row">
                    <div class="col">
                        <div class="alert alert-info">
                            <h6 align="center">Pembayaran yang telah anda lakukan sedang dalam proses pengecekan oleh admin </h6>
                        </div>
                    </div>
                </div>
                @endif
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