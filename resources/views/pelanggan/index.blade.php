@extends('pelanggan.layouts.master')
@section('title','Home Page')
@section('content')
<div id="about" class="about-us section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 align-self-center">
        <div class="section-heading">
          <h4>Katalog Produk <em> San Tailor</em> </h4>
          <img src="assets/images/heading-line-dec.png" alt="">
          <p>Ini adalah produk-produk yang ada di San Tailor.</p>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="box-item">
              <h4><a href="#">Maintance Problems</a></h4>
              <p>Lorem Ipsum Text</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box-item">
              <h4><a href="#">24/7 Support &amp; Help</a></h4>
              <p>Lorem Ipsum Text</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box-item">
              <h4><a href="#">Fixing Issues About</a></h4>
              <p>Lorem Ipsum Text</p>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="box-item">
              <h4><a href="#">Co. Development</a></h4>
              <p>Lorem Ipsum Text</p>
            </div>
          </div>
          <div class="col-lg-12">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eismod tempor idunte ut labore et dolore adipiscing  magna.</p>
            <div class="gradient-button">
              <a href="{{ route('produk') }}">Selengkapnya</a>
            </div>
            <!-- <span>*No Credit Card Required</span> -->
          </div>
        </div>
      </div>
      <!-- <div class="col-lg-6">
        <div class="right-image">
          <img src="assets/images/about-right-dec.png" alt="">
        </div>
      </div> -->
    </div>
  </div>
</div>
@include('pelanggan.testimoni')
@endsection

 