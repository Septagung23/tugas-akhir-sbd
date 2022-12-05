@extends('barang.layout')
@section('content')
<div class="title text-center fs-3 fw-semibold">Recycle Bin</div>
<a href="{{ route('gudang.index') }}">
    <button type="button" class="btn btn-primary rounded-0 mb-2">Kembali</button>
</a>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr class="text-light fw-semibold" style="background-color: rgb(51 65 85);">
                <th>No.</th>
                <th>Lokasi</th>
                <th>Kapasitas</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_gudang }}</td>
                <td>{{ $data->lokasi }}</td>
                <td>{{ $data->kapasitas }}</td>
                <td class="text-nowrap">
                    <form action="{{ route('gudang.restore', $data->id_gudang) }}" method="post" class="d-inline">
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