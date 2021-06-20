<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Book Store Marhaenika</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/{{ Auth::user()->level }}">Toko Buku Marhaenika</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{url('logout')}}">Logout</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->level }}
                    </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Change Password</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="card text-center mt-5">
            <div class="card-header">
                LAPORAN PASOK BERDASARKAN DISTRIBUTOR
            </div>
            <div class="card-body">
                <h5 class="card-title">Distributor : {{ $distributor['nama_distributor'] }}</h5>
                <p class="card-text">Tanggal Cetak : {{ $mytime }}</p>
                <div class="table-responsive">
                    <table class=" table table-hover table-bordered">
                        <thead>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>NO ISBN</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Jumlah Pasok</th>
                            <th>Tanggal</th>
                        </thead>
                        <tbody>
                            @foreach ($dataSuply as $book)    
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $book['book']['judul'] }}</td>
                                <td>{{ $book['book']['noisbn'] }}</td>
                                <td>{{ $book['book']['penulis'] }}</td>
                                <td>{{ $book['book']['penerbit'] }}</td>
                                <td>{{ $book['book']['harga_jual'] }}</td>
                                <td>{{ $book['book']['stok'] }}</td>
                                <td>{{ $book['jumlah'] }}</td>
                                <td>{{ $book['tanggal'] }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td><span class="text-bold font-weight-bold">Jumlah</span></td>
                                <td colspan="8"><span class="text-bold font-weight-bold text-center">{{ $countBook }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-muted">
                2 days ago
            </div>
        </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>