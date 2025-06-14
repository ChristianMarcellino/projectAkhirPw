@extends('adminlte::page')

@section('title', 'Tambah Berkas Konsumen')

@section('content_header')
    <h1>@yield('title')</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('berkas_konsumen.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="konsumen_id">Nama Konsumen</label>
                        <select name="konsumen_id" class="form-control @error('konsumen_id') is-invalid @enderror">
                            <option value="">-- Pilih Konsumen --</option>
                            @foreach($konsumen as $item)
                                <option value="{{ $item->id }}" {{ old('konsumen_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_konsumen }}
                                </option>
                            @endforeach
                        </select>
                        @error('konsumen_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="ketersediaan_berkas">Ketersediaan Berkas</label>
                        <select name="ketersediaan_berkas" class="form-control @error('ketersediaan_berkas') is-invalid @enderror">
                            <option value="">-- Pilih Hasil --</option>
                            <option value="Tersedia" {{ old('ketersediaan_berkas') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="Belum Tersedia" {{ old('ketersediaan_berkas') == 'Belum Tersedia' ? 'selected' : '' }}>Belum Tersedia</option>
                        </select>
                        @error('ketersediaan_berkas')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="keterangan_berkas">Keterangan Berkas</label>
                        <input type="text" name="keterangan_berkas" class="form-control @error('keterangan_berkas') is-invalid @enderror" value="{{ old('tanggal_checking') }}">
                        @error('keterangan_berkas')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                     <div class="form-group">
                        <label for="berkas_id">Jenis Berkas</label>
                        <select name="berkas_id" class="form-control @error('berkas_id') is-invalid @enderror">
                            <option value="">-- Pilih Jenis Berkas--</option>
                            @foreach($jenisBerkas as $item)
                                <option value="{{ $item->id }}" {{ old('berkas_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->jenis_Berkas }}
                                </option>
                            @endforeach
                        </select>
                        @error('berkas_id')
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
