@extends('layouts.admin', ['title' => 'Data Detail Ukuran'])

@section('title', 'Data Detail Pembayaran')

@section('content')
<div class="card card-info card-outline">
    <div class="card-header">
        <h3 class="card-title">Data Ukuran Pelanggan</h3>
    </div>
    <div class="card-body">
        <p>Nama Pelanggan      : {{$pemesanan->pelanggan->name }}</p>
        <p>Tanggal Pemesanan   : {{$pemesanan->tanggal_pemesanan }}</p>
        <p>Nomor Telepon       : {{$pemesanan->pelanggan->nomorhp }}</p>
        <p>Email               : {{$pemesanan->pelanggan->email }}</p>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Ukuran</th>
                  <th>Catatan</th>
                  <th>Contoh Model Pakaian</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemesanan->detail_pemesanan as $index => $item)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td>
                       {{ $item->produk->nama_produk }}
                    </td>
                    <td>
                        @if($item->ukuran->lebar_bahu!=null)
                        Panjang Bahu = {{$item->ukuran->lebar_bahu}}
                        <br>
                        @endif
                        @if($item->ukuran->panjang_tangan!=null)
                        Panjang Lengan = {{$item->ukuran->panjang_tangan}}
                        <br>
                        @endif
                        @if($item->ukuran->panjang_baju!=null)
                        Panjang Baju = {{$item->ukuran->panjang_baju}}
                        <br>
                        @endif
                        @if($item->ukuran->lingkar_dada!=null)
                        Lingkar Dada = {{$item->ukuran->lingkar_dada}}
                        <br>
                        @endif
                        @if($item->ukuran->lingkar_lengan!=null)
                        Lingkar Lengan = {{$item->ukuran->lingkar_lengan}}
                        <br>
                        @endif
                        @if($item->ukuran->lingkar_lenganbawah!=null)
                        Lingkar Lengan = {{$item->ukuran->lingkar_lenganbawah}}
                        <br>
                        @endif
                        @if($item->ukuran->lingkar_ketiak!=null)
                        Lingkar Leher = {{$item->ukuran->lingkar_ketiak}}
                        <br>
                        @endif
                        @if($item->ukuran->lingkar_pinggang!=null)
                        Lingkar Pinggang = {{$item->ukuran->lingkar_pinggang}}
                        <br>
                        @endif
                        @if($item->ukuran->lingkar_keris!=null)
                        Lingkar Keris = {{$item->ukuran->lingkar_keris}}
                        <br>
                        @endif
                        @if($item->ukuran->lingkar_panggul!=null)
                        Lingkar Paha = {{$item->ukuran->lingkar_panggul}}
                        <br>
                        @endif
                        @if($item->ukuran->panjang_celana!=null)
                        Panjang Celana = {{$item->ukuran->panjang_celana}}
                        <br>
                        @endif
                        @if($item->ukuran->lebar_bawah!=null)
                        Lebar Bawah = {{$item->ukuran->lebar_bawah}}
                        @endif
                        @if($item->ukuran->panjang_rok!=null)
                        Lingkar Lutut = {{$item->ukuran->panjang_rok}}
                        <br>
                        @endif
                        @if($item->ukuran->lingkar_bawah!=null)
                        Lingkar Lutut = {{$item->ukuran->lingkar_bawah}}
                        <br>
                        @endif
                        @if($item->ukuran->tinggi_duduk!=null)
                        Tinggi Duduk = {{$item->ukuran->tinggi_duduk}}
                        <br>
                        @endif
                    <td>{{$item->ukuran->catatan}}</td>
                    </td>
                    <td>
                        @if($item->ukuran->foto_model!='-')
                        <img src="/foto_model/{{ $item->ukuran->foto_model }}" width="500px">
                        @else
                        {{ $item->ukuran->foto_model}}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="card-body">
        <a class="btn btn-danger" href="{{ route('admin.cetak.ukuran', $pemesanan->id_pemesanan) }}" target="_blank">Cetak PDF</a>
        </div>
    </div>
</div>

@endsection