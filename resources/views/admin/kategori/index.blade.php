@extends('layouts.admin', ['title' => 'Data Admin'])

@section('title', 'Data Kategori Pakaian')

@section('content')

<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Data Kategori Pakaian</h3>
      <a href="/admin/layanan/tambah" class="btn btn-primary float-right">Tambah</a>
    </div>
    <div class="card-body p-0">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Id</th>
            <th>Nama Kategori Pakaian</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kategori as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->id_layanan}}</td>
            <td>{{$item->nama_layanan}}</td>
            <td>
              <form action="/admin/layanan/{{$item->id}}" method="post">
                <a class="btn btn-primary" href="/admin/layanan/{{$item->id}}/detail">Detail</a>
                <a class="btn btn-warning" href="/admin/layanan/{{$item->id}}/ubah">Edit</a>
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