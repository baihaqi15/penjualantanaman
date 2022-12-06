<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $datas = DB::table('penjualan')
                ->join('toko', 'toko.id_toko', '=', 'penjualan.id_toko')
                ->join('tanaman', 'tanaman.id_tanaman', '=', 'penjualan.id_tanaman')   
                ->get();

        return view('home.index')
            ->with('datas', $datas);
    }
}   