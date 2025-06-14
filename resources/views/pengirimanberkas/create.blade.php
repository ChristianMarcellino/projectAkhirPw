@extends('adminlte::page')

@section('title', 'Tambah Pengiriman Berkas')

@section('content_header')
    <h1>@yield('title')</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('pengirimanberkas.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik_konsumen">NIK Konsumen</label>
                        <select name="nik_konsumen" class="form-control @error('nik_konsumen') is-invalid @enderror">
                            <option value="">-- Pilih NIK konsumen --</option>
                            @foreach($konsumen as $item)
                                <option value="{{ $item->id }}" {{ old('nik_konsumen') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nik_konsumen }}
                                </option>
                            @endforeach
                        </select>
                        @error('nik_konsumen')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_bank">Nama Bank</label>
                        <input type="text" name="nama_bank" class="form-control @error('nama_bank') is-invalid @enderror" value="{{ old('nama_bank') }}" maxlength="60">
                        @error('nama_bank')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_telp_bank">Nomer Telepon Bank</label>
                        <input type="tel" pattern="^(07|08)[0-9]{8,11}$" placeholder="Nomer Telepon Diawali dengan 08 atau 07" minlength="10" maxlength="13" name="no_telp_bank" class="form-control @error('no_telp_bank') is-invalid @enderror" value="{{ old('no_telp_bank') }}">
                        @error('no_telp_bank')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="notaris_id">Nama Notaris</label>
                        <select name="notaris_id" class="form-control @error('notaris_id') is-invalid @enderror">
                            <option value="">-- Pilih Notaris --</option>
                            @foreach($notaris as $item)
                                <option value="{{ $item->id }}" {{ old('notaris_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_notaris }}
                                </option>
                            @endforeach
                        </select>
                        @error('notaris_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('pengiriman_berkas.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@stop
