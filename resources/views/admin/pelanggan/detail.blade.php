@extends('layouts.admin', ['title' => 'Data Pelanggan'])
@section('content')
    <div class="card card-info card-outline">
        <div class="card-header">
        <h3 class="card-title">Data Pelanggan</h3>
        <a href="/admin/pelanggan/" class="btn btn-primary float-right">Back</a>
        </div>
        <div class="card-body p-10 mt-10">
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group ">
                    <strong>Nama &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong>
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
                    <strong>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong>
                    {{ $pelanggan->email}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alamat &nbsp;&nbsp;&nbsp;&nbsp; :</strong>
                    {{ $pelanggan->alamat}}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Telepon &nbsp;&nbsp;&nbsp; :</strong>
                    {{ $pelanggan->nomorhp}}
                </div>
            </div>
        </div>
    </div>
@endsection