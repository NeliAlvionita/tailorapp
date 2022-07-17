@extends('layouts.admin', ['title' => 'Data Testimoni Pelanggan'])

@section('content')

<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Data Komplain Pelanggan</h3>
    </div>
</div>
      <table id="kategori" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>ID Pemesanan</th>
            <th>Isi Komplain</th>
            <th>Status Komplain</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($komplain as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->pemesanan->id_pemesanan}}</td>
            <td>{{$item->isi_komplain}}</td>
            <td>{{$item->status_komplain}}</td>
            <td>
                <a class="btn btn-primary" href="/admin/komplain/{{ $item->id_komplain }}/detail">detail</a>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  
  @endsection