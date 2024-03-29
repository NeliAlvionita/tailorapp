@extends('layouts.admin', ['title' => 'Data Pemesanan'])

@section('title', 'Data Pemesanan')

@section('content')

<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Data Pemesanan</h3>
    </div>
</div>
      <table id="pemesanan" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Status Pemesanan</th>
            <th>Pembayaran DP</th>
            <th>Pelunasan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pemesanan as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->pelanggan->name}}</td>
            <td>{{$item->tanggal_pemesanan}}</td>
            <td>{{$item->total_pemesanan}}</td>
            <td>{{$item->status_pemesanan}}</td>
            <td>{{$item->pembayaran->status_pembayaran}}</td>
            <td>{{$item->pelunasan->status_pelunasan}}</td>
            <td>
              <form action="/admin/pemesanan/{{$item->id_pemesanan}}" method="post">
                <a class="btn btn-primary" href="/admin/pemesanan/{{$item->id_pemesanan}}/detail" style="margin:5px;">Detail</a>
                <a class="btn btn-success" href="/admin/pemesanan/{{$item->id_pemesanan}}/pembayaran" style="margin:5px;">Pembayaran</a>
                <a class="btn btn-warning" href="/admin/pemesanan/{{$item->id_pemesanan}}/ukuran" style="margin:5px; ">Ukuran</a>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  
  @endsection