@extends('layouts.admin', ['title' => 'Ubah Data Layanan'])
@section('title', 'Ubah Data Layanan')

@section('content')
<div class="card card-info card-outline">
  <div class="card-header">
    <h3 class="card-title">Ubah Data</h3>
  </div>
  <div class="card-body">
    <form action="/admin/layanan/{{$layanan->id_layanan}}" method="post">
      @method('PUT')
      @csrf
      <div class="form-group">
        <label for="nama_layanan">Nama Layanan</label>
        <input type="text" name="nama_layanan" id="nama_layanan" class="form-control" placeholder="Nama Layanan"
          value="{{$layanan->nama_layanan}}" aria-describedby="helpId">
      </div>
      <button type="submit" class="btn btn-success">Simpan</button>
    </form>
  </div>
</div>
@endsection