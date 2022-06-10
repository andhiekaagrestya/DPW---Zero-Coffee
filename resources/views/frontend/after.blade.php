
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

    <link rel="stylesheet" href="{{asset('css/after.css')}}" />

    <title>Finish</title>
  </head>
  <body>
r-->
    <div class="container">
        <div class="row">
            <div class="col-30">
                <div class="card mb-3">
                <img src="{{asset('images/pict.png')}}" class="card-img-top" alt="..." />
                <div class="card-body">
                <center><h3 class="card-title">Pesanan Anda Sedang Diproses</h3>
                <h5 class="card-title">Silahkan Tunggu Pesanan Anda Datang</h5>
                <p class="card-text">Selamat Menikmati Pesanan Anda</p>
                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                <a href="/" class="btn btn-primary">Back To Menu</a>
                </center>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
