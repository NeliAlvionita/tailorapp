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
        <title> Cetak Laporan </title>
    </head>
    <body>
        <div class ="form-group">
            <p align="center"><b> Cetak Laporan </b></p>
            <table class="static" align="center" rules="all" border="1px" style="width: 95%;">
                <thead>
                    <tr>
                      <th>No</th>
                      <th>Pelanggan</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Total Pembayaran</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($cetaklaporan as $index => $item)
                    <tr>
                      <td>{{$index + 1}}</td>
                      <td>{{$item->name}}</td>
                      <td>{{$item->tanggal_pemesanan}}</td>
                      <td>{{$item->status_pemesanan}}</td>
                      <td>{{$item->total_pemesanan}}</td>
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