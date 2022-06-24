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
            font-family: arial;
            padding: 10px;
            font-size: 13px;
            letter-spacing: 1.5px;
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
        .edit{
            background-color: white; 
            color: black; 
            border: 2px solid #008CBA;
        }
        .edit:hover{
            background-color: #008CBA;
            color: white;
        }
        .hapus{
            background-color: white; 
            color: black; 
            border: 2px solid #f44336;
        }
        .hapus:hover{
            background-color: #f44336;
            color: white;
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
                <center><h4>Keranjang <em>Pemesanan</em> </h4>
                <img src="{{ asset('assets/images/heading-line-dec.png')}}" alt="">
                <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span></center>
            </div>
            <br><br><br>
            <div class="col-md-12">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
                @endif
            </div><br>
            <div class="col">
                <div class="table-responsive">
                    <table class="table mb-0 text-center">
                        <thead class="table" style="background: #35A9DB;  color: #fff;  font-weight: normal; ">
                            <tr>
                                <td>No.</td>
                                <td>Kategori</td>
                                <td>Produk</td>
                                <td>Jumlah</td>
                                <td>Harga</td>
                                <td>Biaya Tambahan</td>
                                <td>Aksi</td>
                                <td><strong>Sub Total</strong></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @forelse ($detail_pemesanan as $detail_pemesanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $detail_pemesanan->produk->kategori->nama_kategori }}</td>
                                <td>{{ $detail_pemesanan->produk->nama_produk }}</td>
                                <td>{{ $detail_pemesanan->jumlah }}</td>
                                <td>Rp. {{ number_format($detail_pemesanan->produk->harga) }}</td>
                                <td>Rp. {{ number_format($detail_pemesanan->biaya_tambahan) }} /pcs</td>
                                <td>
                                    <a href="/pelanggan/keranjang/{{$detail_pemesanan->id_detailpemesanan}}/ubah">
                                        <button class="edit">
                                            <i class="fa fa-edit"></i> Ubah&nbsp;
                                        </button>
                                    </a>
                                        <form action="/pelanggan/keranjang/{{$detail_pemesanan->id_detailpemesanan}}" method="post"  style="margin-top:5px;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="hapus">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    
                                </td>
                                <td class="text-left"><strong>Rp. {{ number_format($detail_pemesanan->subtotal) }}</strong></td>
                                
                            </tr>
                            
                            @empty
                            <tr>
                                <td colspan="8">Data Kosong</td>
                            </tr>   
                            @endforelse
                        
                            @if(!empty($pemesanan))
                                <tr>
                                    <td colspan="7" align="right"><strong>Total Yang Harus dibayarkan : </strong></td>
                                    <td align="center"><strong>Rp. {{ number_format($pemesanan->total_pemesanan) }}</strong> </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="1" style="border:none;"></td>
                                    <td colspan="5" style="border:none;"></td>
                                    <td style="border:none;">
                                        <div class="gradient-button" style="align:left;">
                                            <a href="{{ route('checkout')}}" class="btns btn-xs">
                                                <i class="fa fa-arrow-right"></i> Submit
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                            
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