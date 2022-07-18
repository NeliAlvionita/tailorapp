@extends('pelanggan.layouts.app')
@section('content')
@include('pelanggan.layouts.header')
@if (session('message'))
<div class="alert alert-success alert-dismissible">
  {{ session('message') }}
</div>
@endif

<div class="container">

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row" style="margin-top: 120px;">
        <div class="col">
            <div class="section-heading wow fadeIn" id="top" data-wow-duration="2s" data-wow-delay="1s">
                <center><h4>Detail <em> Pesanan</em> </h4>
                <img src="{{ asset('assets/images/heading-line-dec.png')}}" alt="">
                <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span>
                <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span></center>
            </div>
            <br><br>

            <form> 
                <div class="row ">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><h6> Kategori :</h6></label>
                            <input type="text" name="kategori" class="form-control" placeholder="{{ $detail->produk->kategori->nama_kategori }}" readonly>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><h6> Nama Produk :</h6></label>
                            <input type="text" name="produk" class="form-control" placeholder="{{ $detail->produk->nama_produk }}" readonly>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><h6> Nama Pelanggan :</h6></label>
                            <input type="text" name="name" readonly class="form-control" placeholder="{{ Auth::user()->name }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><h6> Nomor Telepon :</h6></label>
                            <input type="text" name="notelp" readonly class="form-control" placeholder="{{ Auth::user()->nomorhp }}">
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><h6> Jumlah Pesanan :</h6></label>
                            <input type="text" name="jumlah" readonly class="form-control" placeholder="{{ $detail->jumlah }}">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label><h6> Catatan :</h6></label>
                            <input type="text" name="catatan" readonly class="form-control" placeholder="{{ $detail->ukuran->catatan }}" rows="3" >
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <strong>Model Baju yang akan dibuat :</strong>
                        </div>
                        <img src="/foto_model/{{ $detail->ukuran->foto_model }}" width="50"> 
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label><h6> Bahan :</h6></label>
                            <input type="text" name="bahan" readonly class="form-control" placeholder="{{ $detail->asal_bahan }}" rows="3" >
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label><h6> Tanggal Pengiriman Bahan :</h6></label>
                            <input type="text" name="bahan" readonly class="form-control" placeholder="{{ $detail->tanggal_pengiriman_bahan }}" rows="3" >
                        </div>
                    </div>
                </div><br><br>

                <div class="heading">
                    <h4> Pengukuran</h4>
                    <hr style="height:5px;color:black;background-color:black">
                </div>

                <div class="alert alert-primary">
                    <h6 style="color:black;">PANDUAN PENGUKURAN</h6><br>
                    <ol class="list-group list-group-numbered">
                        <li class="list-group-item">Anda hanya membutuhkan alat bantu berupa meteran</li>
                        <li class="list-group-item">Mengukur dengan cara langsung mengukur di badan atau Mengukur dengan baju yang pas</li>
                        <li class="list-group-item">Melihat Contoh Model Yang mengenakan</li>
                        <li class="list-group-item">Mencatat Ukuran Pakaian Anda</li>
                    </ol>
                </div>

                <div class="row">
                    <div class="card-body">
                        <img src="/gambar_ukuran/{{ $detail->produk->kategori->gambar_ukuran }}" class="img-fluid">
                    </div>
                </div><br>

                @if($detail->produk->kategori->nama_kategori=='Celana')
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>A. Lingkar Pinggang :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_pinggang }}" readonly>
                        </div>
                    </div> 
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>B. Lingkar Panggul :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_panggul }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>C. Lingkar Keris :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_keris }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>D. Panjang Celana :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_celana }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>E. Lebar Bawah :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lebar_bawah }}" readonly>
                        </div>
                    </div>
                </div><br>
                @endif

                @if($detail->produk->kategori->nama_kategori=='Rok')
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>A. Lingkar Pinggang :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_pinggang }}" readonly>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>B. Lingkar Panggul :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_panggul }}" readonly>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>C. Panjang Rok :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_rok }}" readonly>
                        </div>
                    </div>
                    
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>D. Tinggi Duduk :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->tinggi_duduk }}" readonly>
                        </div>
                    </div>
                </div><br>
                @endif

                @if($detail->produk->kategori->nama_kategori=='Jas')
                <div class="alert alert-success">
                    <h6>Atasan</h6>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>A. Lebar Bahu :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lebar_bahu }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>B. Panjang Tangan :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_tangan }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>C. Panjang Baju :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_baju }}" readonly>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>D. Lingkar Dada :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_dada }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>E. Lingkar Lengan :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_lengan }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>F. Lingkar Ketiak :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_ketiak }}" readonly>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>G. Lingkar Lengan Bawah :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_lenganbawah }}" readonly>
                        </div>
                    </div>
                </div><br>
                <div class="alert alert-success">
                    <h6>Bawahan</h6>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>H. Lingkar Pinggang :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_pinggang }}" readonly>
                        </div>
                    </div> 
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>I. Panjang Celana :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_celana }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>J. Lingkar Panggul :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_panggul }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>K. Lingkar Keris :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_keris }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>L. Lingkar Bawah :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_bawah }}" readonly>
                        </div>
                    </div>
                </div><br>
                @endif

                @if($detail->produk->kategori->nama_kategori=='Kemeja')
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>A. Lebar Bahu :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lebar_bahu }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>B. Panjang Tangan :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_tangan }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>C. Panjang Baju :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_baju }}" readonly>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>D. Lingkar Lengan :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_lengan }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>E. Lingkar Dada :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_dada }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>F. Lingkar Ketiak :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_ketiak }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>G. Lingkar Lengan Bawah :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_lenganbawah }}" readonly>
                        </div>
                    </div>
                </div><br>
                    
                <div class="row">
                </div><br>
                @endif

                @if($detail->produk->kategori->nama_kategori=='Seragam Laki-laki')
                <br>
                <div class="alert alert-success">
                    <h6>Atasan</h6>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>A. Lebar Bahu :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lebar_bahu }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>B. Lingkar Ketiak :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_ketiak }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>C. Lingkar Lengan :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_lengan }}" readonly>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>D. Panjang Baju :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_baju }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>E. Lingkar Dada :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_dada }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>F. Panjang Tangan :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_tangan }}" readonly>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                </div><br><br>

                <div class="alert alert-success">
                    <h6>Bawahan</h6>
                </div><br>

                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>G. Lingkar Pinggang :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_pinggang }}" readonly>
                        </div>
                    </div> 
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>H. Lingkar Keris :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_keris }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>I. Panjang Celana :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_celana }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label><h6>J. Lingkar Panggul :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_panggul }}" readonly>
                        </div>
                    </div>
                </div><br>
                @endif
                @if($detail->produk->kategori->nama_kategori=='Seragam Perempuan')
                <br>
                <div class="alert alert-success">
                    <h6>Atasan</h6>
                </div>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>A. Lebar Bahu :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lebar_bahu }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>B. Lingkar Ketiak :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_ketiak }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>C. Lingkar Lengan :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_lengan }}" readonly>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>D. Panjang Baju :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_baju }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>E. Lingkar Dada :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_dada }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>F. Panjang Tangan :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_tangan }}" readonly>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                </div><br><br>

                <div class="row">
                </div><br><br>

                <div class="alert alert-success">
                    <h6>Bawahan</h6>
                </div><br>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>G. Lingkar Pinggang :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->lingkar_pinggang }}" readonly>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label><h6>I. Panjang Rok :</h6> </label>
                            <input type="text" class="form-control" 
                            placeholder="{{ $detail->ukuran->panjang_rok }}" readonly>
                        </div>
                    </div>
                </div><br>
                @endif
            </form>
        </div>
    </div>
</div>
@include('pelanggan.layouts.footer')
@endsection