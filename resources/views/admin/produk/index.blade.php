@extends('layouts.admin', ['title' => 'Data Produk'])

@section('content')
@if (session('message'))
<div class="alert alert-success alert-dismissible">
  {{ session('message') }}
</div>
@endif
<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Data Produk</h3>
      <a href="/admin/produk/tambah" class="btn btn-primary float-right">Tambah</a>
    </div>
</div>
      <table id="produk" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Id</th>
            <th>Kategori</th>
            <th>Produk</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($produk as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->id_produk}}</td>
            <td>{{$item->kategori->nama_kategori}}</td>
            <td>{{$item->nama_produk}}</td>
            <td>
              <form action="/admin/produk/{{$item->id_produk}}" method="post">
                <a class="btn btn-primary" href="/admin/produk/{{$item->id_produk}}/detail">Detail</a>
                <a class="btn btn-warning" href="/admin/produk/{{$item->id_produk}}/ubah">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  
  @endsection