@extends('home.layout')
@section('content')
<a href="{{ route('login.create') }}" type="button" class="btn btn rounded-3">Login</a>
<h4 class="mt-5">Data Penjualan</h4>
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>No Penjualan</th>
            <th>Nama Pembeli</th>
            <th>Nama Barang</th>
            <th>Ukuran</th>
            <th>Jumlah barang</th>
            <th>alamat_toko</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_penjualan }}</td>
            <td>{{ $data->nama_pembeli }}</td>
            <td>{{ $data->jenis }}</td>
            <td>{{ $data->ukuran }}</td>
            <td>{{ $data->jumlah_barang }}</td>
            <td>{{ $data->alamat_toko }}</td>
            <td>{{ $data->harga }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop