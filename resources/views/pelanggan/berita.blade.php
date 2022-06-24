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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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
        

        .zoom:hover {
            transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
        }
    </style>
</head>
<body>
    @include('pelanggan.layouts.header')
    <div class="container">
        <div class="row">
            <div class="row" style="margin-top:120px;">
                    <div class="section-heading wow fadeIn" id="top" data-wow-duration="2s" data-wow-delay="1s" >
                        <center><h4 style="margin-top:20px;"> <em>{{ $berita->judul }}</em> </h4>
                        <img src="{{ asset('assets/images/heading-line-dec.png')}}" alt="">
                        <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span></center>
                    </div><br><br>
                    <div class="card-body">
                        <center>
                            <img class="zoom w3-hover-opacity" src="/gambar_berita/{{ $berita->gambar_berita }}" alt="" style="width:500px; box-shadow: 5px 5px 5px lightblue;">
                        </center>
                    </div>
                    <center>
                    <br><br>
                        <div class="col-lg-8">
                            
                                <p style="align-text:justify; margin-left:auto;margin-right:auto">
                                    {{ $berita->detail}}
                                </p>
                           
                            
                            
                        </div>
                        <br><br><br>
                        </center>
                        <div class="gradient-button">
                                <a href="/" class="btns">
                                    <i class="fa fa-arrow-left"></i> Kembali
                                </a>
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
</body>
</html>