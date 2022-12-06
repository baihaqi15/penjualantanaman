@extends('toko.layout')
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
        <h5 class="card-title fw-bolder mb-3">Ubah Data Toko</h5>
        <form method="post" action="{{ route('toko.update', $data->id_toko) }}">
            @csrf
            <div class="mb-3">
                <label for="id_toko" class="form-label">ID Toko</label>
                <input type="text" class="form-control" id="id_toko" name="id_toko" value="{{ $data->id_toko }}">
            </div>
            <div class="mb-3">
                <label for="alamat_toko" class="form-label">Alamat Toko</label>
                <input type="text" class="form-control" id="alamat_toko" name="alamat_toko" value="{{ $data->alamat_toko }}">
            </div>
            <div class="mb-3">
                <label for="admin" class="form-label">Admin</label>
                <input type="text" class="form-control" id="admin" name="admin" value="{{ $data->admin}}">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $data->username}}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="text" class="form-control" id="password" name="password" value="{{ $data->password}}">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Ubah" />
            </div>
        </form>
    </div>
</div>
@stop