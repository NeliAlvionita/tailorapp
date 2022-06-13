@extends('layouts.admin', ['title' => 'Data Bahan'])

@section('title', 'Data Bahan')

@section('content')
@if (session('message'))
<div class="alert alert-success alert-dismissible">
  {{ session('message') }}
</div>
@endif
<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Data Bahan</h3>
      <a href="/admin/bahan/tambah" class="btn btn-primary float-right">Tambah</a>
    </div>
</div>
      <table id="admin" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Bahan Kain</th>
            <th>Ukuran</th>
            <th>Harga Tambahan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($bahan as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->nama_bahan}}</td>
            <td>{{$item->ukuran}}</td>
            <td>Rp. {{ number_format($item->harga_tambah)}}</td>
            <td>
              <form action="/admin/bahan/{{$item->id_bahan}}" method="post">
                <a class="btn btn-warning" href="/admin/bahan/{{$item->id_bahan}}/ubah">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  
  @endsection