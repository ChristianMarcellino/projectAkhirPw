@extends('adminlte::page')

@section('title', 'Data Notaris')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Notaris" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('notaris.create') }}'" />

    <x-adminlte-card title="Daftar Notaris" theme="info" icon="fas fa-list">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK Notaris</th>
                        <th>Nama Notaris</th>
                        <th>Alamat Notaris</th>
                        <th>No Telepon Notaris</th>
                       @can ('admin-only')
                        <th>Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($notaris as $item)
                        <tr>
                            <td>{{ $loop->iteration  + ($notaris->currentPage() - 1) * $notaris->perPage() }}</td>
                            <td>{{ $item->nik_notaris }}</td>
                            <td>{{ $item->nama_notaris }}</td>
                            <td>{{ $item->alamat_notaris }}</td>
                            <td>{{ $item->no_telp_notaris }}</td>
                           @can ('admin-only')
                           <td>
                            <div class="d-flex align-items-center" style="gap:6px">
                                <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm" title="Edit"
                                    class="rounded" onclick="window.location='{{ route('notaris.edit', $item->id) }}'" />

                                <form action="{{ route('notaris.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <x-adminlte-button class="show_confirm rounded" data-nama="Notaris {{ $item->nama_notaris }}"
                                        theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                                </form>
                            </div>
                        </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data notaris.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                <p class="mb-0">
                    Menampilkan {{ $notaris->firstItem() }} sampai {{ $notaris->lastItem() }} dari total {{ $notaris->total() }} data.
                </p>
            </div>
            <div>
                {{ $notaris->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </x-adminlte-card>
@endsection

