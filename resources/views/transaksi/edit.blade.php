@extends('adminlte::page')

@section('title', 'Edit Transaksi')

@section('content_header')
    <h1>Edit Transaksi</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_transaksi">Jenis Transaksi</label>
                            <input type="text" name="jenis_transaksi" class="form-control @error('jenis_transaksi') is-invalid @enderror"
                                value="{{ old('jenis_transaksi', $transaksi->jenis_transaksi) }}" placeholder="Contoh: Pembayaran Cicilan">
                            @error('jenis_transaksi')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tanggal_transaksi">Tanggal Transaksi</label>
                            <input type="date" name="tanggal_transaksi" class="form-control @error('tanggal_transaksi') is-invalid @enderror"
                                value="{{ old('tanggal_transaksi', $transaksi->tanggal_transaksi->format('Y-m-d')) }}">
                            @error('tanggal_transaksi')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jumlah_pembayaran">Jumlah Pembayaran</label>
                            <input type="number" name="jumlah_pembayaran" class="form-control @error('jumlah_pembayaran') is-invalid @enderror"
                                value="{{ old('jumlah_pembayaran', $transaksi->jumlah_pembayaran) }}" min="0" maxlength="10">
                            @error('jumlah_pembayaran')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_pembayaran">Jenis Pembayaran</label>
                            <select name="jenis_pembayaran" class="form-control @error('jenis_pembayaran') is-invalid @enderror">
                                <option value="">-- Pilih Jenis Pembayaran --</option>
                                <option value="tunai" {{ old('jenis_pembayaran', $transaksi->jenis_pembayaran) == 'tunai' ? 'selected' : '' }}>Tunai</option>
                                <option value="transfer" {{ old('jenis_pembayaran', $transaksi->jenis_pembayaran) == 'transfer' ? 'selected' : '' }}>Transfer</option>
                            </select>
                            @error('jenis_pembayaran')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_konsumen">Nama Konsumen</label>
                            <select name="id_konsumen" class="form-control @error('id_konsumen') is-invalid @enderror">
                                <option value="">-- Pilih Konsumen --</option>
                                @foreach($konsumen as $item)
                                    <option value="{{ $item->id }}" {{ old('id_konsumen', $transaksi->id_konsumen) == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama_konsumen }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_konsumen')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="text-right">
                    <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@stop
