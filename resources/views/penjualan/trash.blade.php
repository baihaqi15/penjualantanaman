@extends('penjualan.layout')
@section('content')
<a href="{{ route('penjualan.index') }}" type="button" class="btn btn rounded-3">Data Penjualan</a>
<a href="{{ route('tanaman.index') }}" type="button" class="btn btn rounded-3">Data Tanaman</a>
<a href="{{ route('toko.index') }}" type="button" class="btn btn rounded-3">Data Toko</a>
<a href="{{ route('home.index') }}" type="button" class="btn btn-danger rounded-3" style="float:right">Log Out</a>
<div style="margin-top: 20px">
    <div style="margin-bottom: +45px">
        <div style="float:right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('penjualan.index') }}" type="button">Data Penjualan</a>
            <a class="btn btn-outline-dark btn-sm" href="{{ route('penjualan.trash') }}" type="button">Trash</a>
        </div>
    </div>
</div>
<h4 class="mt-5">Data Trash Penjualan</h4>
<div class="form-search" style="float:right">
    <form action="{{ route('penjualan.search_trash') }}" method="get" accept-charset="utf-8">
        <div class="form-group" style="display:flex">
            <input type="text" id="nama_pembeli" name="nama_pembeli" class="form-control" placeholder="Nama pembeli">
            <button type="submit" class="btn btn-secondary">Search</button>
        </div>
    </form>
</div>
@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif
<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Pembeli</th>
            <th>Jumlah Barang</th>
            <th>Total Harga</th>
            <th>Dihapus Pada</th>
            <th>ID Toko</th>
            <th>ID Tanaman</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_penjualan }}</td>
            <td>{{ $data->nama_pembeli }}</td>
            <td>{{ $data->jumlah_barang }}</td>
            <td>{{ $data->total_harga }}</td>
            <td>{{ $data->id_toko}}</td>
            <td>{{ $data->id_tanaman }}</td>
            <td>{{ $data->deleted_at }}</td>
            <td style="float:right">
                <a href="{{ route('penjualan.restore', $data->id_penjualan) }}" type="button"
                    class="btn btn-success rounded-3">Restore</a>
                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_penjualan }}">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_penjualan }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('penjualan.delete', $data->id_penjualan) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop