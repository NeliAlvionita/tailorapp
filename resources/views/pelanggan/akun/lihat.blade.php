@extends('pelanggan.layouts.app')

@section('content')
            <div class="card card-info card-outline">
                <div class="card-header">{{ Auth::user()->name }}</div>
                <div class="card-body">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->email}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->alamat}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nomorhp" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Telepon') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->nomorhp}}
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a class="btn btn-primary" href="{{ route('ubah.akun', Auth::user()->id) }}">Edit Akun</a>
                                <a class="btn btn-primary" href="/">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
@endsection
