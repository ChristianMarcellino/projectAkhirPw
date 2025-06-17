@extends('adminlte::page')

@section('title', 'Data Bi Checking')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Bi Checking" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('bi_checking.create') }}'" />

    <x-adminlte-card title="Daftar Bi Checking" theme="info" icon="fas fa-list">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Checking</th>
                        <th>Nama Konsumen</th>
                        <th>Hasil Checking</th>
                        <th>Tanggal Checking</th>
                       @can ('admin-only')
                        <th>Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($biChecking as $item)
                        <tr>
                            <td>{{ $loop->iteration  + ($biChecking->currentPage() - 1) * $biChecking->perPage() }}</td>
                            <td>{{ $item->id_checking }}</td>
                            <td>{{ $item->konsumen->nama_konsumen ?? '-'}}</td>
                            <td>{{ $item->hasil_checking }}</td>
                            <td>{{ $item->tanggal_checking }}</tdf>
                           @can ('admin-only')
                           <td>
                            <div class="d-flex align-items-center" style="gap:6px">
                                <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm" title="Edit"
                                    class="rounded" onclick="window.location='{{ route('bi_checking.edit', $item->id) }}'" />

                                <form action="{{ route('bi_checking.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <x-adminlte-button class="show_confirm rounded" data-nama="Bi Checking {{ $item->konsumen->nama_konsumen }}"
                                        theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                                </form>
                            </div>
                        </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data bi checking.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
    </div>
    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            <p class="mb-0">
                Menampilkan {{ $biChecking->firstItem() }} sampai {{ $biChecking->lastItem() }} dari total {{ $biChecking->total() }} data.
            </p>
        </div>
        <div>
            {{ $biChecking->appends(request()->query())->links('pagination::bootstrap-4') }}
        </div>
    </div>
    </x-adminlte-card>
@endsection

