@extends('layouts.admin', ['title' => 'Tambah Layanan'])

@section('title', 'Tambah Layanan')

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Tambah Layanan</h3>
        </div>
         <div class="card-body">
            <form action="/admin/layanan" method="post">
            @csrf
            <div class="form-group">
                <label for="nama_layanan">Nama Layanan</label>
                <input type="text" name="nama_layanan" id="nama_layanan" class="form-control" placeholder="Nama Layanan"
                aria-describedby="helpId">
            </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="cancel" class="btn btn-default">Batal</button>
            </form>
        </div>
    </div>                   
@endsection