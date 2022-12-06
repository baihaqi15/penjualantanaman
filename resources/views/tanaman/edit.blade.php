@extends('tanaman.layout')
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
        <h5 class="card-title fw-bolder mb-3">Tambah tanaman</h5>
        <form method="post" action="{{ route('tanaman.update', $data->id_tanaman) }}">
            @csrf
            <div class="mb-3">
                <label for="id_tanaman" class="form-label">ID tanaman</label>
                <input type="text" class="form-control" id="id_tanaman" name="id_tanaman" value="{{ $data->id_tanaman }}">>
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <input type="text" class="form-control" id="jenis" name="jenis" value="{{ $data->jenis }}">>
            </div>
            <div class="mb-3">
                <label for="ukuran" class="form-label">ukuran</label>
                <input type="text" class="form-control" id="ukuran" name="ukuran" value="{{ $data->ukuran }}">>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="{{ $data->harga }}">>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="text" class="form-control" id="stok" name="stok" value="{{ $data->stok }}">>
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
@stop
