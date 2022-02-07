@extends('layouts.admin', ['title' => 'Data Admin'])

@section('title', 'Data Admin')

@section('content')

<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Data Admin</h3>
      <a href="/admin/admin/tambah" class="btn btn-primary float-right">Tambah</a>
    </div>
    <div class="card-body p-0">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Nomor Telepon</th>
            <th>Alamat</th>
            <th>Level</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($admin as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->username}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->password}}</td>
            <td>{{$item->nomorhp}}</td>
            <td>{{$item->alamat}}</td>
            <td>{{$item->level}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  
  @endsection