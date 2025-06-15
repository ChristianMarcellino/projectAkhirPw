@extends('adminlte::page')

@section('title', 'Data Jenis Berkas')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Bank" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('jenis_berkas.create') }}'" />

    <x-adminlte-card title="Daftar Jenis Berkas" theme="info" icon="fas fa-list">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Berkas</th>
                        @can ('admin-only')
                        <th>Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($jenisBerkas as $item)
                        <tr>
                            <td>{{ $loop->iteration  + ($jenisBerkas->currentPage() - 1) * $jenisBerkas->perPage() }}</td>
                            <td>{{ $item->jenis_Berkas }}</td>
                            @can ('admin-only')
                            <td>
                                <div class="d-flex align-items-center" style="gap:6px">
                                    <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm" title="Edit"
                                        class="rounded" onclick="window.location='{{ route('jenis_berkas.edit', $item->id) }}'" />
                                    
                                    <form action="{{ route('jenis_berkas.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <x-adminlte-button class="show_confirm rounded" data-nama="Jenis Berkas {{ $item->jenis_Berkas }}"
                                            theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                                    </form>
                                </div>
                            </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data Jenis Berkas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                <p class="mb-0">
                    Menampilkan {{ $jenisBerkas->firstItem() }} sampai {{ $jenisBerkas->lastItem() }} dari total {{ $jenisBerkas->total() }} data.
                </p>
            </div>
            <div>
                {{ $jenisBerkas->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </x-adminlte-card>
@endsection

