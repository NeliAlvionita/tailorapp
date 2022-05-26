@extends('layouts.admin', ['title' => 'Data Pelanggan'])

@section('title', 'Data Pelanggan')

@section('content')

<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Data Pelanggan</h3>
    </div>
</div>
      <table id="pelanggan" class="table table-striped table-bordered" style="width:100%">
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
              <form action="/admin/pelanggan/{{$item->id}}" method="post">
                <a class="btn btn-primary" href="/admin/pelanggan/{{$item->id}}/detail">Detail</a>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
  
  @endsection