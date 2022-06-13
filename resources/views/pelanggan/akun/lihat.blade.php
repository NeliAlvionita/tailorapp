@extends('pelanggan.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-12">
          @include('pelanggan.layouts.header')
              <div class="row" style="margin-top: 120px;">
                <div class="col-lg-12">
                    <div class="section-heading wow fadeIn" id="top" data-wow-duration="2s" data-wow-delay="1s">
                        <center><h4>Profil</h4>
                        <img src="{{ asset('assets/images/heading-line-dec.png')}}" alt="">
                        <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span>
                        <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span></center>
                    </div>
                    <br><br>
                    <!-- <div class="sidenav">
                      <div class="profile">
                        <div class="name">
                          {{ Auth::user()->name }}
                        </div>
                      </div>
                    </div> -->
                    <div class="card card-info card-outline">
                        <div class="card-body">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->name}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->email}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->alamat}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomorhp" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->nomorhp}}
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <a class="btn" href="{{ route('ubah.akun', Auth::user()->id) }}">Edit Akun</a>
                              <a class="btn" href="/">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@include('pelanggan.layouts.footer')
@endsection
