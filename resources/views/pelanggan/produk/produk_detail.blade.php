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

        <a href="{{$footer->nomor_wa}}">
            <img src="https://hantamo.com/free/whatsapp.svg" class="wabutton" alt="Whatsapp-Button" />
        </a>
        <style>
        b {
            color: #4b8ef1;
        }
        p {
            color: #504e4e;
        }
        .wabutton{
            width:50px;
            height:50px;
            position:fixed;
            bottom:20px;
            right:20px;
            z-index:100;
        }
        .kotak img {
            -webkit-transition: 0.4s ease;
            transition: 0.4s ease;
            width: 700px;
        }
        .zoom-effect:hover .kotak img {
            -webkit-transform: scale(1.08);
            transform: scale(1.08);
        }
        .btn {
            width: 140px;
            height: 45px;
            font-family: 'Roboto', sans-serif;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            font-weight: 500;
            color: #000;
            background-color: #fff;
            border: none;
            border-radius: 45px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease 0s;
            cursor: pointer;
            outline: none;
        }
        .btn:hover {
            background-color: #2EE59D;
            box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
            color: #fff;
            transform: translateY(-7px);
        }
        .btns{
            padding:10px 12px;
            font-size: 15px;
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
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-12">
                @include('pelanggan.layouts.header')
                </div>

                <div class="row" style="margin-top: 120px;">
                    <div class="col col-lg-3 wow fadeIn" id="top" data-wow-duration="2s" data-wow-delay="0.5s">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                                Kategori 
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">{{ $produk_detail->kategori->nama_kategori }}</a>
                        </div>
                    </div>

                    <div class="col col-lg-9">

                        <div class="row">
                            <div class="col-md-12">
                                @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <!-- row detail katalog -->
                        <div class="row mt-100 wow fadeIn" id="top" data-wow-duration="4s" data-wow-delay="0.5s">
                            <div class="col col-md-6">
                                <div class="card zoom-effect" style="margin-top:10px;">
                                    <div class="card-body kotak text-center">
                                        <img src="/foto_produk/{{ $produk_detail->foto_produk }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6" style="font-family: sans-serif;">
                                <h2>
                                    {{ $produk_detail->nama_produk }}
                                </h2> <br>
                                <h6>
                                    Stok: @if($produk_detail->stok_bahan>0) ada @else habis @endif
                                </h6><br>
                                <h6>
                                    Harga Jahit + Bahan: Rp. {{ number_format($produk_detail->harga) }}
                                </h6>
                                <br>
                                <h6>
                                    Harga Jahit: Rp. {{ number_format($produk_detail->harga_jahit) }}
                                </h6><br>
                                <p>
                                    {{ $produk_detail->detail_produk }}
                                </p><br>
                                <strong>Berat produk </strong> : {{$produk_detail->berat_produk}} gram <br><br>
                                <strong>Harga Tambah</strong>
                                @foreach ($bahan as $index => $item)
                                <p>Ukuran {{$item->ukuran}} : + Rp. {{ number_format($item->harga_tambah) }}
                                @endforeach

                            </div>

                            <br><br>


                        </div>
                        <br>
                        <div class="row wow fadeIn" id="top" data-wow-duration="4s" data-wow-delay="0.5s">
                            <!-- <div class="col">
                                <button class="btns" onclick="goBack()">
                                <i class="fa fa-arrow-left"></i> Kembali</button>
                                <script>
                                    function goBack() {
                                        window.history.back();
                                    }
                                </script>
                            </div> -->
                            <div class="col gradient-button">
                                <a  @if($item->stok_bahan<1) class="btn disabled" @else class="btn" @endif  href="{{route('pemesanan.index', $produk_detail->id_produk)}}">Buat Pesanan</a>
                            </div>
                        </div>
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