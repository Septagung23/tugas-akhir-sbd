@extends('barang.layout')
@section('content')
<div class="title text-center fs-3 fw-semibold">Recycle Bin</div>
<a href="{{ route('supplier.index') }}">
    <button type="button" class="btn btn-primary rounded-0 mb-2">Kembali</button>
</a>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr class="text-light fw-semibold" style="background-color: rgb(51 65 85);">
                <th>No.</th>
                <th>Produsen</th>
                <th>Kontak</th>
                <th>Kota</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
            <tr>
                <td>{{ $data->id_supp }}</td>
                <td>{{ $data->nama_supp }}</td>
                <td>(+62) {{ $data->noTelp_supp }}</td>
                <td>{{ $data->kota_supp }}</td>
                <td class="text-nowrap">
                    <form action="{{ route('supplier.restore', $data->id_supp) }}" method="post" class="d-inline">
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