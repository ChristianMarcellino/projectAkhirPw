    @extends('adminlte::page')

    @section('title', 'Data Proyek')

    @section('content_header')
        <h1>@yield('title')</h1>
    @endsection

    @section('content')
        <x-adminlte-button label="Tambah Proyek" theme="success" icon="fas fa-plus" class="mb-3"
            onclick="window.location='{{ route('proyek.create') }}'" />

        <x-adminlte-card title="Daftar Proyek" theme="info" icon="fas fa-list">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No PBG</th>
                            <th>Nama Proyek</th>
                            <th>Jumlah Unit</th>
                            <th>Harga Rumah</th>
                            <th>Luas Tanah</th>
                            <th>Harga Kelebihan Tanah</th>
                            <th>Alamat</th>
                            @can ('admin-only')
                            <th>Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($proyek as $item)
                            <tr>
                                <td>{{ $loop->iteration  + ($proyek->currentPage() - 1) * $proyek->perPage() }}</td>
                                <td>{{ $item->no_pbg }}</td>
                                <td>{{ $item->nama_proyek }}</td>
                                <td>{{ $item->jumlah_unit }}</td>
                                <td>Rp{{ number_format($item->harga_rumah, 0, ',', '.') }}</td>
                                <td>{{ $item->luas_tanah }} m²</td>
                                <td>Rp{{ number_format($item->harga_kelebihan_tanah, 0, ',', '.') }}</td>
                                <td>{{ $item->alamat }}</td>
                                @can ('admin-only')
                                <td>
                                    <div class="d-flex align-items-center" style="gap:6px">
                                        <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm" title="Edit"
                                            class="rounded" onclick="window.location='{{ route('proyek.edit', $item->id) }}'" />

                                        <form action="{{ route('proyek.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <x-adminlte-button class="show_confirm rounded" data-nama="Proyek {{ $item->nama_proyek }}"
                                                theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                                        </form>
                                    </div>
                                </td>
                                @endcan
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data proyek.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>
                    <p class="mb-0">
                        Menampilkan {{ $proyek->firstItem() }} sampai {{ $proyek->lastItem() }} dari total {{ $proyek->total() }} data.
                    </p>
                </div>
                <div>
                    {{ $proyek->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </x-adminlte-card>
    @endsection
