@extends('adminlte::page')

@section('title', 'Update Proyek')

@section('content_header')
    <h1>@yield('title')</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('proyek.update', $proyek->no_pbg) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_pbg">No PBG Proyek</label>
                        <input type="text" name="no_pbg" class="form-control" value="{{ old('no_pbg') ? old('no_pbg') : $proyek->no_pbg }}" maxlength="19">
                        @error('no_pbg')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_proyek">Nama Proyek</label>
                        <input type="text" name="nama_proyek" class="form-control" value="{{ old('nama_proyek') ? old('nama_proyek') : $proyek->nama_proyek }}" maxlength="50">
                        @error('nama_proyek')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jumlah_unit">Jumlah Unit</label>
                        <input type="number" name="jumlah_unit" class="form-control" value="{{ old('jumlah_unit') ? old('jumlah_unit') : $proyek->jumlah_unit }}">
                        @error('jumlah_unit')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="harga_rumah">Harga Rumah</label>
                        <input type="number" name="harga_rumah" class="form-control" value="{{ old('harga_rumah') ? old('harga_rumah') : $proyek->harga_rumah }}">
                        @error('harga_rumah')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="luas_tanah">Luas Tanah</label>
                        <input type="number" name="luas_tanah" class="form-control" value="{{ old('luas_tanah') ? old('luas_tanah') : $proyek->luas_tanah }}">
                        @error('luas_tanah')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_kelebihan_tanah">Harga Kelebihan Tanah</label>
                        <input type="number" name="harga_kelebihan_tanah" class="form-control" value="{{ old('harga_kelebihan_tanah') ? old('harga_kelebihan_tanah') : $proyek->harga_kelebihan_tanah }}">
                        @error('harga_kelebihan_tanah')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ old('alamat') ? old('alamat') : $proyek->alamat }}">
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
