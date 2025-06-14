@extends('adminlte::page')

@section('title', 'Tambah Jenis Berkas')

@section('content_header')
    <h1>@yield('title')</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('jenis_berkas.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_berkas">Id berkas</label>
                        <input type="text" name="id_berkas" class="form-control @error('id_berkas') is-invalid @enderror" value="{{ old('id_berkas') }}" maxlength="11">
                        @error('id_berkas')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
   
                     <div class="form-group">
                        <label for="jenis_Berkas">Jenis Berkas</label>
                        <input type="text" name="jenis_Berkas" class="form-control @error('jenis_Berkas') is-invalid @enderror" value="{{ old('jenis_Berkas') }}" maxlength="50">
                        @error('tempat_akad')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('jenis_berkas.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@stop
