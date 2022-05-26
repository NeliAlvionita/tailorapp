@extends('pelanggan.layouts.app')
@section('content')
<div class="container">
    <div class="row mt-4 mb-2">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/" class="text-dark">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
        </div>
    </div>

    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No.</td>
                            <td>Tanggal</td>
                            <td>Status Pemesanan</td>
                            <td>Total</td>
                            <td>Pembayaran</td>
                            <td>Opsi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @forelse ($pemesanan as $pemesanan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $pemesanan->tanggal_pemesanan }}</td>
                            <td>{{ $pemesanan->status_pemesanan }}</td>
                            <td>Rp. {{ number_format($pemesanan->total_pemesanan) }}</td>
                            <td>{{ $pemesanan->pembayaran->status_pembayaran }}</td>
                            <td>
                                    <a class="btn btn-primary" href="/pelanggan/riwayat/{{$pemesanan->id_pemesanan}}">Detail</a>
                                    <a class="btn btn-warning" href="{{ route('riwayat.bayar', $pemesanan->id_pemesanan) }}">Lihat Pembayaran</a>
                                    @if($pemesanan->status_pemesanan=='Pesanan Selesai')
                                    <a class="btn btn-warning" href="{{ route('tambah.testimoni', $pemesanan->id_pemesanan)}}">Tambah Testimoni</a>
                                    @endif
                            </td>
                        </tr>
                        @empty 
                        <tr>
                            <td colspan="7">Data Kosong</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
