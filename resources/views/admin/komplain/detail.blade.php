@extends('layouts.admin', ['title' => 'Detail Komplain'])

@section('title', 'Detail Komplain')

@section('content')
<div class="card card-info card-outline">
    <div class="card-header">
        <h3 class="card-title">Detail Komplain</h3>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-6">
          <p>Nama   : {{$komplain->pemesanan->pelanggan->name }}</p>
          <p>Tanggal Pemesanan  : {{$komplain->pemesanan->tanggal_pemesanan }}</p>
          <p>Status Komplain: {{ $komplain->status_komplain }}</p>
          <p>Isi Komplain : </p>
          <p>{{ $komplain->isi_komplain}}</p>
        </div>
        <div class="col-lg-6">
          <p><strong> Bukti Komplain  :  </strong>  </p>
          <p><img src="/bukti_komplain/{{ $komplain->bukti_komplain }}" width="400px"> </p>
        </div>
      </div>
    </div>
</div>
<div class="card card-info card-outline">
  <div class="card-header">
      <h3 class="card-title">Respon Komplain</h3>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-lg-6">
        <form action="/admin/komplain/{{ $komplain->id_komplain }}" method="post"  enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <p>Update Status Komplain: </p>
          <div class="form-group">
            <select name="status_komplain" id="status_komplain" class="form-control">
              <option value="">-- Pilih Opsi --</option>
              <option value="Ditolak">Ditolak</option>
              <option value="Diterima">Diterima</option>
            </select> 
          </div>
          <p>Respon: </p>
          <div class="form-group">
            <input type="text" name="isi_respon" id="isi_respon" class="form-control @error('isi_respon') is-invalid @enderror" value = " {{ $komplain->isi_respon }}"
            aria-describedby="helpId">
            @error('isi_respon')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <p>Upload Bukti TF Pengembalian</p>
          <div class="form-group bukti">
            <input id="bukti_return" type="file" class="form-control @error('bukti_return') is-invalid @enderror" name="bukti_return"
            autocomplete="bukti_return" autofocus>
            @error('bukti_return')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div> <br>
          <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
      <div class="col-lg-6">
        <p> <strong> Respon: </strong> </p>
        <p> {{ $komplain->isi_respon }}</p>
        <p> <strong> Bukti Return (Jika Komplain Diterima)  :  </strong> </p>
        @if($komplain->bukti_return == NULL)
        -
        @else
        <p><img src="/bukti_return/{{ $komplain->bukti_return }}" width="400px"> </p>
        @endif
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script>
     $('select[name="status_komplain"]').on('change', function (){
        let status = $(this).val();
        if (status == 'Ditolak') {
            $('.bukti').hide();
        } else {
            $('.bukti').show();
        }
    });
</script>
@endsection