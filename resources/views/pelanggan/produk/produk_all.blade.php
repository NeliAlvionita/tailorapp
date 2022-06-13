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

        <a href="https://api.whatsapp.com/send?phone=6281339908155">
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
                            @foreach($kategori as $index => $item)
                            <a href="/pelanggan/produk/kategori/{{$item->id_kategori}}" class="list-group-item list-group-item-action" vm >{{$item->nama_kategori}}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="col col-lg-9">
                        <form action="/pelanggan/produk/cari" method="GET"> 
                            @csrf
                        <div class="input-group mb-3 wow slideInDown" data-wow-duration="0.95s" data-wow-delay="0s">
                            <input name="cari" type="text" class="form-control" placeholder="Cari . . ." aria-label="Search"
                                aria-describedby="basic-addon1">
                            <button type="submit" class="button btn-primary" style="border:none; padding: 10px;">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                        </form>

                        <!-- row katalog -->
                        <div class="row mt-100 wow fadeIn" id="top" data-wow-duration="4s" data-wow-delay="0.5s">
                            @foreach($produk as $index => $item)
                            <div class="col col-lg-4">
                                <div class="card zoom-effect" style="margin-top:10px;">
                                    <div class="card-body kotak text-center">
                                        <img src="/foto_produk/{{ $item->foto_produk }}" class="img-fluid">
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <h6><strong>
                                                    {{ $item->nama_produk }} 
                                                </strong> </h6>
                                                <p>
                                                    Bahan: Kain {{ $item->nama_bahan}}
                                                </p>
                                                <p>
                                                    Rp. {{ number_format($item->harga) }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-12 gradient-button kotak" >
                                                <a href="{{ route('produk.detail', $item->id_produk) }}" class="btn" style="border:none;"><i class="fas fa-eye"></i> Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="row justify-content-md-center">
                            <div class="col col-lg-12">
                                {{ $produk->links() }}
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