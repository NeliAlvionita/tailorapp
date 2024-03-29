@extends('layouts.admin', ['title' => 'Data Kategori Pakaian'])

@section('title', 'Data Kategori Pakaian')

@section('content')
@if (session('message'))
<div class="alert alert-success alert-dismissible">
  {{ session('message') }}
</div>
@endif
<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Data Kategori Pakaian</h3>
      <a href="/admin/kategori/tambah" class="btn btn-primary float-right">Tambah</a>
    </div>
</div>
      <table id="kategori" class="table table-striped table-bordered" style="width:100%">
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
            <td>{{$item->id_kategori}}</td>
            <td>{{$item->nama_kategori}}</td>
            <td>
              <form action="/admin/kategori/{{$item->id_kategori}}" method="post">
                <a class="btn btn-primary" href="/admin/kategori/{{$item->id_kategori}}/detail">Detail</a>
                <a class="btn btn-warning" href="/admin/kategori/{{$item->id_kategori}}/ubah">Edit</a>
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