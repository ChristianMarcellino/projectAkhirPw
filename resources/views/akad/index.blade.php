@extends('adminlte::page')

@section('title', 'Data Akad')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Akad" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('akad.create') }}'" />
        <form method="GET" action="{{ route('akad.index') }}" class="mb-3">
            <div class="row align-items-end">
                <div class="col-md-3">
                    <label for="tanggal_akad_awal">Tanggal Akad Dimulai Dari</label>
                    <input class="form-control" type="date" name="tanggal_akad_awal" id="tanggal_akad_awal" value="{{ request('tanggal_akad_awal') }}"/>
                </div>
                <div class="col-md-3">
                    <label for="tanggal_akad_akhir">Tanggal Akad Hingga</label>
                    <input class="form-control" type="date" name="tanggal_akad_akhir" id="tanggal_akad_akhir" value="{{ request('tanggal_akad_akhir') }}"/>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('akad.index') }}" class="btn btn-secondary">Reset</a>
                </div>
            </div>
        </form>
    <x-adminlte-card title="Daftar Akad" theme="info" icon="fas fa-list">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Konsumen</th>
                        <th>Tanggal Akad</th>
                        <th>Tempat Akad</th>
                        @can ('admin-only')
                        <th>Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($akad as $item)
                        <tr>
                            <td>{{ $loop->iteration  + ($akad->currentPage() - 1) * $akad->perPage() }}</td>
                            <td>{{ $item->konsumen->nama_konsumen ?? '-' }}</td>
                            <td>{{ $item->tanggal_akad }}</td>
                            <td>{{ $item->tempat_akad }}</td>
                            @can ('admin-only')
                            <td>
                                <div class="d-flex align-items-center" style="gap:6px">
                                    <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm" title="Edit"
                                        class="rounded" onclick="window.location='{{ route('akad.edit', $item->id) }}'" />
                                    
                                    <form action="{{ route('akad.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <x-adminlte-button class="show_confirm rounded" data-nama="Akad {{ $item->konsumen->nama_konsumen }}"
                                            theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                                    </form>
                                </div>
                            </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data akad.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                <p class="mb-0">
                    Menampilkan {{ $akad->firstItem() }} sampai {{ $akad->lastItem() }} dari total {{ $akad->total() }} data.
                </p>
            </div>
            <div>
                {{ $akad->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </x-adminlte-card>
@endsection

