@extends('adminlte::page')

@section('title', 'Update Notaris')

@section('content_header')
    <h1>@yield('title')</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('notaris.update', $notaris->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik_notaris">NIK Notaris</label>
                        <input type="text" name="nik_notaris" maxlength="16" class="form-control @error('nik_notaris') is-invalid @enderror" value="{{ old('nik_notaris') ? old('nik_notaris') : $notaris->nik_notaris }}" maxlength="19">
                        @error('nik_notaris')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_notaris">Nama Notaris</label>
                        <input type="text" name="nama_notaris" maxlength="50" class="form-control @error('nama_notaris') is-invalid @enderror" value="{{ old('nama_notaris') ? old('nama_notaris') : $notaris->nama_notaris }}" maxlength="50">
                        @error('nama_notaris')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat_notaris">Alamat Notaris</label>
                        <input type="text" name="alamat_notaris" maxlength="100" class="form-control @error('alamat_notaris') is-invalid @enderror" value="{{ old('alamat_notaris') ? old('alamat_notaris') : $notaris->alamat_notaris }}" maxlength="100">
                        @error('alamat_notaris')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_telp_notaris">Nomer Telepon Notaris</label>
                        <input type="tel" pattern="^(07|08)[0-9]{8,11}$" minlength="10" maxlength="13" name="no_telp_notaris" class="form-control @error('no_telp_notaris') is-invalid @enderror" value="{{ old('no_telp_notaris') ? old('no_telp_notaris') : $notaris->no_telp_notaris}}">
                        @error('no_telp_notaris')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('notaris.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@stop
