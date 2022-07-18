@extends('layouts.admin', ['title' => 'Detail Pemesanan'])

@section('title', 'Detail Pemesanan')

@section('content')

<div class="card card-info card-outline">
    <div class="card-header">
      <h2 class="card-title">Detail Pemesanan</h2>
    </div>
    <div class="card-body p-10 mt-15">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Pemesanan</th>
                    <th>Pelanggan</th>
                    <th>Pengiriman</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="border:none;">Tanggal   : {{ $pemesanan->tanggal_pemesanan }}</td>
                    <td  style="border:none;">Nama      : {{ $pemesanan->pelanggan->name }}</td>
                    @if($pemesanan->pilihan_pengiriman == "Dikirim")
                    <td  style="border:none;">Alamat    : {{ $pemesanan->alamat_pengiriman }}</td>
                    @elseif($pemesanan->pilihan_pengiriman == "Diambil")
                    <td  style="border:none;">{{$pemesanan->pilihan_pengiriman }}</td>
                    @endif
                </tr>
                <tr>
                    <td  style="border:none;">Total     : {{ $pemesanan->total_pemesanan}}</td>
                    <td style="border:none;">Nomor Hp  : {{ $pemesanan->pelanggan->nomorhp }}</td>
                    @if($pemesanan->pilihan_pengiriman == "Dikirim")
                      @if($pemesanan->ekspedisi == NULL)
                      <td style="border:none;">Ekspedisi : Belum Dikirim</td>
                      @else
                      <td style="border:none;">Ekspedisi : {{ $pemesanan->ekspedisi}}</td>
                      @endif
                    @endif
                </tr>
                <tr>
                    <td  style="border:none;">Status`   : {{ $pemesanan->status_pemesanan }}</td>
                    <td style="border:none;">Email     : {{ $pemesanan->pelanggan->email }}</td>
                    @if($pemesanan->pilihan_pengiriman == "Dikirim")
                      @if($pemesanan->no_resi == NULL)
                      <td style="border:none;">Nomor Resi: Belum Dikirim</td>
                      @else
                      <td style="border:none;">Nomor Resi: {{ $pemesanan->no_resi}}</td>
                      @endif
                    @endif
                </tr>
                <tr>
                  <td style="border:none;">Tanggal Dimulai Proses Jahit : 
                    @if($pemesanan->tanggal_mulai_jahit == NULL) belum diproses
                    @else{{ $pemesanan->tanggal_mulai_jahit}} @endif
                  </td>
                </tr>
                <tr>
                  <td style="border:none;">Perkiraan Selesai Waktu Jahit :
                    @if($pemesanan->tanggal_selesai_jahit == NULL) belum diproses
                    @else{{ $pemesanan->tanggal_selesai_jahit}} @endif </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card card-info card-outline">
    <div class="card-body p-0">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Bahan</th>
              <th>Jumlah</th>
              <th>Sub Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pemesanan->detail_pemesanan as $index => $item)
            <tr>
              <td>{{$index + 1}}</td>
              <td>{{$item->produk->nama_produk}}</td>
              @if($item->asal_bahan == "Bahan Penjahit")
              <td>{{$item->produk->harga}}</td>
              @else
              <td>{{$item->produk->harga_jahit}}</td>
              @endif
              <td>{{$item->asal_bahan }}</td>
              <td>{{$item->jumlah}}</td>
              <td>{{$item->subtotal}}</td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
</div>
<div class="row mt-4">
  <div class="col">
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">Update Status Pemesanan</h3>
        </div>
        <div class="card-body">
            <form action="/admin/pemesanan/{{$pemesanan->id_pemesanan}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id_pemesanan" value={{ $pemesanan->id_pemesanan}}>
            <div class="form-group">
              <select name="status_pemesanan" id="status_pemesanan" class="form-control">
                <option value="">-- Pilih Opsi --</option>
                <option value="Pesanan Ditolak">Pesanan Ditolak</option>
                <option value="Pesanan Diproses">Pesanan Diproses</option>
                <option value="Pesanan Dikirim">Pesanan Dikirim</option>
                <option value="Pesanan Diambil">Pesanan Diambil</option>
                <option value="Pesanan Selesai">Pesanan Selesai</option>
              </select> 
            </div>
            <div class="form-group bukti_return">
              <label for="bukti_return">Bukti Return (Jika Pesanan Ditolak)</label>
              <input type="file" name="bukti_return" id="bukti_return" class="form-control" 
              aria-describedby="helpId">
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
          </form>
        </div>
    </div>
    <div class="card card-info card-outline">
      <div class="card-header">
          <h3 class="card-title">Bukti Return</h3>
      </div>
      <div class="card-body">
        <img src="/bukti_return/{{ $pemesanan->bukti_return }}" width="400px">
      </div>
  </div>
  </div>
  <div class="col">
    <div class="card card-info card-outline">
      <div class="card-header">
          <h3 class="card-title">Tanggal Proses Jahit</h3>
      </div>
      <div class="card-body">
        <form action="/admin/pemesanan/{{$pemesanan->id_pemesanan}}/tanggal_proses" method="post">
          @csrf
          @method('PUT')
          <input type="hidden" name="id_pemesanan" value={{ $pemesanan->id_pemesanan}}>
          <div class="form-group">
            <label for="tanggal_mulai_jahit">Tanggal Mulai Jahit</label>
            <input type="date" name="tanggal_mulai_jahit" id="tanggal_mulai_jahit" class="form-control" 
            aria-describedby="helpId">
          </div>
          <div class="form-group">
            <label for="tanggal_selesai_jahit">Perkiraan Selesai</label>
            <input type="date" name="tanggal_selesai_jahit" id="tanggal_selesai_jahit" class="form-control" 
            aria-describedby="helpId">
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
        </form>
      </div>
    </div>
  </div>
  @if($pemesanan->pilihan_pengiriman == "Dikirim")
  <div class="col">
    <div class="card card-info card-outline">
      <div class="card-header">
          <h3 class="card-title">Pengiriman</h3>
      </div>
      <div class="card-body">
          <form action="/admin/pemesanan/{{$pemesanan->id_pemesanan}}/resi" method="post">
          @csrf
          @method('PUT')
          <input type="hidden" name="id_pemesanan" value={{ $pemesanan->id_pemesanan}}>
          <div class="form-group">
            <label for="ekspedisi">Nama Ekspedisi Pengiriman</label>
            <input type="text" name="ekspedisi" id="ekspedisi" disabled class="form-control" placeholder="Nama Ekspedisi" value="{{$pemesanan->ekspedisi}}"
            aria-describedby="helpId">
          </div>
          <div class="form-group">
            <label for="no_resi">Nomor Resi</label>
            <input type="text" name="no_resi" id="no_resi" class="form-control" placeholder="Nomor Resi" 
            @if($pemesanan->status_pemesanan != NULL) value = "{{$pemesanan->no_resi }}" @endif
            aria-describedby="helpId">
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
  @endif
</div>
<script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script>
     $('select[name="status_pemesanan"]').on('change', function (){
        let provinceId = $(this).val();
        if (provinceId == 'Pesanan Ditolak') {
            $('.bukti_return').show();
        } else {
            $('.bukti_return').hide();
        }
    });
</script>
  
@endsection