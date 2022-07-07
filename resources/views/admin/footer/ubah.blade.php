@extends('layouts.admin', ['title' => 'Ubah Footer'])

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Ubah Footer</h3>
        </div>
         <div class="card-body">
            <form action="/admin/footer/{{$footer->id_footer}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Toko</label>
                <input type="text" name="nama_toko" id="nama_toko" class="form-control @error('nama_toko') is-invalid @enderror" value="{{ $footer->nama_toko }}" 
                aria-describedby="helpId">
                @error('nama_toko')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Alamat Toko</label>
                <input type="text" name="alamat_toko" id="alamat_toko" class="form-control @error('alamat_toko') is-invalid @enderror" value="{{ $footer->alamat_toko }}" 
                aria-describedby="helpId">
                @error('alamat_toko')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control @error('namor_telepon') is-invalid @enderror" value="{{ $footer->nomor_telepon }}" 
                aria-describedby="helpId">
                @error('nomor_telepon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Nomor WhatsApp</label>
                <input type="text" name="nomor_wa" id="nomor_wa" class="form-control @error('nomor_wa') is-invalid @enderror" value="{{ $footer->nomor_wa }}" 
                aria-describedby="helpId">
                @error('nomor_wa')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Instagram</label>
                <input type="text" name="nama_ig" id="nama_ig" class="form-control @error('nama_ig') is-invalid @enderror" value="{{ $footer->nama_ig }}" 
                aria-describedby="helpId">
                @error('nama_ig')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Facebook</label>
                <input type="text" name="nama_fb" id="nama_fb" class="form-control @error('nama_fb') is-invalid @enderror" value="{{ $footer->nama_fb }}" 
                aria-describedby="helpId">
                @error('nama_fb')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Email Toko</label>
                <input type="text" name="email_toko" id="email_toko" class="form-control @error('email_toko') is-invalid @enderror" value="{{ $footer->email_toko }}" 
                aria-describedby="helpId">
                @error('email_toko')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Tentang</label>
                <input type="text" name="tentang" id="tentang" class="form-control @error('tentang') is-invalid @enderror" value="{{ $footer->tentang }}" 
                aria-describedby="helpId">
                @error('tentang')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="cancel" class="btn btn-default">Batal</button>
            </form>
        </div>
    </div>                   
@endsection