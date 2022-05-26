@extends('layouts.admin', ['title' => 'Data Pelanggan'])
@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
        <h3 class="card-title">Data Pelanggan</h3>
        <a href="/admin/pelanggan/" class="btn btn-primary float-right">Back</a>
        </div>
        <div class="card-body p-0">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama :</strong>
                    {{ $pelanggan->name}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Username :</strong>
                    {{ $pelanggan->username}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email :</strong>
                    {{ $pelanggan->email}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat :</strong>
                    {{ $pelanggan->alamat}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nomor Telepon :</strong>
                    {{ $pelanggan->nomorhp}}
                </div>
            </div>
        </div>
    </div>
@endsection