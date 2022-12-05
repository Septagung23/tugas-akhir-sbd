@extends('barang.layout')
@section('content')
<div class="title text-center fs-3 fw-semibold">Recycle Bin</div>
<a href="{{ route('barang.index') }}">
    <button type="button" class="btn btn-primary rounded-0 mb-2">Kembali</button>
</a>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr class="text-light fw-semibold" style="background-color: rgb(51 65 85);">
                <th>No.</th>
                <th>Nama</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Jenis</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_barang }}</td>
                <td>{{ $data->nama_barang }}</td>
                <td>{{ $data->stok }}</td>
                <td>{{ $data->harga }}</td>
                <td>{{ $data->jenis_barang }}</td>
                <td class="text-nowrap">
                    <form action="{{ route('barang.restore', $data->id_barang) }}" method="post" class="d-inline">
                        @csrf
                        <button class="btn btn-secondary">Restore</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection