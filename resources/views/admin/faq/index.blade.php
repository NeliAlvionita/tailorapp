@extends('layouts.admin', ['title' => 'Data FaQ'])

@section('title', 'Data FaQ')

@section('content')
@if (session('message'))
<div class="alert alert-success alert-dismissible">
  {{ session('message') }}
</div>
@endif
<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Data FaQ</h3>
      <a href="/admin/faq/tambah" class="btn btn-primary float-right">Tambah</a>
    </div>
</div>
      <table id="kategori" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Pertanyaan</th>
            <th>Jawaban</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($faq as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->pertanyaan}}</td>
            <td>{{$item->jawaban}}</td>
            <td>
              <form action="/admin/faq/{{$item->id_faq}}" method="post">
                <a class="btn btn-warning" href="/admin/faq/{{$item->id_faq}}/ubah">Edit</a>
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