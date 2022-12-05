<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index()
    {
        $datas = DB::select('SELECT * FROM supplier WHERE is_deleted = 0');
        return view('supplier.index')->with('datas', $datas);
    }

    //SEARCH
    public function search(Request $request)
    {
        $search = $request->q;
        $datas = DB::select('SELECT * FROM supplier WHERE nama_supp LIKE \'%' . $search . '%\'');
        return view('supplier.index')->with('datas', $datas);
    }

    // CREATE
    public function create()
    {
        return view('supplier.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_supp' => 'required',
            'nama_supp' => 'required',
            'noTelp_supp' => 'required',
            'kota_supp' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO supplier(id_supp, nama_supp, noTelp_supp, kota_supp) VALUES
        (:id_supp, :nama_supp, :noTelp_supp, :kota_supp)',
            [
                'id_supp' => $request->id_supp,
                'nama_supp' => $request->nama_supp,
                'noTelp_supp' => $request->noTelp_supp,
                'kota_supp' => $request->kota_supp,
            ]
        );
        return redirect()->route('supplier.index')->with('success', 'Data Supplier berhasil disimpan');
    }


    // UPDATE
    public function edit($id)
    {
        $data = DB::table('supplier')->where('id_supp', $id)->first();
        return view('supplier.edit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'id_supp' => 'required',
            'nama_supp' => 'required',
            'noTelp_supp' => 'required',
            'kota_supp' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE supplier SET id_supp = :id_supp, nama_supp = :nama_supp, noTelp_supp = :noTelp_supp, kota_supp = :kota_supp
                WHERE id_supp = :id',
            [
                'id' => $id,
                'id_supp' => $request->id_supp,
                'nama_supp' => $request->nama_supp,
                'noTelp_supp' => $request->noTelp_supp,
                'kota_supp' => $request->kota_supp,
            ]
        );
        return redirect()->route('supplier.index')->with('success', 'Data Supplier berhasil diubah');
    }

    //DELETE
    public function delete($id)
    {
        DB::delete('delete from supplier where id_supp = :id_supp', ['id_supp' => $id]);
        return redirect()->route('supplier.index');
    }

    //SOFT DELETE
    public function softDelete($id)
    {
        DB::update('UPDATE supplier SET is_deleted = 1 WHERE id_supp = :id_supp', ['id_supp' => $id]);
        return redirect()->route('supplier.index');
    }

    //RECYCLE 
    public function recycle()
    {
        $datas = DB::select('SELECT * FROM supplier WHERE is_deleted = 1');
        return view('supplier.recycle')->with('datas', $datas);
    }

    //RESTORE
    public function restore($id)
    {
        DB::update('UPDATE supplier SET is_deleted = 0 WHERE id_supp = :id_supp', ['id_supp' => $id]);
        return redirect()->route('supplier.recycle');
    }
}