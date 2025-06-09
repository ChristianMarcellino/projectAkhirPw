@extends('adminlte::page')

@section('title', 'Tambah Rumah')

@section('content_header')
    <h1>Tambah Rumah</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('rumah.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_shm_rumah">No SHM Rumah</label>
                        <input type="text" name="no_shm_rumah" class="form-control @error('no_shm_rumah') is-invalid @enderror" value="{{ old('no_shm_rumah') }}" maxlength="16">
                        @error('no_shm_rumah')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="blok_rumah">Blok Rumah</label>
                        <input type="text" name="blok_rumah" class="form-control @error('blok_rumah') is-invalid @enderror" value="{{ old('blok_rumah') }}" maxlength="5">
                        @error('blok_rumah')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_dp">Harga DP</label>
                        <input type="number" name="harga_dp" class="form-control @error('harga_dp') is-invalid @enderror" value="{{ old('harga_dp') }}" maxlength="10">
                        @error('harga_dp')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="luas_tanah_rumah">Luas Tanah</label>
                        <input type="number" name="luas_tanah_rumah" class="form-control @error('luas_tanah_rumah') is-invalid @enderror" value="{{ old('luas_tanah_rumah') }}">
                        @error('luas_tanah_rumah')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status_penjualan">Status Rumah</label>
                        <select name="status_penjualan" class="form-control @error('status_penjualan') is-invalid @enderror">
                            <option value="">-- Pilih Status --</option>
                            <option value="Tersedia" {{ old('status_penjualan') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="Booking" {{ old('status_penjualan') == 'Booking' ? 'selected' : '' }}>Booking</option>
                            <option value="Terjual" {{ old('status_penjualan') == 'Terjual' ? 'selected' : '' }}>Terjual</option>
                        </select>
                        @error('status_penjualan')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_pbg">Nama Proyek</label>
                        <select name="no_pbg" class="form-control @error('no_pbg') is-invalid @enderror">
                            <option value="">-- Pilih Proyek --</option>
                            @foreach($proyek as $item)
                                <option value="{{ $item->no_pbg }}" {{ old('no_pbg') == $item->no_pbg ? 'selected' : '' }}>
                                    {{ $item->nama_proyek }}
                                </option>
                            @endforeach
                        </select>
                        @error('no_pbg')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('rumah.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@stop
