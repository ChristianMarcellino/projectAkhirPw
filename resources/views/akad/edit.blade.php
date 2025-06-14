@extends('adminlte::page')

@section('title', 'Edit Akad')

@section('content_header')
    <h1>@yield('title')</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('akad.update', $akad->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="konsumen_id">Nama Konsumen</label>
                        <select name="konsumen_id" class="form-control @error('konsumen_id') is-invalid @enderror">
                            <option value="">-- Pilih Konsumen --</option>
                            @foreach($konsumen as $item)
                                <option value="{{ $item->id }}" {{ old('konsumen_id') == $item->id ? 'selected' : ($akad->konsumen_id == $item->id ? 'selected' : null) }}>
                                    {{ $item->nama_konsumen }}
                                </option>
                            @endforeach
                        </select>
                        @error('konsumen_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_akad">Tanggal Akad</label>
                        <input type="date" name="tanggal_akad" class="form-control @error('tanggal_akad') is-invalid @enderror" value="{{ old('tanggal_akad') ? old('tanggal_akad') : $akad->tanggal_akad}}">
                        @error('tanggal_akad')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tempat_akad">Tempat Akad</label>
                        <input type="text" name="tempat_akad" class="form-control @error('tempat_akad') is-invalid @enderror" value="{{ old('tempat_akad') ? old('tempat_akad') : $akad->tempat_akad}}" maxlength="100">
                        @error('tempat_akad')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('akad.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@stop
