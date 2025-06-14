@extends('adminlte::page')

@section('title', 'Edit Jenis Berkas')

@section('content_header')
    <h1>@yield('title')</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('jenis_berkas.update', $jenis_berkas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_berkas">Id Berkas</label>
                        <input type="text" value="{{old('id_berkas') ? old('id_berkas') : $akad->id_berkas}}" name="id_berkas" class="form-control @error('id_berkas') is-invalid @enderror" maxlength="11">
                        @error('id_berkas')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jenis_Berkas">Jenis Berkas</label>
                        <input type="text" name="jenis_Berlas" class="form-control @error('jenis_Berlas') is-invalid @enderror" value="{{ old('jenis_Berkas') ? old('jenis_Berkas') : $jenis_berkas->jenis_Berkas}}" maxlength="50">
                        @error('jenis_Berkas')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            <div class="text-right">
                <a href="{{ route('bank.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@stop
