@extends('pelanggan.layouts.app', ['title' => 'Tambah Kategori'])

@section('title', 'Tambah Testimoni')

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Tambah Testimoni</h3>
        </div>
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
            <div class="row mt-4">
                <div class="col">
                    <h4>Pemesanan No {{$pemesanan->id_pemesanan }}</h4>
                    <hr>
                    <p>Tanggal Pemesanan: <strong> {{$pemesanan->tanggal_pemesanan}} </p>
                    <p>Total Pemesanan: <strong> {{$pemesanan->total_pemesanan}} </p>
                </div>
            </div>
            <form action="/pelanggan/riwayat/testimoni" method="post">
            @csrf
            <input type="hidden" name="id_pemesanan" value="{{ $pemesanan->id_pemesanan }}">
            <div class="form-group">
                <label for="nama_kategori">Isi Testimoni</label>
                <input type="text" name="isi_testimoni" id="isi_testimoni" class="form-control" placeholder="Isi Testimoni atas Pesanan Anda"
                aria-describedby="helpId">
            </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>                   
@endsection