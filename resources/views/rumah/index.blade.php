@extends('adminlte::page')

@section('title', 'Data Rumah')

@section('content_header')
    <h1>Data Rumah</h1>
@endsection

@section('content')
<div class="table-responsive">     
    <x-adminlte-button label="Tambah Rumah" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('rumah.create') }}'" />
        <form action="{{ route('rumah.index') }}" method="GET">

        </form>

        <form method="GET" action="{{ route('rumah.index') }}" class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <input class="form-control" type="text" name="blok_rumah" id="blok_rumah" value="{{ request('blok_rumah') }}" placeholder="Cari Berdasarkan Blok" />
                </div>
                <div class="col-md-3">
                    <select name="status_penjualan" class="form-control">
                        <option value="">-- Filter Status Rumah --</option>
                        <option value="Tersedia" {{ request('status_penjualan') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="Booking" {{ request('status_penjualan') == 'Booking' ? 'selected' : '' }}>Booking</option>
                        <option value="Terjual" {{ request('status_penjualan') == 'Terjual' ? 'selected' : '' }}>Terjual</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="proyek_id" class="form-control">
                        <option value="">-- Filter Proyek --</option>
                        @foreach($proyek as $item)
                        <option value="{{ $item->id }}" {{ request('proyek_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_proyek }}
                        </option>
                        
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('rumah.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>

    <x-adminlte-card title="Daftar Rumah" theme="info" icon="fas fa-list">
        <div class="table-responsive">
            
            <table class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No SHM</th>
                        <th>Blok</th>
                        <th>Harga DP</th>
                        <th>Nama Proyek</th>
                        <th>Luas Tanah Rumah</th>
                        <th>Status Penjualan</th>
                        <th>Harga Rumah</th>
                        @can ('admin-only')
                        <th>Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($rumah as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_shm_rumah }}</td>
                            <td>{{ $item->blok_rumah }}</td>
                            <td>Rp{{ number_format($item->harga_dp, 0, ',', '.') }}</td>
                            <td>{{ $item->proyek->nama_proyek ?? '-' }}</td>
                            <td>{{ $item->luas_tanah_rumah }}</td>
                            <td>{{ $item->status_penjualan }}</td>
                            <td>Rp{{ number_format($item->harga_dp + $item->proyek->harga_rumah + ($item->luas_tanah_rumah- $item->proyek->luas_tanah)*1350000, 0, ',', '.') }}</td>
                            @can ('admin-only')
                            <td>
                                <div class="d-flex align-items-center" style="gap:6px">
                                    <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm" title="Edit"
                                        class="rounded" onclick="window.location='{{ route('rumah.edit', $item->id) }}'" />
                                    
                                    <form action="{{ route('rumah.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <x-adminlte-button class="show_confirm rounded" data-nama="Rumah {{ $item->blok_rumah }} {{ $item->proyek->nama_proyek }}"
                                            theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                                    </form>
                                </div>
                            </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data Rumah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-adminlte-card>
</div>
@endsection



