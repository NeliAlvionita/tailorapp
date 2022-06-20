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
        <div class="container" style="padding:10px; margin:30px;">
            <div class="row">
                <div class="col-12">
                        <div class="row">
                        <h4 align="center">
                            JASA JAHIT SAN TAILOR
                        </h4>
                        <P align="center">Jalan Silikat No.50A Kecamatan Blimbing Kelurahan Purwantoro Kota Malang</p>
                        <p align="center">Telp. (0341) 475842 Wa. 081735217630 Email. santailor@gmail.com</p>
                    </div>
                    
                    <hr style="border: 3px; border-style: solid double;">

                    <div class ="form-group">
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
                                <td style="border:none;"><strong>Ekspedisi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong> {{ $pemesanan->ekspedisi}}</td>
                                <td style="border:none;"><strong>Bank&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong> {{ $pemesanan->pembayaran->bank}} </td>
                            </tr>
                        </tbody>
                    </table>
</div>
</div>
                            <br>

                            <div class="card card-info">
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
                                </tbody>
                            </table> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <script type="text/javascript">
        window.print();
        </script>
    </body>
</html>