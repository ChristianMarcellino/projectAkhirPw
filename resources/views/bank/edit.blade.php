@extends('adminlte::page')

@section('title', 'Edit Bank')

@section('content_header')
    <h1>@yield('title')</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('bank.update', $bank->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_bank">Nama Bank</label>
                        <input type="text" value="{{old('nama_bank') ? old('nama_bank') : $bank->nama_bank}}" name="nama_bank" class="form-control @error('nama_bank') is-invalid @enderror" maxlength="60">
                        @error('nama_bank')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat_bank">Alamat Bank</label>
                        <input type="text" name="alamat_bank" class="form-control @error('alamat_bank') is-invalid @enderror" value="{{ old('alamat_bank') ? old('alamat_bank') : $bank->alamat_bank}}" maxlength="100">
                        @error('alamat_bank')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_telp_bank">Nomer Telepon Bank</label>
                        <input type="tel" pattern="^(07|08)[0-9]{8,11}$" minlength="10" maxlength="13" name="no_telp_bank" class="form-control @error('no_telp_bank') is-invalid @enderror" value="{{ old('no_telp_bank') ? old('no_telp_bank') : $bank->no_telp_bank}}">
                        @error('no_telp_bank')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="notaris_id">Nama Notaris</label>
                        <select name="notaris_id" class="form-control @error('notaris_id') is-invalid @enderror">
                            <option value="">-- Pilih Notaris --</option>
                            @foreach($notaris as $item)
                                <option value="{{ $item->id }}" {{ old('notaris_id') ==  $item->id ? 'selected' : ($bank->notaris_id == $item->id ? 'selected' : null) }}>
                                    {{ $item->nama_notaris }}
                                </option>
                            @endforeach
                        </select>
                        @error('notaris_id')
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
