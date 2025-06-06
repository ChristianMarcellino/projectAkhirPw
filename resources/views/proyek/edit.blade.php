@extends('adminlte::page')

@section('title', 'Edit proyek')

@section('content_header')
    <h1>Edit Proyek</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('proyek.update', $proyek->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_shm_proyek">No SHM proyek</label>
                        <input type="text" value="{{old('no_shm_proyek') ? old('no_shm_proyek') : $proyek>no_shm_proyek}}" name="no_shm_proyek" class="form-control" maxlength="18">
                        @error('no_shm_proyek')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="blok_proyek">Blok proyek</label>
                        <input type="text" name="blok_proyek" class="form-control" value="{{ old('blok_proyek') ? old('blok_proyek') : $proyek>blok_proyek}}" maxlength="5">
                        @error('blok_proyek')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="harga_dp">Harga DP</label>
                        <input type="number"value="{{old('harga_dp') ? old('harga_dp') : $proyek->harga_dp}}" name="harga_dp" class="form-control">
                        @error('harga_dp')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kelebihan_tanah">Kelebihan Tanah</label>
                        <input type="number" value="{{old('kelebihan_tanah') ? old('kelebihan_tanah') : $proyek->kelebihan_tanah}}" name="kelebihan_tanah" class="form-control">
                        @error('kelebihan_tanah')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status_proyek">Status proyek</label>
                        <select name="status_proyek" class="form-control">
                            <option value="">-- Pilih Status --</option>
                            <option value="Tersedia" {{ old('status_proyek',$proyek->status_proyek) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                            <option value="Booking" {{ old('status_proyek',$proyek->status_proyek) == 'Booking' ? 'selected' : '' }}>Booking</option>
                            <option value="Terjual" {{ old('status_proyek',$proyek->status_proyek) == 'Terjual' ? 'selected' : '' }}>Terjual</option>
                        </select>
                        @error('status_proyek')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="proyek_id">Proyek</label>
                        <select name="proyek_id" class="form-control">
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
                <a href="{{ route('proyek.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@stop
