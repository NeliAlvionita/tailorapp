@extends('layouts.admin', ['title' => 'Tambah Bahan'])

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Tambah FaQ</h3>
            
        </div>
         <div class="card-body">
            <form action="/admin/faq" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="pertanyaan">Pertanyaan</label>
                <input type="text" name="pertanyaan" id="pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror" placeholder="pertanyaan"
                aria-describedby="helpId">
                @error('pertanyaan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="jawaban">Jawaban</label>
                <input type="text" name="jawaban" id="ukuran" class="form-control @error('jawaban') is-invalid @enderror" placeholder="jawaban"
                aria-describedby="helpId">
                @error('jawaban')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="cancel" class="btn btn-default">Batal</button>
                <a href="/admin/faq/" class="btn btn-primary float-right">Back</a>
            </form>
        </div>
    </div>                   
@endsection