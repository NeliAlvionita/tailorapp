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
     <!-- MULAI STYLE CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />
  <!-- Font Awesome -->
  <link rel="stylesheet" 
  href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" 
  href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" 
  href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" 
  href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" 
  href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" 
  href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet"
   href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" 
  href="{{asset('plugins/summernote/summernote-bs4.css')}}">

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

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
                @endif
            </div>
        </div>

        <div class="row" style="margin-top: 120px;">
            <div class="col">
                <div class="table-responsive">
                    <table id="faq" class="table mb-0 text-center">
                        <thead class="table" style="background: #35A9DB;  color: #fff;  font-weight: normal; ">
                            <tr>
                                <td>No.</td>
                                <td>Pertanyaan</td>
                                <td>Jawaban</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @foreach ($faq as $faq)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td style="text-align: left;">{{ $faq->pertanyaan }}</td>
                                <td style="text-align: left;">{{ $faq->jawaban }}</td>
                            </tr>
                            @endforeach
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
          $('#faq').DataTable();
        });
    </script>
</body>
</html>