<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TA</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
    body {
        font-family: 'Nunito', sans-serif;
    }
    </style>
</head>

<body class="antialiased">

    <nav class="navbar navbar-expand-lg rounded-bottom bg-light navbar-light fw-semibold shadow mb-3">
        <div class="container d-flex">
            <a class="navbar-brand" href="{{route('detail.index')}}">Tugas Akhir</a>
            <div>
                <a class="navbar-brand" href="{{route('detail.index')}}">Detail</a>
                <a class="navbar-brand" href="{{route('barang.index')}}">Barang</a>
                <a class="navbar-brand" href="{{route('gudang.index')}}">Gudang</a>
                <a class="navbar-brand" href="{{route('supplier.index')}}">Supplier</a>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>

</html>








<!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav  d-flex justify-content-end">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('barang.index') }}">Barang</a>
        </li>
        <li class="nav-item d-flex justify-content-end">
            <a class="nav-link" href="{{route('barang.index') }}">Gudang</a>
        </li>
    </ul>
</div> -->

<!-- <script type="text/javascript">
$(function() {
    $('#datetimepicker').datetimepicker();
});
</script> -->