@extends('layouts.admin', ['title' => 'Tambah Pengeluaran'])

@section('title', 'Tambah Pengeluaran')

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Tambah Pengeluaran</h3>
        </div>
         <div class="card-body">
            <form action="/admin/pengeluaran" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tanggal_pengeluaran">Tanggal Pengeluaran</label>
                <input type="date" name="tanggal_pengeluaran" id="tanggal_pengeluaran" class="form-control @error('tanggal_pengeluaran') is-invalid @enderror"
                aria-describedby="helpId">
                @error('tanggal_pengeluaran')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="total_pengeluaran">Total Pengeluaran</label>
                <input type="text" name="total_pengeluaran" id="total_pengeluaran" class="form-control @error('total_pengeluaran') is-invalid @enderror">
                @error('total_pengeluaran')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="bukti_nota">File Bukti Nota</label>
                <input type="file" name="bukti_nota" id="bukti_nota" class="form-control @error('bukti_nota') is-invalid @enderror">
                @error('bukti_nota')
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