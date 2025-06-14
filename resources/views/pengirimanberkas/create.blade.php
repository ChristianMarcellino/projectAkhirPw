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
                                <option value="{{ $item->id }}" {{ old('konsumen') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nik_konsumen }}
                                </option>
                            @endforeach
                        </select>
                        @error('nik_konsumen')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="bank">Nama Bank</label>
                        <select name="bank" class="form-control @error('bank') is-invalid @enderror">
                            <option value="">-- Pilih bank --</option>
                            @foreach($bank as $item)
                                <option value="{{ $item->nama_bank }}" {{ old('Bank') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_bank }}
                                </option>
                            @endforeach
                        </select>
                        @error('nama_bank')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="marketing">Nama Marketing</label>
                        <select name="marketing" class="form-control @error('marketing') is-invalid @enderror">
                            <option value="">-- Pilih Marketing --</option>
                            @foreach($marketing as $item)
                                <option value="{{ $item->nik_marketing }}" {{ old('notaris_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nik_marketing }}
                                </option>
                            @endforeach
                        </select>
                        @error('notaris_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kirim">Tanggal Kirim</label>
                        <input type="date" name="tanggal_kirim" class="form-control @error('no_telp_bank') is-invalid @enderror" value="{{ old('tanggal_kirim') }}">
                        @error('tanggal_kirim')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status Pengiriman</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="">-- Pilih Status --</option>
                            <option value="diterima" {{ old('status') == 'diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="diproses" {{ old('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="ditolak" {{ old('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
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
