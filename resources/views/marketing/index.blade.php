@extends('adminlte::page')

@section('title', 'Data Marketing')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Marketing" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('marketing.create') }}'" />

    <x-adminlte-card title="Daftar Marketing" theme="info" icon="fas fa-list">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK Marketing</th>
                        <th>Nama Marketing</th>
                        <th>Nomor Telepon</th>
                        <th>Tanggal Masuk</th>
                        @can ('admin-only')
                        <th>Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($marketing as $item)
                        <tr>
                            <td>{{ $loop->iteration  + ($marketing->currentPage() - 1) * $marketing->perPage() }}</td>
                            <td>{{ $item->nik_marketing }}</td>
                            <td>{{ $item->nama_marketing }}</td>
                            <td>{{ $item->no_telp_marketing }}</td>
                            <td>{{ $item->tanggal_masuk }}</tdf>
                            @can ('admin-only')
                            <td>
                                <div class="d-flex align-items-center" style="gap:6px">
                                    <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm" title="Edit"
                                        class="rounded" onclick="window.location='{{ route('marketing.edit', $item->id) }}'" />
                                    
                                    <form action="{{ route('marketing.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <x-adminlte-button class="show_confirm rounded" data-nama="Marketing {{ $item->nama_marketing }}"
                                            theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                                    </form>
                                </div>
                            </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data marketing.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                <p class="mb-0">
                    Menampilkan {{ $marketing->firstItem() }} sampai {{ $marketing->lastItem() }} dari total {{ $marketing->total() }} data.
                </p>
            </div>
            <div>
                {{ $marketing->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </x-adminlte-card>
@endsection

