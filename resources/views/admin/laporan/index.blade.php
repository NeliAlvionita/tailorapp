@extends('layouts.admin', ['title' => 'Laporan'])

@section('title', 'Laporan')

@section('content')

<div class="card card-info card-outline">
    <div class="card-header">
      <h2 class="card-title">LAPORAN PEMESANAN</h2>
    </div>
    <div class="card-body">
      {{-- <form action="/admin/laporan/filer" method="POST">
      @csrf --}}
      <div class="form-group">
        <table class="table table-hover">
            <thead>
                <tr>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Akhir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control">
                    </td>
                    <td>
                        <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control">
                    </td>
                </tr>
            </tbody>
        </table>
      {{-- <button class="btn btn-warning" type="submit">Filter</button> --}}
      </div>
      {{-- </form> --}}
      {{-- <form action="/admin/laporan/#" method="POST"> --}}
        <a class="btn btn-danger" href="" onclick="this.href='/cetak-laporan/'+document.getElementById('tanggal_mulai').value +
        '/' + document.getElementById('tanggal_akhir').value" target="_blank">Cetak PDF</a>
      {{-- </form> --}}
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