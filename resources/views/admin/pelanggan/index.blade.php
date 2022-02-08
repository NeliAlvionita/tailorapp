@extends('layouts.admin', ['title' => 'Data Pelanggan'])

@section('title', 'Data Pelanggan')

@section('content')

<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Data Pelanggan</h3>
    </div>
    <div class="card-body p-0">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pelanggan as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->username}}</td> 
            <td>{{$item->alamat}}</td>
            <td>
              <form action="/admin/admin/{{$item->id}}" method="post">
                <a class="btn btn-primary" href="/admin/admin/{{$item->id}}/detail">Detail</a>
                <a class="btn btn-warning" href="/admin/admin/{{$item->id}}/ubah">Edit</a>
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