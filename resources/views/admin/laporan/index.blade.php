@extends('layouts.admin', ['title' => 'Laporan'])

@section('title', 'Laporan')

@section('content')

<div class="card card-info card-outline">
    <div class="card-header">
      <h2 class="card-title">LAPORAN PEMESANAN</h2>
    </div>
    <div class="card-body">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="form-group">
              <label for="tanggal_mulai">Tanggal_Mulai</label>
              <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="tanggal_akhir">Tanggal Akhir</label>
              <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control">
            </div>
          </div>
          <div class="col">
            <div class="form-group">
            <a class="btn btn-danger" href="" onclick="this.href='/cetak-laporan/'+document.getElementById('tanggal_mulai').value +
            '/' + document.getElementById('tanggal_akhir').value" target="_blank">Cetak PDF</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<table id="laporan" class="table table-striped table-bordered" style="width:100%">
  <thead>
          <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total Pembayaran</th>
          </tr>
  </thead>
  <tbody>
          @foreach ($laporan as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->tanggal_pemesanan}}</td>
            <td>{{$item->status_pemesanan}}</td>
            <td>{{$item->total_pemesanan}}</td>
          </tr>
          @endforeach
  </tbody>
</table> 
  
@endsection