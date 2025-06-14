@extends('adminlte::page')

@section('title', 'Edit Pengiriman Berkas')

@section('content_header')
    <h1>@yield('title')</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('pengirimanberkas.update', $pengirimanberkas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_konsumen">Nama Konsumen</label>
                        <select name="id_konsumen" class="form-control @error('id_konsumen') is-invalid @enderror">
                            <option value="">-- Pilih Konsumen --</option>
                            @foreach($konsumen as $item)
                                <option value="{{ $item->id }}" {{ old('id_konsumen', $pengirimanberkas->id_konsumen) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_konsumen }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_konsumen')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_bank">Nama Bank</label>
                        <select name="id_bank" class="form-control @error('id_bank') is-invalid @enderror">
                            <option value="">-- Pilih Bank --</option>
                            @foreach($bank as $item)
                                <option value="{{ $item->id }}" {{ old('id_bank', $pengirimanberkas->id_bank) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_bank }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_bank')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="id_marketing">Nama Marketing</label>
                        <select name="id_marketing" class="form-control @error('id_marketing') is-invalid @enderror">
                            <option value="">-- Pilih Marketing --</option>
                            @foreach($marketing as $item)
                                <option value="{{ $item->id }}" {{ old('id_marketing', $pengirimanberkas->id_marketing) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_marketing }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_marketing')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kirim">Tanggal Kirim</label>
                        <input type="date" name="tanggal_kirim" class="form-control @error('tanggal_kirim') is-invalid @enderror"
                            value="{{ old('tanggal_kirim', $pengirimanberkas->tanggal_kirim->format('Y-m-d')) }}">
                        @error('tanggal_kirim')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status Pengiriman</label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="">-- Pilih Status --</option>
                            <option value="diterima" {{ old('status', $pengirimanberkas->status) == 'diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="diproses" {{ old('status', $pengirimanberkas->status) == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="ditolak" {{ old('status', $pengirimanberkas->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                        @error('status')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('pengirimanberkas.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@stop
