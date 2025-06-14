@extends('adminlte::page')

@section('title', 'Tambah Marketing')

@section('content_header')
    <h1>@yield('title')</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('marketing.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik_marketing">NIK Marketing</label>
                        <input type="text" name="nik_marketing" maxlength="16" class="form-control @error('nik_marketing') is-invalid @enderror" value="{{ old('nik_marketing') }}" maxlength="19">
                        @error('nik_marketing')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_marketing">Nama Marketing</label>
                        <input type="text" name="nama_marketing" maxlength="50" class="form-control @error('nama_marketing') is-invalid @enderror" value="{{ old('nama_marketing') }}" maxlength="50">
                        @error('nama_marketing')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_telp_marketing">Nomer Telepon Marketing</label>
                        <input type="tel" pattern="^(07|08)[0-9]{8,11}$" placeholder="Nomer Telepon Diawali dengan 08 atau 07" minlength="10" maxlength="13" name="no_telp_marketing" class="form-control @error('no_telp_marketing') is-invalid @enderror" value="{{ old('no_telp_marketing') }}">
                        @error('no_telp_marketing')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" name="tanggal_masuk" class="form-control @error('tanggal_masuk') is-invalid @enderror" value="{{ old('tanggal_masuk') }}">
                        @error('tanggal_masuk')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('marketing.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@stop
