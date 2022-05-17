@extends('layouts.admin')
@section('content')
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
    {{Session::get('success')}}
</div>
@endif
@endsection