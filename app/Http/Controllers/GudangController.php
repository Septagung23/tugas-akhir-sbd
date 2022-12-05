<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GudangController extends Controller
{
    public function index()
    {
        $datas = DB::select('SELECT * FROM gudang WHERE is_deleted = 0');
        return view('gudang.index')->with('datas', $datas);
    }



    public function search(Request $request)
    {
        $search = $request->q;
        $datas = DB::select('SELECT * FROM gudang WHERE lokasi LIKE \'%' . $search . '%\'');
        return view('gudang.index')->with('datas', $datas);
    }


    // CREATE
    public function create()
    {
        return view('gudang.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_gudang' => 'required',
            'lokasi' => 'required',
            'kapasitas' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO gudang(id_gudang, lokasi, kapasitas) VALUES
        (:id_gudang, :lokasi, :kapasitas)',
            [
                'id_gudang' => $request->id_gudang,
                'lokasi' => $request->lokasi,
                'kapasitas' => $request->kapasitas,
            ]
        );
        return redirect()->route('gudang.index')->with('success', 'Data Gudang berhasil disimpan');
    }


    // UPDATE
    public function edit($id)
    {
        $data = DB::table('gudang')->where('id_gudang', $id)->first();
        return view('gudang.edit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'id_gudang' => 'required',
            'lokasi' => 'required',
            'kapasitas' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE gudang SET id_gudang = :id_gudang, lokasi = :lokasi, kapasitas = :kapasitas WHERE id_gudang = :id',
            [
                'id' => $id,
                'id_gudang' => $request->id_gudang,
                'lokasi' => $request->lokasi,
                'kapasitas' => $request->kapasitas,
            ]
        );
        return redirect()->route('gudang.index')->with('success', 'Data Barang berhasil diubah');
    }


    //DELETE
    public function delete($id)
    {
        DB::delete('delete from gudang where id_gudang = :id_gudang', ['id_gudang' => $id]);
        return redirect()->route('gudang.index');
    }

    //SOFT DELETE
    public function softDelete($id)
    {
        DB::update('UPDATE gudang SET is_deleted = 1 WHERE id_gudang = :id_gudang', ['id_gudang' => $id]);
        return redirect()->route('gudang.index');
    }

    //RECYCLE 
    public function recycle()
    {
        $datas = DB::select('SELECT * FROM gudang WHERE is_deleted = 1');
        return view('gudang.recycle')->with('datas', $datas);
    }

    //RESTORE
    public function restore($id)
    {
        DB::update('UPDATE gudang SET is_deleted = 0 WHERE id_gudang = :id_gudang', ['id_gudang' => $id]);
        return redirect()->route('gudang.recycle');
    }
}