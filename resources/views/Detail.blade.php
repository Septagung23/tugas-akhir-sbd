@extends('barang.layout')
@section('content')

<div class="title text-center fs-3 fw-semibold mb-2">Detail Barang</div>
<form action="/search" method="get" class="input-group mb-2">
    <input type="text" name="q" class="form-control-sm" placeholder="Cari Produk...">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary rounded-0 bg-success text-light">Cari</button>
    </div>
</form>

<table class="table table-hover mt-2">
    <thead class="bg-primary text-light">
        <tr>
            <th>No.</th>
            <th>Produk</th>
            <th>Produsen</th>
            <th>Stok</th>
            <th>Harga</th>
            <th>Gudang</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_barang }}</td>
            <td>{{ $data->nama_barang }}</td>
            <td>{{ $data->nama_supp }}</td>
            <td>{{ $data->stok }}</td>
            <td>{{ $data->harga }}</td>
            <td>{{ $data->lokasi }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection