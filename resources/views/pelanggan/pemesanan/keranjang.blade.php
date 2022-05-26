@extends('pelanggan.layouts.app')
@section('content')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-dark">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Kategori</td>
                            <td>Produk</td>
                            <td>Jumlah</td>
                            <td>Harga</td>
                            <td><strong>Sub Total</strong></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($detail_pemesanan as $detail_pemesanan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $detail_pemesanan->produk->kategori->nama_kategori }}</td>
                            <td>{{ $detail_pemesanan->produk->nama_produk }}</td>
                            <td>{{ $detail_pemesanan->jumlah }}</td>
                            <td>Rp. {{ number_format($detail_pemesanan->produk->harga) }}</td>
                            <td><strong>Rp. {{ number_format($detail_pemesanan->subtotal) }}</strong></td>
                            <td>
                                <a class="btn btn-primary" href="/pelanggan/keranjang/{{$detail_pemesanan->id_detailpemesanan}}/ubah">Ubah</a>
                                <form action="/pelanggan/keranjang/{{$detail_pemesanan->id_detailpemesanan}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>    
                        @empty
                        <tr>
                            <td colspan="7">Data Kosong</td>
                        </tr>   
                        @endforelse
                        
                        @if(!empty($pemesanan))
                        <tr>
                            <td colspan="6" align="right"><strong>Total Yang Harus dibayarkan : </strong></td>
                            <td align="right"><strong>Rp. {{ number_format($pemesanan->total_pemesanan) }}</strong> </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="6"></td>
                            <td colspan="2">
                                <a href="{{ route('checkout')}}" class="btn btn-success btn-blok">
                                    <i class="fas fa-arrow-right"></i> Check Out
                                </a>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection