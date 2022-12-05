@extends('barang.layout')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Ubah Data Barang</h5>
        <form method="post" action="{{
route('barang.update', $data->id_barang) }}">
            @csrf
            <div class="mb-3">
                <label for="id_barang" class="form-label">ID Barang</label>
                <input type="text" class="form-control" id="id_barang" name="id_barang" value="{{ $data->id_barang}}">
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang"
                    value="{{ $data->nama_barang }}">
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" value="{{ $data->stok }}">
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $data->harga }}">
            </div>

            <div class="mb-3">
                <label for="jenis_barang" class="form-label">Jenis Barang</label>
                <input type="text" class="form-control" id="jenis_barang" name="jenis_barang"
                    value="{{ $data-> jenis_barang}}">
            </div>

            <div class="mb-3">
                <label for="id_supp" class="form-label">ID Supplier</label>
                <input type="text" class="form-control" id="id_supp" name="id_supp" value="{{ $data-> id_supp}}">
            </div>

            <div class="mb-3">
                <label for="id_gudang" class="form-label">ID Gudang</label>
                <input type="text" class="form-control" id="id_gudang" name="id_gudang" value="{{ $data-> id_gudang}}">
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
                <a class="btn btn-danger" href="{{route('barang.index')}}">Batal</a>
            </div>
        </form>
    </div>
</div>
@stop