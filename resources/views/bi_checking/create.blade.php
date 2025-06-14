@extends('adminlte::page')

@section('title', 'Tambah Bi Checking')

@section('content_header')
    <h1>@yield('title')</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('bi_checking.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_checking">ID Checking</label>
                        <input type="text" name="id_checking" maxlength="16" class="form-control @error('id_checking') is-invalid @enderror" value="{{ old('id_checking') }}" maxlength="19">
                        @error('id_checking')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

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
                        <label for="hasil_checking">Hasil Checking</label>
                        <select name="hasil_checking" class="form-control @error('hasil_checking') is-invalid @enderror">
                            <option value="">-- Pilih Hasil --</option>
                            <option value="kol 1" {{ old('hasil_checking') == 'kol 1' ? 'selected' : '' }}>kol 1</option>
                            <option value="kol 2" {{ old('hasil_checking') == 'kol 2' ? 'selected' : '' }}>kol 2</option>
                            <option value="kol 3" {{ old('hasil_checking') == 'kol 3' ? 'selected' : '' }}>kol 3</option>
                            <option value="kol 4" {{ old('hasil_checking') == 'kol 4' ? 'selected' : '' }}>kol 4</option>
                            <option value="kol 5" {{ old('hasil_checking') == 'kol 5' ? 'selected' : '' }}>kol 5</option>
                        </select>
                        @error('hasil_checking')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_checking">Tanggal Checking</label>
                        <input type="date" name="tanggal_checking" class="form-control @error('tanggal_checking') is-invalid @enderror" value="{{ old('tanggal_checking') }}">
                        @error('tanggal_checking')
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
