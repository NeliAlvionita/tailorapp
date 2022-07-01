@extends('pelanggan.layouts.app', ['title' => 'Tambah Testimoni'])
@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-12">
          @include('pelanggan.layouts.header')
                <div class="row" style="margin-top: 120px;">
                    <div class="col-lg-12">
                        <div class="section-heading wow fadeIn" id="top" data-wow-duration="2s" data-wow-delay="1s">
                            <center><h4>Berikan <em>Testimoni</em> Anda</h4>
                            <img src="{{ asset('assets/images/heading-line-dec.png')}}" alt="">
                            <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span>
                            <span><img src="{{ asset('assets/images/heading-line-dec.png')}}" alt=""></span></center>
                        </div>
                        <br><br>
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col">
                                    <div class="card card-info" style="margin-top: 5px; border:none;">
                                        <div class="card-body">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Pemesanan No. {{$pemesanan->id_pemesanan }}</th>
                                                        <th>Pelanggan</th>
                                                        <th>Pengiriman</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td style="border:none;">Tanggal&nbsp; : {{ $pemesanan->tanggal_pemesanan }}</td>
                                                        <td style="border:none;">Nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $pemesanan->pelanggan->name }}</td>
                                                        @if($pemesanan->pilihan_pengiriman == "Diambil")
                                                        <td style="border:none;"> {{$pemesanan->pilihan_pengiriman}}</td>
                                                        @elseif($pemesanan->pilihan_pengiriman == "Dikirim")
                                                        <td style="border:none;">Alamat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $pemesanan->alamat_pengiriman }}</td>
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td style="border:none;">Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $pemesanan->total_pemesanan}}</td>
                                                        <td style="border:none;">Nomor Hp&nbsp; : {{ $pemesanan->pelanggan->nomorhp }}</td>
                                                        @if($pemesanan->pilihan_pengiriman == "Dikirim")
                                                        @if($pemesanan->ekspedisi == NULL)
                                                        <td style="border:none;">Ekspedisi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Belum Dikirim</td>
                                                        @else
                                                        <td style="border:none;">Ekspedisi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $pemesanan->ekspedisi}}</td>
                                                        @endif
                                                        @endif
                                                    </tr>
                                                    <tr>
                                                        <td style="border:none;">Status&nbsp;&nbsp;&nbsp;&nbsp;: {{ $pemesanan->status_pemesanan }}</td>
                                                        <td style="border:none;">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ $pemesanan->pelanggan->email }}</td>
                                                        @if($pemesanan->pilihan_pengiriman == "Dikirim")
                                                        @if($pemesanan->no_resi == NULL)
                                                        <td style="border:none;">Nomor Resi&nbsp;&nbsp;: Belum Dikirim</td>
                                                        @else
                                                        <td style="border:none;">Nomor Resi&nbsp;&nbsp;: {{ $pemesanan->no_resi}}</td>
                                                        @endif
                                                        @endif
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card card-info card-outline" style="border:none;">
                                        <div class="card-body">
                                            <table  class="table shadow table-hover">
                                                <thead class="table" style="background: #35A9DB;  color: #fff;  font-weight: normal;">
                                                    <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah</th>
                                                    <th>Biaya Tambahan</th>
                                                    <th>Sub Total</th>
                                                    <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pemesanan->detail_pemesanan as $index => $item)
                                                    <tr>
                                                        <td>{{$index + 1}}</td>
                                                        <td>{{$item->produk->nama_produk}}</td>
                                                        <td>{{$item->produk->harga}}</td>
                                                        <td>{{$item->jumlah}}</td>
                                                        <td>Rp. {{ number_format($item->biaya_tambahan)}} /pcs</td>
                                                        <td>Rp. {{ number_format($item->subtotal)}}</td>
                                                        <td>
                                                            <a class="btn" href="/pelanggan/riwayat/detail/{{$item->id_detailpemesanan}}" style="background-color: #008CBA;">
                                                            <i class="fa fa-eye"></i>  
                                                            Detail
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    <tr>
                                                    <td colspan="6" style="border:none;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" style="border:none;"></td>
                                                        <td style="border:none;">
                                                            <strong>Biaya Kirim </strong>
                                                        </td>
                                                        <td style="border:none;">
                                                            Rp. {{ number_format($pemesanan->biaya_ongkir) }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4" style="border:none;"></td>
                                                        <td style="border:none;"><strong>Total Pembayaran  </strong></td>
                                                        <td style="border:none;">
                                                            <strong>
                                                                <!-- Rp. {{ number_format($pemesanan->total_pemesanan) }} -->
                                                                Rp. {{ number_format($pemesanan->total_pemesanan+$pemesanan->biaya_ongkir) }}
                                                            </strong> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="6" style="border:none;"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> <br><br>
                
                            <form action="/pelanggan/riwayat/testimoni" method="post">
                                @csrf
                                <input type="hidden" name="id_pemesanan" value="{{ $pemesanan->id_pemesanan }}">
                                <div class="form-group">
                                    <label for="nama_kategori"><strong>Isi Testimoni Anda:</strong></label>
                                    <input type="text" name="isi_testimoni" id="isi_testimoni" class="form-control" placeholder="Isi Testimoni atas Pesanan Anda"
                                    aria-describedby="helpId">
                                </div><br>
                                <button type="submit" class="btn btn-success">Submit</button>
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