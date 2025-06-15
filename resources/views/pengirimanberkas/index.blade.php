@extends('adminlte::page')

@section('title', 'Data Pengiriman Berkas')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Pengiriman" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('pengirimanberkas.create') }}'" />

    <x-adminlte-card title="Daftar Pengiriman Berkas" theme="info" icon="fas fa-list">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Konsumen</th>
                        <th>Nama Bank</th>
                        <th>Nama Marketing</th>
                        <th>Tanggal Kirim</th>
                        <th>Status</th>
                        @can ('admin-only')
                            <th>Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengirimanberkas as $item)
                        <tr>
                            <td>{{ $loop->iteration  + ($pengirimanberkas->currentPage() - 1) * $pengirimanberkas->perPage() }}</td>
                            <td>{{ $item->konsumen->nama_konsumen ?? '-' }}</td>
                            <td>{{ $item->bank->nama_bank ?? '-' }}</td>
                            <td>{{ $item->marketing->nama_marketing ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_kirim)->format('d-m-Y') }}</td>
                            <td>{{ ucfirst($item->status ?? '-') }}</td>
                            @can ('admin-only')
                            <td>
                                <div class="d-flex align-items-center" style="gap:6px">
                                    <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm" title="Edit"
                                        class="rounded" onclick="window.location='{{ route('pengirimanberkas.edit', $item->id) }}'" />
                                    
                                    <form action="{{ route('pengirimanberkas.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <x-adminlte-button class="show_confirm rounded" data-nama="Pengiriman Berkas {{ $item->konsumen->nama_konsumen }}"
                                            theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                                    </form>
                                </div>
                            </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data pengiriman berkas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                <p class="mb-0">
                    Menampilkan {{ $pengirimanberkas->firstItem() }} sampai {{ $pengirimanberkas->lastItem() }} dari total {{ $pengirimanberkas->total() }} data.
                </p>
            </div>
            <div>
                {{ $pengirimanberkas->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </x-adminlte-card>
@endsection