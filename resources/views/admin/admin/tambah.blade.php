@extends('layouts.admin', ['title' => 'Tambah User Admin/Pemilik'])

@section('title', 'Tambah User Admin/Pemilik')

@section('content')
    <div class="card">
       <div class="card-header">
            <h3 class="card-title">Tambah User Admin/Pemilik</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="admin/admin">
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="username">{{ __('Username') }}</label>
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group{{ $errors->has('level') ? 'has->error' : null }}">
                    <label for="level">{{ __('Level') }}</label>
                    <select name="level" id="" class="form-control">
                        <option value="" selected>-- Pilih Level --</option>
                        <option value="admin">Admin</option>
                        <option value="pemilik">Pemilik</option>
                    </select>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-0">
                        <button type="submit" class="btn btn-success">
                            {{ __('Submit') }}
                        </button>
                        <button type="cancel" class="btn btn-default">{{ __('Batal') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
