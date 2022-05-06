@extends('pelanggan.layouts.master')
@section('slider')
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h2>{{ $title }}</h2>
        </div>
        <div class="col-md-3">
            <div class="input-group mb-3">
                <input wire:model="search" type="text" class="form-control" placeholder="Search . . ." aria-label="Search"
                    aria-describedby="basic-addon1">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <section class="products mb-5">
        <div class="row mt-4">
            @foreach($produk as $index => $item)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="
                        /foto_produk/{{ $item->foto_produk }}
                        " class="img-fluid">
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <h5><strong>
                                    {{ $item->nama_produk }} 
                                </strong> </h5>
                                <h5>
                                    Rp. {{ number_format($item->harga) }}
                                </h5>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <a href="{{ route('produk.detail', $item->id_produk) }}" class="btn btn-dark btn-block"><i class="fas fa-eye"></i> Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col">
                {{ $produk->links() }}
            </div>
        </div>
    </section>
</div>
@endsection