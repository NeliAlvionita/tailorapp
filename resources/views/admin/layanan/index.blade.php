@extends('layouts.admin', ['title' => 'Data Layanan'])

@section('title', 'Data Layanan')

@section('content')

<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Data Layanan</h3>
      <a href="/admin/layanan/tambah" class="btn btn-primary float-right">Tambah</a>
    </div>
</div>
      <table id="layanan" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Id</th>
            <th>Nama Layanan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($layanan as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->id_layanan}}</td>
            <td>{{$item->nama_layanan}}</td>
            <td>
              <form action="/admin/layanan/{{$item->id_layanan}}" method="post">
                <a class="btn btn-warning" href="/admin/layanan/{{$item->id_layanan}}/ubah">Ubah</a>
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