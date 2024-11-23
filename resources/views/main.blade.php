<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiTobat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('nav')
    @yield('content')



    <nav class="navbar fixed-bottom bg-body-tertiary">
        {{-- <nav class="navbar fixed-bottom bg-body-tertiary" style="background-color: #28b452;"> --}}
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aplikasi stok obat sederhana</a>
            <a class="navbar-brand fluid-end" href="#">Dibuat Oleh &copy Abiyyu</a>
        </div>
    </nav>

    <!-- Bootstrap JS (with Popper.js for dropdown and collapse functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
