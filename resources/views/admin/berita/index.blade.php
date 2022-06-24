@extends('layouts.admin', ['title' => 'Data Berita'])

@section('title', 'Data Berita')

@section('content')
@if (session('message'))
<div class="alert alert-success alert-dismissible">
  {{ session('message') }}
</div>
@endif
<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Data Berita</h3>
      <a href="/admin/berita/tambah" class="btn btn-primary float-right">Tambah</a>
    </div>
</div>
      <table id="berita" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Isi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($berita as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->judul}}</td>
            <td>{{$item->isi}}</td>
            <td>
              <form action="/admin/berita/{{$item->id_berita}}" method="post">
                <a class="btn btn-primary" href="/admin/berita/{{$item->id_berita}}/detail">Detail</a>
                <a class="btn btn-warning" href="/admin/berita/{{$item->id_berita}}/ubah">Edit</a>
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