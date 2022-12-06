@extends('penjualan.layout')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Ubah Penjualan</h5>
        <form method="post" action="{{ route('penjualan.update', $data->id_penjualan) }}">
            @csrf
            <div class="mb-3">
                <label for="id_penjualan" class="form-label">ID Produk</label>
                <input type="text" class="form-control" id="id_penjualan" name="id_penjualan" value="{{ $data->id_penjualan }}">>
            </div>
            <div class="mb-3">
                <label for="nama_pembeli" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama_pembeli" name="nama_pembeli" value="{{ $data->nama_pembeli }}">>
            </div>
            <div class="mb-3">
                <label for="total_harga" class="form-label">Total Harga</label>
                <input type="text" class="form-control" id="total_harga" name="total_harga" value="{{ $data->total_harga }}">>
            </div>
            <div class="mb-3">
                <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                <input type="text" class="form-control" id="jumlah_barang" name="jumlah_barang" value="{{ $data->jumlah_barang}}">>
            </div>
            <div class="mb-3">
                <label for="id_toko" class="form-label">ID Toko</label>
                <input type="text" class="form-control" id="id_toko" name="id_toko" value="{{ $data->id_toko }}">>
            </div>
            <div class="mb-3">
                <label for="id_tanaman" class="form-label">ID Tanaman</label>
                <input type="text" class="form-control" id="id_tanaman" name="id_tanaman" value="{{ $data->id_tanaman }}">>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
@stop