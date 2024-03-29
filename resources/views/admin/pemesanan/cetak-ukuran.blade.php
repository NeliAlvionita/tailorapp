<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA=Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token()}}">
        <style>
            table.static {
                position: relative;
                border: 1px solid #543535;
            }
        </style>
        <title> print ukuran  pemesanan </title>
    </head>
    <body>
        <div class ="form-group">
            <p align="center"><b> Ukuran Pemesanan Nomor 
                {{$pemesanan->id_pemesanan }}
            </b></p>
            <div class="card-body">
                <p>Nama Pelanggan      : {{$pemesanan->name }}</p>
                <p>Tanggal Pemesanan   : {{$pemesanan->tanggal_pemesanan }}</p>
                <p>Nomor Telepon       : {{$pemesanan->nomorhp }}</p>
                <p>Email               : {{$pemesanan->email }}</p>
            </div>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th>Ukuran</th>
                      <th>Catatan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cetak_ukuran as $index => $item)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>
                           {{$item->nama_produk}}
                        </td>
                        <td>
                        @if($item->lebar_bahu!=null)
                        Lebar Bahu = {{$item->lebar_bahu}}
                        <br>
                        @endif
                        @if($item->panjang_tangan!=null)
                        Panjang Tangan = {{$item->panjang_tangan}}
                        <br>
                        @endif
                        @if($item->panjang_baju!=null)
                        Panjang Baju = {{$item->panjang_baju}}
                        <br>
                        @endif
                        @if($item->lingkar_dada!=null)
                        Lingkar Dada = {{$item->lingkar_dada}}
                        <br>
                        @endif
                        @if($item->lingkar_lengan!=null)
                        Lingkar Lengan = {{$item->lingkar_lengan}}
                        <br>
                        @endif
                        @if($item->lingkar_lenganbawah!=null)
                        Lingkar Lengan Bawah = {{$item->lingkar_lenganbawah}}
                        <br>
                        @endif
                        @if($item->lingkar_ketiak!=null)
                        Lingkar Ketiak = {{$item->lingkar_ketiak}}
                        <br>
                        @endif
                        @if($item->lingkar_pinggang!=null)
                        Lingkar Pinggang = {{$item->lingkar_pinggang}}
                        <br>
                        @endif
                        @if($item->lingkar_keris!=null)
                        Lingkar Keris = {{$item->lingkar_keris}}
                        <br>
                        @endif
                        @if($item->lingkar_panggul!=null)
                        Lingkar Panggul = {{$item->lingkar_panggul}}
                        <br>
                        @endif
                        @if($item->panjang_celana!=null)
                        Panjang Celana = {{$item->panjang_celana}}
                        <br>
                        @endif
                        @if($item->panjang_rok!=null)
                        Panjang Rok = {{$item->panjang_rok}}
                        <br>
                        @endif
                        @if($item->lingkar_bawah!=null)
                        Lingkar Bawah = {{$item->lingkar_bawah}}
                        <br>
                        @endif
                        @if($item->tinggi_duduk!=null)
                        Tinggi Duduk = {{$item->tinggi_duduk}}
                        <br>
                        @endif
                        </td>
                        <td>{{$item->catatan}}</td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script type="text/javascript">
        window.print();
        </script>
    </body>
</html>