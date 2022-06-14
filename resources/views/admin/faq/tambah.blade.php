@extends('layouts.admin', ['title' => 'Tambah Bahan'])

@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Tambah FaQ</h3>
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
            <form action="/admin/faq" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="pertanyaan">Pertanyaan</label>
                <input type="text" name="pertanyaan" id="pertanyaan" class="form-control" placeholder="pertanyaan"
                aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="jawaban">Jawaban</label>
                <input type="text" name="jawaban" id="ukuran" class="form-control" placeholder="jawaban"
                aria-describedby="helpId">
            </div>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="cancel" class="btn btn-default">Batal</button>
            </form>
        </div>
    </div>                   
@endsection