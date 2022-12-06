<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PenjualanController extends Controller
{
    public function search_trash(Request $request)
    {
        $get_nama = $request->nama_pembeli;
        $datas = DB::table('penjualan')->where('deleted_at', '<>', '' )->where('nama_pembeli', 'LIKE', '%'.$get_nama.'%')->get();
        return view('penjualan.trash')
        ->with('datas', $datas);
    }
    public function restore($id)
    {
        DB::update('UPDATE penjualan SET deleted_at=null WHERE id_penjualan = :id_penjualan', ['id_penjualan' => $id]);
        return redirect()->route('penjualan.trash');
    }
    public function trash()
    {
        $datas = DB::select('select * from penjualan where deleted_at is not null');
        return view('penjualan.trash')
            ->with('datas', $datas);
    }
    public function hide($id)
    {
        DB::update('UPDATE penjualan SET deleted_at=current_timestamp() WHERE id_penjualan = :id_penjualan', ['id_penjualan' => $id]);
        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil dihapus');
    }
    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM penjualan WHERE id_penjualan = :id_penjualan', ['id_penjualan' => $id]);
        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil dihapus');
    }
    public function edit($id)
    {
        $data = DB::table('penjualan')->where('id_penjualan', $id)->first();
        return view('penjualan.edit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'id_penjualan' => 'required',
            'nama_pembeli' => 'required',
            'total_harga' => 'required',
            'jumlah_barang' => 'required',
            'id_toko' => 'required',
            'id_tanaman' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE penjualan SET id_penjualan = :id_penjualan, nama_pembeli = :nama_pembeli, total_harga = :total_harga, jumlah_barang = :jumlah_barang, id_toko = :id_toko, id_tanaman = :id_tanaman WHERE id_penjualan = :id',
            [
                'id' => $id,
                'id_penjualan' => $request->id_penjualan,
                'nama_pembeli' => $request->nama_pembeli,
                'total_harga' => $request->total_harga,
                'jumlah_barang' => $request->jumlah_barang,
                'id_toko' => $request->id_toko,
                'id_tanaman' => $request->id_tanaman
            ]
        );
        return redirect()->route('penjualan.index')->with('success', 'Data Penjualan berhasil diubah');
    }
    public function search(Request $request)
    {
        $get_nama = $request->nama_pembeli;
        $datas = DB::table('penjualan')->where('deleted_at', NULL )->where('nama_pembeli', 'LIKE', '%'.$get_nama.'%')->get();
        return view('penjualan.index')->with('datas', $datas);
    }
    public function index()
    {
        $datas = DB::select('select * from penjualan where deleted_at is null');
        return view('penjualan.index')
            ->with('datas', $datas);
    }
    public function create()
    {
        return view('penjualan.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_penjualan' => 'required',
            'nama_pembeli' => 'required',
            'total_harga' => 'required',
            'jumlah_barang' => 'required',
            'id_toko' => 'required',
            'id_tanaman' => 'required'
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO penjualan(id_penjualan, nama_pembeli, total_harga, jumlah_barang, id_toko, id_tanaman) VALUES (:id_penjualan, :nama_pembeli, :total_harga, :jumlah_barang, :id_toko, :id_tanaman)',
            [
                'id_penjualan' => $request->id_penjualan,
                'nama_pembeli' => $request->nama_pembeli,
                'total_harga' => $request->total_harga,
                'jumlah_barang' => $request->jumlah_barang,
                'id_toko' => $request->id_toko,
                'id_tanaman' => $request->id_tanaman
            ]
        );
        return redirect()->route('penjualan.index')->with('success', 'Data penjualan berhasil disimpan');
    }
}