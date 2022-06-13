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
        <title> nota pemesanan </title>
    </head>
    <body>
        <div class ="form-group">
            <p align="center"><b> SAN TAILOR
            </b></p>
            <div class="card-body">
                <p>Nama Pelanggan      : {{$pemesanan->name }}</p>
                <p>Namor Pemesanan     : {{$pemesanan->id_pemesanan }}</p>
                <p>Tanggal Pemesanan   : {{$pemesanan->tanggal_pemesanan }}</p>
                <p>Nama Penyetor       : {{$pemesanan->nama }}</p>
                <p>Bank                : {{$pemesanan->bank }}</p>
            </div>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Jumlah</th>
                      <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cetak_nota as $index => $item)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{$item->nama_produk}}</td>
                        <td>{{$item->harga}}</td>
                        <td>{{$item->jumlah}}</td>
                        <td>Rp. {{ number_format($item->subtotal)}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4"><strong>Total Pembayaran : </strong></td>
                        <td align="left"><strong>Rp. {{ number_format($pemesanan->total_pemesanan) }}</strong> </td>
                    </tr>
                </tbody>    
            </table>
            <br> <br> <br>
            <div class="card-body">
                <p>Hormat kami,</p>
                <p>San Tailor</p>
            </div>
            
        </div>

        <script type="text/javascript">
        window.print();
        </script>
    </body>
</html>