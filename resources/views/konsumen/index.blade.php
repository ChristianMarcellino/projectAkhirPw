@extends('adminlte::page')

@section('title', 'Data Konsumen')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Konsumen" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('konsumen.create') }}'" />

        <form method="GET" action="{{ route('konsumen.index') }}" class="mb-3">
            <div class="row">
                <div class="col-md-3">
                    <input class="form-control" type="text" name="nama_konsumen" id="nama_konsumen" value="{{ request('nama_konsumen') }}" placeholder="Cari Berdasarkan Nama Konsumen" />
                </div>
                <div class="col-md-2">
                    <select name="marketing_id" class="form-control">
                        <option value="">-- Filter Nama Marketing --</option>
                        @foreach($marketing as $item)
                        <option value="{{ $item->id }}" {{ request('marketing_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_marketing }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="status_pernikahan" class="form-control">
                        <option value="">-- Filter Status Pernikahan --</option>
                        <option value="Menikah" {{ request('status_pernikahan') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                        <option value="Cerai Hidup" {{ request('status_pernikahan') == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                        <option value="Cerai Mati" {{ request('status_pernikahan') == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                        <option value="Belum Menikah" {{ request('status_pernikahan') == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="number" name="gaji" id="gaji" value="{{ request('gaji') }}" placeholder="Cari Berdasarkan Gaji" />
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('konsumen.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>
                

    <x-adminlte-card title="Daftar Konsumen" theme="info" icon="fas fa-list">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK Konsumen</th>
                        <th>Nama Konsumen</th>
                        <th>No Telepon Konsumen</th>
                        <th>Alamat Konsumen</th>
                        <th>Gaji</th>
                        <th>Status Pernikahan</th>
                        <th>No SHM</th>
                        <th>Nama Bank</th>
                        <th>Nama Marketing</th>
                        @can ('admin-only')
                        <th>Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($konsumen as $item)
                        <tr>
                            <td>{{ $loop->iteration  + ($konsumen->currentPage() - 1) * $konsumen->perPage() }}</td>
                            <td>{{ $item->nik_konsumen }}</td>
                            <td>{{ $item->nama_konsumen }}</td>
                            <td>{{ $item->no_telp_konsumen }}</td>
                            <td>{{ $item->alamat_konsumen }}</td>
                            <td>Rp{{number_format( $item->gaji ,0 ,',','.')}}</td>
                            <td>{{ $item->status_pernikahan }}</td>
                            <td>{{ $item->rumah->no_shm_rumah }}</td>
                            <td>{{ $item->bank->nama_bank }}</td>
                            <td>{{ $item->marketing->nama_marketing }}</tdf>
                            @can ('admin-only')
                            <td>
                                <div class="d-flex align-items-center" style="gap:6px">
                                    <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm" title="Edit"
                                        class="rounded" onclick="window.location='{{ route('konsumen.edit', $item->id) }}'" />
                                    
                                    <form action="{{ route('konsumen.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <x-adminlte-button class="show_confirm rounded" data-nama="Konsumen {{ $item->nama_konsumen }}"
                                            theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                                    </form>
                                </div>
                            </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="text-center">Tidak ada data konsumen.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                <p class="mb-0">
                    Menampilkan {{ $konsumen->firstItem() }} sampai {{ $konsumen->lastItem() }} dari total {{ $konsumen->total() }} data.
                </p>
            </div>
            <div>
                {{ $konsumen->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
        
    </x-adminlte-card>
@endsection

