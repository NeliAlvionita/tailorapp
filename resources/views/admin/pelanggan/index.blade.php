@extends('layouts.admin', ['title' => 'Data Pelanggan'])

@section('title', 'Data Pelanggan')

@section('content')

<div class="card">
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
            <th>Email</th>
            <th>Password</th>
            <th>Nomor Telepon</th>
            <th>Alamat</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pelanggan as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->username}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->password}}</td>
            <td>{{$item->nomorhp}}</td>
            <td>{{$item->alamat}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  
  @endsection