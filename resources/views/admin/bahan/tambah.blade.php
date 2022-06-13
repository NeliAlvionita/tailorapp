@extends('layouts.admin', ['title' => 'Tambah Bahan'])

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Tambah Bahan</h3>
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
            <form action="/admin/bahan" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_bahan">Nama Bahan</label>
                <input type="text" name="nama_bahan" id="nama_bahan" class="form-control" placeholder="Nama Bahan"
                aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="ukuran">Ukuran </label>
                <input type="text" name="ukuran" id="ukuran" class="form-control" placeholder="Ukuran"
                aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="harga_tambah">Harga</label>
                <input type="text" name="harga_tambah" id="harga_tambah" class="form-control" placeholder="Harga (Rp.)"
                aria-describedby="helpId">
            </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="cancel" class="btn btn-default">Batal</button>
            </form>
        </div>
    </div>                   
@endsection