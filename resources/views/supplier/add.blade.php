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
        <h5 class="card-title fw-bolder mb-3">Tambah Supplier</h5>
        <form method="post" action="{{route('supplier.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id_supp" class="form-label">ID Supplier</label>
                <input type="text" class="form-control" id="id_supp" name="id_supp">
            </div>
            <div class="mb-3">
                <label for="nama_supp" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" id="nama_supp" name="nama_supp">
            </div>
            <div class="mb-3">
                <label for="kota_supp" class="form-label">Domisili</label>
                <input type="text" class="form-control" id="kota_supp" name="kota_supp">
            </div>
            <div class="mb-3">
                <label for="noTelp_supp" class="form-label">Kontak</label>
                <input type="text" class="form-control" id="noTelp_supp" name="noTelp_supp">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
                <a class="btn btn-danger" href="{{route('supplier.index')}}">Batal</a>
            </div>
        </form>
    </div>
</div>
@stop