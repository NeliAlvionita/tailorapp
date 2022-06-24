@extends('layouts.admin', ['title' => 'Data Pengeluaran'])

@section('title', 'Data Pengeluaran')

@section('content')
@if (session('message'))
<div class="alert alert-success alert-dismissible">
  {{ session('message') }}
</div>
@endif
<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Data Pengeluaran</h3>
      @if(auth()->user()->level=='admin')
      <a href="/admin/pengeluaran/tambah" class="btn btn-primary float-right">Tambah</a>
      @endif
    </div>
</div>
      <table id="pengeluaran" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal Pengeluaran</th>
            <th>Total Pengeluaran</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pengeluaran as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->tanggal_pengeluaran}}</td>
            <td>Rp. {{ number_format($item->total_pengeluaran) }}</td>
            <td>
              <form action="/admin/pengeluaran/{{$item->id_pengeluaran}}" method="post">
                <a class="btn btn-primary" href="/admin/pengeluaran/{{$item->id_pengeluaran}}/detail">detail</a>
                @if(auth()->user()->level=='admin')
                <a class="btn btn-warning" href="/admin/pengeluaran/{{$item->id_pengeluaran}}/ubah">Ubah</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
                @endif
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  
  @endsection