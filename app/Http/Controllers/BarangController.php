<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    // READ
    public function index()
    {
        $datas = DB::select('SELECT * FROM barang WHERE is_deleted = 0');
        return view('barang.index')->with('datas', $datas);
    }


    public function search(Request $request)
    {
        $search = $request->q;
        $datas = DB::select('SELECT * FROM barang WHERE nama_barang LIKE \'%' . $search . '%\'');
        return view('barang.index')->with('datas', $datas);
    }


    // CREATE
    public function create()
    {
        return view('barang.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'id_supp' => 'required',
            'id_gudang' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO barang(id_barang,
        nama_barang, jenis_barang, harga, stok, id_supp, id_gudang) VALUES
        (:id_barang, :nama_barang, :jenis_barang, :harga,
        :stok, :id_supp, :id_gudang)',
            [
                'id_barang' => $request->id_barang,
                'nama_barang' => $request->nama_barang,
                'jenis_barang' => $request->jenis_barang,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'id_supp' => $request->id_supp,
                'id_gudang' => $request->id_gudang,
            ]
        );
        return redirect()->route('barang.index')->with('success', 'Data Barang berhasil disimpan');
    }


    // UPDATE
    public function edit($id)
    {
        $data = DB::table('barang')->where(
            'id_barang',
            $id
        )->first();
        return view('barang.edit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'nama_barang' => 'required',
            'jenis_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'id_supp' => 'required',
            'id_gudang' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE barang SET id_barang =
        :id_barang, nama_barang = :nama_barang, jenis_barang = :jenis_barang,
        harga = :harga, stok = :stok, id_supp = :id_supp, id_gudang = :id_gudang  WHERE id_barang = :id',
            [
                'id' => $id,
                'id_barang' => $request->id_barang,
                'nama_barang' => $request->nama_barang,
                'jenis_barang' => $request->jenis_barang,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'id_supp' => $request->id_supp,
                'id_gudang' => $request->id_gudang,
            ]
        );
        return redirect()->route('barang.index')->with('success', 'Data Barang berhasil diubah');
    }


    //DELETE
    public function delete($id)
    {
        DB::delete('DELETE from barang where id_barang = :id_barang', ['id_barang' => $id]);
        return redirect()->route('barang.index');
    }

    //SOFT DELETE
    public function softDelete($id)
    {
        DB::update('UPDATE barang SET is_deleted = 1 WHERE id_barang = :id_barang', ['id_barang' => $id]);
        return redirect()->route('barang.index');
    }

    //RECYCLE 
    public function recycle()
    {
        $datas = DB::select('SELECT * FROM barang WHERE is_deleted = 1');
        return view('barang.recycle')->with('datas', $datas);
    }

    //RESTORE
    public function restore($id)
    {
        DB::update('UPDATE barang SET is_deleted = 0 WHERE id_barang = :id_barang', ['id_barang' => $id]);
        return redirect()->route('barang.recycle');
    }
}



// //SEARCH 
    // public function search()
    // {
    //     $search = DB::select('SELECT * from barang WHERE nama_barang like %:nama_barang%');
    //     return view('barang.index')->with('search', $search);
    // }