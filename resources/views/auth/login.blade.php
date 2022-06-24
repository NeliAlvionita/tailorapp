<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <title>San Tailor</title>

    <!-- fav icons -->
    <link rel="shortcut icon" href="{{ asset('assets/logo1.png')}}">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
            /* Reseting */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
            }
            body {
                background: #ecf0f3;
            }
            .wrapper {
                max-width: 450px;
                min-height: 500px;
                margin: 80px auto;
                padding: 40px 30px 30px 30px;
                background-color: #ecf0f3;
                border-radius: 15px;
                box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
            }
            .wrapper .text-center {
                padding: 10px;
                
            }
            .logo {
                width: 135px;
                margin: auto;
            }
            .logo img {
                max-width: 150px;
                margin-bottom: 30px;
            }
            .wrapper .name {
                font-weight: 600;
                font-size: 1.4rem;
                letter-spacing: 1.3px;
                padding-left: 10px;
                color: #555;
            }
            .wrapper .form-field input {
                width: 100%;
                display: block;
                border: none;
                outline: none;
                background: none;
                font-size: 1.2rem;
                color: #666;
                padding: 10px 15px 10px 10px;
                /* border: 1px solid red; */
            }
            .wrapper .form-field {
                padding-left: 10px;
                margin-bottom: 20px;
                border-radius: 20px;
                box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
            }
            .wrapper .form-field .fas {
                color: #555;
            }
            .wrapper .btn {
                box-shadow: none;
                width: 100%;
                height: 40px;
                background-color: #03A9F4;
                color: #fff;
                border-radius: 25px;
                box-shadow: 3px 3px 3px #b1b1b1,
                    -3px -3px 3px #fff;
                letter-spacing: 1.3px;
            }
            .wrapper .btn:hover {
                background-color: #039BE5;
            }
            .wrapper a {
                text-decoration: none;
                font-size: 0.8rem;
                color: #03A9F4;
            }
            .wrapper a:hover {
                color: #039BE5;
            }
            @media(max-width: 380px) {
                .wrapper {
                    margin: 30px 20px;
                    padding: 40px 15px 15px 15px;
                }
            }
        </style>
    </head>
    <body>
        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @endif
        <div class="wrapper">
            <div class="text-center mt-4 name">
                <center>
                <h4>
                    LOGIN
                </h4>
                </center>
            </div>
            <div class="logo">
                <img src="{{ asset('assets/logo.png') }}" alt="">
            </div>
            <form class="p-3 mt-3" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-envelope"></span>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit"  class="btn" style="outline:none;">Login</button>
            </form>
            <div style="margin:20px;">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Lupa Password?</a>
                @endif
            </div>
            <div style="margin:20px;">
                <a href="{{ route('register') }}">Belum mempunyai akun? Daftar Akun 
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </body>
</html>
