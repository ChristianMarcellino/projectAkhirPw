@extends('adminlte::page')

@section('title', 'Tambah Proyek')

@section('content_header')
    <h1>@yield('title')</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('proyek.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_pbg">No PBG Proyek</label>
                        <input type="text" name="no_pbg" class="form-control @error('no_pbg') is-invalid @enderror" value="{{ old('no_pbg') }}" maxlength="19">
                        @error('no_pbg')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_proyek">Nama Proyek</label>
                        <input type="text" name="nama_proyek" class="form-control @error('nama_proyek') is-invalid @enderror" value="{{ old('nama_proyek') }}" maxlength="70">
                        @error('nama_proyek')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jumlah_unit">Jumlah Unit</label>
                        <input type="number" maxlength="10" name="jumlah_unit" class="form-control @error('jumlah_unit') is-invalid @enderror" value="{{ old('jumlah_unit') }}">
                        @error('jumlah_unit')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="harga_rumah">Harga Rumah</label>
                        <input type="number" maxlength="10" name="harga_rumah" class="form-control @error('harga_rumah') is-invalid @enderror" value="{{ old('harga_rumah') }}">
                        @error('harga_rumah')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="luas_tanah">Luas Tanah</label>
                        <input type="number" maxlength="10" name="luas_tanah" class="form-control @error('luas_tanah') is-invalid @enderror" value="{{ old('luas_tanah') }}">
                        @error('luas_tanah')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_kelebihan_tanah">Harga Kelebihan Tanah</label>
                        <input type="number" maxlength="10" name="harga_kelebihan_tanah" class="form-control @error('harga_kelebihan_tanah') is-invalid @enderror" value="{{ old('harga_kelebihan_tanah') }}">
                        @error('harga_kelebihan_tanah')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" maxlength="100" name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}">
                        @error('alamat')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('proyek.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@stop
