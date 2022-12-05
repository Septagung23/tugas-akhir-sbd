<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DetailController extends Controller
{
    public function index()
    {
        $datas = DB::select('SELECT b.*, g.lokasi, s.nama_supp FROM barang AS b JOIN gudang AS g ON b.id_gudang = g.id_gudang
        JOIN supplier AS s ON b.id_supp = s.id_supp');
        return view('detail')->with('datas', $datas);
    }

    public function search(Request $request)
    {
        $search = $request->q;
        $datas = DB::select('SELECT b.*, g.lokasi, s.nama_supp FROM barang AS b JOIN gudang AS g ON b.id_gudang = g.id_gudang
        JOIN supplier AS s ON b.id_supp = s.id_supp WHERE b.nama_barang LIKE \'%' . $search . '%\'');
        return view('detail')->with('datas', $datas);
    }
}