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
            font-family: 'arial';
            font-size: 15px;
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
        .btn:hover {
            background-color: #2EE59D;
            box-shadow: 0px 15px 20px rgba(46, 229, 157, 0.4);
            color: #fff;
            transform: translateY(-7px);
        }
        </style>
    </head>

  <body>
    @yield('content')
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/owl-carousel.js')}}"></script>
    <script src="{{ asset('assets/js/animation.js')}}"></script>
    <script src="{{ asset('assets/js/imagesloaded.js')}}"></script>
    <script src="{{ asset('assets/js/popup.js')}}"></script>
    <script src="{{ asset('assets/js/custom.js')}}"></script>
    <script>
        $(document).ready(function() {
                $('select[name="province_origin"]').on('change', function (){
                    let provinceId = $(this).val();
                    if(provinceId){
                        jQuery.ajax({
                            url: '/ongkir/province/' + provinceId+ '/cities',
                            type:"GET",
                            dataType: "json",
                            success:function(data){
                                $('select[name="city_origin"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                            },
                        });
                    } else {
                        $('select[name="city_origin"]').empty();
                    }
                });
                $('select[name="province_destination"]').on('change', function (){
                    let provinceId = $(this).val();
                    if(provinceId){
                        jQuery.ajax({
                            url: '/ongkir/province/' + provinceId+ '/cities',
                            type:"GET",
                            dataType: "json",
                            success:function(data){
                                $('select[name="city_destination"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                            },
                        });
                    } else {
                        $('select[name="city_destination"]').empty();
                    }
                });
            });
        </script>
  </body>
</html>