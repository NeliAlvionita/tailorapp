@extends('layouts.admin', ['title' => 'Data Testimoni Pelanggan'])

@section('content')

<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Data Testimoni Pelanggan</h3>
      <a href="/admin/kategori/tambah" class="btn btn-primary float-right">Tambah</a>
    </div>
</div>
      <table id="kategori" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>ID Pemesanan</th>
            <th>Tanggal Pemesanan</th>
            <th>Testimoni</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($testimoni as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->pemesanan->pelanggan->name}}</td>
            <td>{{$item->pemesanan->id_pemesanan}}</td>
            <td>{{$item->pemesanan->tanggal_pemesanan}}</td>
            <td>{{$item->isi_testimoni}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
  
  @endsection