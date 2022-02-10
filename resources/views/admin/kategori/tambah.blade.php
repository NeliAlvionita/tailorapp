@extends('layouts.admin', ['title' => 'Tambah Kategori'])

@section('title', 'Tambah Kategori')

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Tambah Kategori</h3>
        </div>
         <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="/admin/kategori" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="Nama Kategori"
                aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="gambar_ukuran">File Gambar Ukuran</label>
                <input type="file" name="gambar_ukuran" id="gambar_ukuran" class="form-control">
            </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="cancel" class="btn btn-default">Batal</button>
            </form>
        </div>
    </div>                   
@endsection