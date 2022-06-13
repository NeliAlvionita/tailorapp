@extends('layouts.admin', ['title' => 'Footer'])

@section('title', 'Footer')

@section('content')
@if (session('message'))
<div class="alert alert-success alert-dismissible">
  {{ session('message') }}
</div>
@endif
<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Footer</h3>
    </div>
</div>
      <table id="admin" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>Nama Toko</th>
            <th>Alamat Toko</th>
            <th>Nomor Telepon</th>
            <th>Email</th>
            <th>Tentang</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($footer as $index => $item)
          <tr>
            <td>{{$item->nama_toko}}</td>
            <td>{{$item->alamat_toko}}</td>
            <td>{{$item->nomor_telepon}}</td>
            <td>{{$item->email_toko}}</td>
            <td>{{$item->tentang}}</td>
            <td>
                <a class="btn btn-warning" href="/admin/footer/{{$item->id_footer}}/ubah">Edit</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  
  @endsection