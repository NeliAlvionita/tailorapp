<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cek Ongkir</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            Cek Ongkir
                        </div>
                        <div class="card-body">
                            <form action="/ongkir" class="horizontal" role="form" method="POST">
                                @csrf
                                <div class="form-group-sm">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Provinsi Asal</label>
                                            <select  name="province_origin" class="form-control provinsi-asal">
                                                <option value=""> --Provinsi-- </option>
                                                @foreach ($provinces as $province => $value)
                                                <option value="{{$province}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Kota Asal</label>
                                            <select name="city_origin" class="form-control kota-asal">
                                                <option> --Kota-- </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Provinsi Tujuan</label>
                                            <select name="province_destination" class="form-control provinsi-tujuan">
                                                <option value=""> --Provinsi-- </option>
                                                @foreach ($provinces as $province => $value)
                                                <option value="{{$province}}">{{$value}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Kota Tujuan</label>
                                            <select name="city_destination" class="form-control kota-tujuan">
                                                <option> --Kota-- </option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn-btn-primary"> Submit </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>       
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('select[name="province_origin"]').on('change', function (){
                    let provinceId = $(this).val();
                    if(provinceId){
                        jQuery.ajax({
                            url: '/ongkir/province/' + provinceId+ '/cities',
                            type:"GET",
                            dataType: "json",
                            success:function(data){
                                $('select[name="city_origin"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                            },
                        });
                    } else {
                        $('select[name="city_origin"]').empty();
                    }
                });
                $('select[name="province_destination"]').on('change', function (){
                    let provinceId = $(this).val();
                    if(provinceId){
                        jQuery.ajax({
                            url: '/ongkir/province/' + provinceId+ '/cities',
                            type:"GET",
                            dataType: "json",
                            success:function(data){
                                $('select[name="city_destination"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                                });
                            },
                        });
                    } else {
                        $('select[name="city_destination"]').empty();
                    }
                });
            });
        </script>
    </body>
</html>