@extends('layouts.admin', ['title' => 'Ubah Footer'])

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Ubah Footer</h3>
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
            <form action="/admin/footer/{{$footer->id_footer}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Toko</label>
                <input type="text" name="nama_toko" id="nama_toko" class="form-control" value="{{ $footer->nama_toko }}" 
                aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Alamat Toko</label>
                <input type="text" name="alamat_toko" id="alamat_toko" class="form-control" value="{{ $footer->alamat_toko }}" 
                aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control" value="{{ $footer->nomor_telepon }}" 
                aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Email Toko</label>
                <input type="text" name="email_toko" id="email_toko" class="form-control" value="{{ $footer->email_toko }}" 
                aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Tentang</label>
                <input type="text" name="tentang" id="tentang" class="form-control" value="{{ $footer->tentang }}" 
                aria-describedby="helpId">
            </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="cancel" class="btn btn-default">Batal</button>
            </form>
        </div>
    </div>                   
@endsection