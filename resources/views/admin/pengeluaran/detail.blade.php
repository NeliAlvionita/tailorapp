@extends('layouts.admin', ['title' => 'Detail Pengeluaran'])

@section('title', 'Detail Pengeluaran')

@section('content')

<div class="card card-info card-outline">
    <div class="card-header">
      <h3 class="card-title">Detail Pengeluaran</h3>
    </div>
    <div class="card-body">
        <p>ID : {{$pengeluaran->id_pengeluaran}}</p>
        <p>Tanggal Pengeluaran : {{$pengeluaran->tanggal_pengeluaran }}</p>
        <p>Total Pengeluaran : Rp. {{ number_format($pengeluaran->total_pengeluaran) }} </p>
    </div>
</div>
<div class="row">
    <div class="col-lg-7" >
        <div class="card card-info card-outline">
            @if(auth()->user()->level=='admin')
            <div class="card-header">
                <a href="/admin/pengeluaran/{{ $pengeluaran->id_pengeluaran }}/tambahdetail" class="btn btn-primary float-right">Tambah</a>
            </div>
            @endif
            <div class="card-body p-0">
                <table class="table table-hover">  
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Barang</th>
                      <th>Satuan</th>
                      <th>Jumlah</th>
                      <th>Harga /Satuan</th>
                      <th>Sub Total</th>
                      @if(auth()->user()->level=='admin')
                      <th>Aksi</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @if($detailpengeluaran == NULL)
                    <tr>
                        <td colspan="7">Data Kosong</td>
                    </tr>
                    @else
                    @foreach ($detailpengeluaran as $index => $item)
                    <tr>
                      <td>{{$index + 1}}</td>
                      <td>{{$item->nama_barang}}</td>
                      <td>{{$item->satuan}}</td>
                      <td>{{$item->jumlah}}</td>
                      <td>Rp. {{ number_format($item->harga) }}</td>
                      <td>Rp. {{ number_format($item->subtotal) }}</td>
                      @if(auth()->user()->level=='admin')
                      <td>
                        <form action="/admin/pengeluaran/{{$item->id_detailpengeluaran}}" method="post">
                          <a class="btn btn-warning" href="/admin/detailpengeluaran/{{$item->id_detailpengeluaran}}/ubah">Edit</a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                      </td>
                      @endif
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
              </table>
            </div>
        </div>
    </div>
    <div class="col-lg-5">
        <img src="/bukti_nota/{{ $pengeluaran->bukti_nota }}" width="550px">
    </div>
</div>

  
  @endsection