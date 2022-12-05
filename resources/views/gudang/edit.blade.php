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
        <h5 class="card-title fw-bolder mb-3">Ubah Data Gudang</h5>
        <form method="post" action="{{route('gudang.update', $data->id_gudang) }}">
            @csrf
            <div class="mb-3">
                <label for="id_gudang" class="form-label">ID Gudang</label>
                <input type="text" class="form-control" id="id_gudang" name="id_gudang" value="{{ $data->id_gudang}}">
            </div>

            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi Gudang</label>
                <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $data->lokasi }}">
            </div>

            <div class="mb-3">
                <label for="kapasitas" class="form-label">Kapasitas</label>
                <input type="text" class="form-control" id="kapasitas" name="kapasitas" value="{{ $data->kapasitas }}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
                <a class="btn btn-danger" href="{{route('gudang.index')}}">Batal</a>
            </div>
        </form>
    </div>
</div>
@stop