@extends('toko.layout')
@section('content')
<a href="{{ route('penjualan.index') }}" type="button" class="btn btn rounded-3">Data Penjualan</a>
<a href="{{ route('tanaman.index') }}" type="button" class="btn btn rounded-3">Data Tanaman</a>
<a href="{{ route('toko.index') }}" type="button" class="btn btn rounded-3">Data Toko</a>
<a href="{{ route('home.index') }}" type="button" class="btn btn-danger rounded-3" style="float:right">Log Out</a>
<div style="margin-top: 20px">
    <div style="margin-bottom: +45px">
        <div style="float:right">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('toko.index') }}" type="button">Data Toko</a>
        </div>
    </div>
</div>
<h4 class="mt-5">Data toko</h4>
<a href="{{ route('toko.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>
<div class="form-search" style="float:right">
    <form action="{{ route('toko.search') }}" method="get" accept-charset="utf-8">
        <div class="form-group" style="display:flex">
        <input type="text" id="alamat_toko" name="alamat_toko" class="form-control" placeholder="alamat toko">
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
            <th>ID Toko</th>
            <th>Alamat Toko</th>
            <th>admin</th>
            <th>username</th>
            <th>password</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_toko }}</td>
            <td>{{ $data->alamat_toko}}</td>
            <td>{{ $data->admin}}</td>
            <td>{{ $data->username}}</td>
            <td>{{ $data->password}}</td>
            <td>
                <a href="{{ route('toko.edit', $data->id_toko) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
                <!-- TAMBAHKAN KODE DELETE DIBAWAH BARIS INI -->
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_toko }}">
                    Hapus
                </button>
                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_toko }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('toko.delete', $data->id_toko) }}">
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