<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TanamanController extends Controller

{
    public function search_trash(Request $request)
    {
        $get_nama = $request->jenis;
        $datas = DB::table('tanaman')->where('deleted_at', '<>', '' )->where('jenis', 'LIKE', '%'.$get_nama.'%')->get();
        return view('tanaman.trash')
        ->with('datas', $datas);
    }
    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM tanaman WHERE id_tanaman = :id_tanaman', ['id_tanaman' => $id]);
        return redirect()->route('tanaman.index')->with('success', 'Data tanaman berhasil dihapus');
    }
    public function edit($id)
    {
        $data = DB::table('tanaman')->where('id_tanaman', $id)->first();
        return view('tanaman.edit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'id_tanaman' => 'required',
            'jenis' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE tanaman SET id_tanaman = :id_tanaman, jenis = :jenis, ukuran = :ukuran, harga = :harga, stok = :stok  WHERE id_tanaman = :id',
            [
                'id' => $id,
                'id_tanaman' => $request->id_tanaman,
                'jenis' => $request->jenis,
                'ukuran' => $request->ukuran,
                'harga' => $request->harga,
                'stok' => $request->stok,
            ]
        );
        return redirect()->route('tanaman.index')->with('success', 'Data tanaman berhasil diubah');
    }
    public function search(Request $request)
    {
        $get_nama = $request->jenis;
        $datas = DB::table('tanaman')->where('deleted_at', NULL )->where('jenis', 'LIKE', '%'.$get_nama.'%')->get();
        return view('tanaman.index')->with('datas', $datas);
    }
    public function index()
    {
        $datas = DB::select('select * from tanaman');
        return view('tanaman.index')
            ->with('datas', $datas);
    }
    public function create()
    {
        return view('tanaman.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_tanaman' => 'required',
            'jenis' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO tanaman(id_tanaman, jenis, ukuran, harga, stok) VALUES (:id_tanaman, :jenis, :ukuran, :harga, :stok)',
            [

                'id_tanaman' => $request->id_tanaman,
                'jenis' => $request->jenis,
                'ukuran' => $request->ukuran,
                'harga' => $request->harga,
                'stok' => $request->stok,
            ]
        );
        return redirect()->route('tanaman.index')->with('success', 'Data tanaman berhasil disimpan');
    }
}