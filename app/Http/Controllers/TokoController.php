<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TokoController extends Controller
{
    public function search_trash(Request $request)
    {
        $get_nama = $request->alamat_toko;
        $datas = DB::table('toko')->where('deleted_at', '<>', '' )->where('alamat_toko', 'LIKE', '%'.$get_nama.'%')->get();
        return view('toko.trash')
        ->with('datas', $datas);
    }
    public function delete($id)
    {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM toko WHERE id_toko = :id_toko', ['id_toko' => $id]);
        return redirect()->route('toko.index')->with('success', 'Data toko berhasil dihapus');
    }
    public function edit($id)
    {
        $data = DB::table('toko')->where('id_toko', $id)->first();
        return view('toko.edit')->with('data', $data);
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'id_toko' => 'required',
            'alamat_toko' => 'required',
            'admin' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE toko SET id_toko = :id_toko, alamat_toko = :alamat_toko, admin = :admin, username = :username, password = :password WHERE id_toko = :id',
            [
                'id' => $id,
                'id_toko' => $request->id_toko,
                'alamat_toko' => $request->alamat_toko,
                'admin' => $request->admin,
                'username' => $request->username,
                'password' => $request->password,
            ]
        );
        return redirect()->route('toko.index')->with('success', 'Data toko berhasil diubah');
    }
    public function search(Request $request)
    {
        $get_nama = $request->alamat_toko;
        $datas = DB::table('toko')->where('deleted_at', NULL )->where('alamat_toko', 'LIKE', '%'.$get_nama.'%')->get();
        return view('toko.index')->with('datas', $datas);
    }
    public function index()
    {
        $datas = DB::select('select * from toko');
        return view('toko.index')
            ->with('datas', $datas);
    }
    public function create()
    {
        return view('toko.add');
    }
    public function store(Request $request)
    {
        $request->validate([
            'admin' => 'required',
            'password' => 'required',
            'alamat_toko' => 'required',
            'id_toko' => 'required',
            'username' => 'required'
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO toko(admin, password, alamat_toko, id_toko, username) VALUES (:admin, :password, :alamat_toko, :id_toko, :username)',
            [
                'admin' => $request->admin,
                'password' => $request->password,
                'alamat_toko' => $request->alamat_toko,
                'id_toko' => $request->id_toko,
                'username' => $request->username
            ]
        );
        return redirect()->route('toko.index')->with('success', 'Data toko berhasil disimpan');
    }
}