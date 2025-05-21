@extends('adminlte::page')

@section('title', 'Edit Rumah')

@section('content_header')
    <h1>Edit Rumah</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('rumah.update', $rumah->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_shm_rumah">No SHM Rumah</label>
                        <input type="text" value="{{$rumah->no_shm_rumah}}" name="no_shm_rumah" class="form-control @error('no_shm_rumah') is-invalid @enderror" value="{{ old('no_shm_rumah') }}" maxlength="18">
                        @error('no_shm_rumah')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="blok_rumah">Blok Rumah</label>
                        <input type="text" value="{{$rumah->blok_rumah}}" name="blok_rumah" class="form-control @error('blok_rumah') is-invalid @enderror" value="{{ old('blok_rumah') }}" maxlength="5">
                        @error('blok_rumah')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_dp">Harga DP</label>
                        <input type="number"value="{{$rumah->harga_dp}}" name="harga_dp" class="form-control @error('harga_dp') is-invalid @enderror" value="{{ old('harga_dp') }}">
                        @error('harga_dp')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kelebihan_tanah">Kelebihan Tanah</label>
                        <input type="number" value="{{$rumah->kelebihan_tanah}}" name="kelebihan_tanah" class="form-control @error('kelebihan_tanah') is-invalid @enderror" value="{{ old('kelebihan_tanah') }}">
                        @error('kelebihan_tanah')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status_rumah">Status Rumah</label>
                        <select name="status_rumah" class="form-control @error('status_rumah') is-invalid @enderror">
                            <option value="">-- Pilih Status --</option>
                            <option value="Tersedia" {{ old('status_rumah',$rumah->status_rumah) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="Booking" {{ old('status_rumah',$rumah->status_rumah) == 'Booking' ? 'selected' : '' }}>Booking</option>
                            <option value="Terjual" {{ old('status_rumah',$rumah->status_rumah) == 'Terjual' ? 'selected' : '' }}>Terjual</option>
                        </select>
                        @error('status_rumah')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="proyek_id">Proyek</label>
                        <select name="proyek_id" class="form-control @error('proyek_id') is-invalid @enderror">
                            <option value="">-- Pilih Proyek --</option>
                            @foreach($proyek as $item)
                                <option value="{{ $item->id }}" {{ old('proyek_id', $item->id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_proyek }}
                                </option>
                            @endforeach
                        </select>
                        @error('proyek_id')
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
