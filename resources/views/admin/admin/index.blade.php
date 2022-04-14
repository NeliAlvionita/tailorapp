@extends('layouts.admin', ['title' => 'Data Admin'])

@section('title', 'Data Admin')

@section('content')

<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Data Admin</h3>
      <a href="/admin/admin/tambah" class="btn btn-primary float-right">Tambah</a>
    </div>
</div>
      <table id="admin" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Level</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($admin as $index => $item)
          <tr>
            <td>{{$index + 1}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->username}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->level}}</td>
            <td>
              <form action="/admin/admin/{{$item->id}}" method="post">
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