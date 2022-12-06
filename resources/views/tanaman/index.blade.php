@extends('tanaman.layout')
@section('content')
<a href="{{ route('penjualan.index') }}" type="button" class="btn btn rounded-3">Data Penjualan</a>
<a href="{{ route('tanaman.index') }}" type="button" class="btn btn rounded-3">Data Tanaman</a>
<a href="{{ route('toko.index') }}" type="button" class="btn btn rounded-3">Data Toko</a>
<a href="{{ route('home.index') }}" type="button" class="btn btn-danger rounded-3" style="float:right">Log Out</a>
<div style="margin-top: 20px">
    <div style="margin-bottom: +45px">
        <div style="float:right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('tanaman.index') }}" type="button">Data tanaman</a>
        </div>
    </div>
</div>
<h4 class="mt-5">Data Tanaman</h4>
<a href="{{ route('tanaman.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<div class="form-search" style="float:right">
    <form action="{{ route('tanaman.search') }}" method="get" accept-charset="utf-8">
        <div class="form-group" style="display:flex">
            <input type="search" id="jenis" name="jenis" class="form-control" placeholder="jenis">
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
            <th>ID Tanaman</th>
            <th>Jenis</th>
            <th>Ukuran</th>
            <th>Harga</th>
            <th>Stok</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_tanaman }}</td>
            <td>{{ $data->jenis}}</td>
            <td>{{ $data->ukuran}}</td>
            <td>{{ $data->harga}}</td>
            <td>{{ $data->stok}}</td>
            <td>
                <a href="{{ route('tanaman.edit', $data->id_tanaman) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_tanaman }}">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_tanaman }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('tanaman.delete', $data->id_tanaman) }}">
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