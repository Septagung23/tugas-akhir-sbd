@extends('barang.layout')
@section('content')

<h4 class="mt-6">Data Supplier</h4>
<a href="{{ route('supplier.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<a href="{{ route('supplier.recycle') }}" type="button" class="btn btn-secondary rounded-3">Recycle Bin</a>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<form action="/supplier/search" method="get" class="input-group my-3">
    <input type="text" name="q" class="form-control-sm" placeholder="Cari Supplier.....">
    <div class="input-group-append">
        <button class="btn btn-outline-secondary rounded-0">Cari</button>
    </div>
</form>

<table class="table table-hover mt-2">
    <thead>
        <tr>
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
            <td>
                <a href="{{ route('supplier.edit', $data->id_supp) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->


                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_supp}}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_supp }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('supplier.delete', $data->id_supp) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- SOFT DELETE -->
                <form action="{{ route('supplier.softDelete', $data->id_supp) }}" method="post" class="d-inline">
                    @csrf
                    <button class="btn" style="background-color: #ffafcc">Soft Delete</button>
                </form>
                <!-- SOFT DELETE -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop