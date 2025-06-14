@extends('adminlte::page')

@section('title', 'Update Konsumen')

@section('content_header')
    <h1>@yield('title')</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('konsumen.update', $konsumen->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nik_konsumen">NIK konsumen</label>
                        <input type="text" name="nik_konsumen" maxlength="16" class="form-control @error('nik_konsumen') is-invalid @enderror" value="{{ old('nik_konsumen') ? old('nik_konsumen') : $konsumen->nik_konsumen }}" maxlength="19">
                        @error('nik_konsumen')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_konsumen">Nama konsumen</label>
                        <input type="text" name="nama_konsumen" maxlength="50" class="form-control @error('nama_konsumen') is-invalid @enderror" value="{{ old('nama_konsumen') ? old('nama_konsumen') : $konsumen->nama_konsumen }}" maxlength="50">
                        @error('nama_konsumen')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_telp_konsumen">Nomer Telepon konsumen</label>
                        <input type="tel" pattern="^(07|08)[0-9]{8,11}$" minlength="10" maxlength="13" name="no_telp_konsumen" class="form-control @error('no_telp_konsumen') is-invalid @enderror" value="{{ old('no_telp_konsumen') ? old('no_telp_konsumen') : $konsumen->no_telp_konsumen}}">
                        @error('no_telp_konsumen')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="alamat_konsumen">Alamat konsumen</label>
                        <input type="text" name="alamat_konsumen" maxlength="100" class="form-control @error('alamat_konsumen') is-invalid @enderror" value="{{ old('alamat_konsumen') ? old('alamat_konsumen') : $konsumen->alamat_konsumen }}" maxlength="100">
                        @error('alamat_konsumen')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gaji">Gaji Konsumen</label>
                        <input type="number" name="gaji" class="form-control @error('gaji') is-invalid @enderror" value="{{ old('gaji') ? old('gaji') : $konsumen->gaji }}" maxlength="10">
                        @error('gaji')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status_pernikahan">Status Rumah</label>
                        <select name="status_pernikahan" class="form-control @error('status_pernikahan') is-invalid @enderror">
                            <option value="">-- Pilih Status --</option>
                            <option value="Menikah" {{ old('status_pernikahan',$konsumen->status_pernikahan) == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                            <option value="Cerai Hidup" {{ old('status_pernikahan',$konsumen->status_pernikahan) == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                            <option value="Cerai Mati" {{ old('status_pernikahan',$konsumen->status_pernikahan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                             <option value="Belum Menikah" {{ old('status_pernikahan',$konsumen->status_pernikahan) == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                        </select>
                        @error('status_pernikahan')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="rumah_id">No SHM</label>
                        <select name="rumah_id" class="form-control @error('rumah_id') is-invalid @enderror">
                            <option value="">-- Pilih No SHM --</option>
                            @foreach($rumah as $item)
                                <option value="{{ $item->id }}" {{ old('rumah_id') == $item->id ? 'selected' : ($konsumen->rumah_id == $item->id ? 'selected' : null) }}>
                                    {{ $item->no_shm_rumah }}
                                </option>
                            @endforeach
                        </select>
                        @error('rumah_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="bank_id">Nama Bank</label>
                        <select name="bank_id" class="form-control @error('bank_id') is-invalid @enderror">
                            <option value="">-- Pilih Bank --</option>
                            @foreach($bank as $item)
                                <option value="{{ $item->id }}" {{ old('bank_id') == $item->id ? 'selected' : ($konsumen->bank_id == $item->id ? 'selected' : null) }}>
                                    {{ $item->nama_bank }}
                                </option>
                            @endforeach
                        </select>
                        @error('bank_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="marketing_id">Nama Marketing</label>
                        <select name="marketing_id" class="form-control @error('marketing_id') is-invalid @enderror">
                            <option value="">-- Pilih Nama Marketing --</option>
                            @foreach($marketing as $item)
                                <option value="{{ $item->id }}" {{ old('marketing_id') == $item->id ? 'selected' : ($konsumen->marketing_id == $item->id ? 'selected' : null) }}>
                                    {{ $item->nama_marketing }}
                                </option>
                            @endforeach
                        </select>
                        @error('marketing_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="text-right">
                <a href="{{ route('konsumen.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@stop
