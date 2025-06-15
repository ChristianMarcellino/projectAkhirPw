@extends('adminlte::page')

@section('title', 'Data Bank')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Bank" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('bank.create') }}'" />

    <x-adminlte-card title="Daftar Bank" theme="info" icon="fas fa-list">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bank</th>
                        <th>Alamat bank</th>
                        <th>No Telepon bank</th>
                        <th>Nama Notaris</th>
                        @can ('admin-only')
                        <th>Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($bank as $item)
                        <tr>
                            <td>{{ $loop->iteration  + ($bank->currentPage() - 1) * $bank->perPage() }}</td>
                            <td>{{ $item->nama_bank }}</td>
                            <td>{{ $item->alamat_bank }}</td>
                            <td>{{ $item->no_telp_bank }}</td>
                            <td>{{ $item->notaris->nama_notaris ?? '-'}}</td>
                            @can ('admin-only')
                            <td>
                                <div class="d-flex align-items-center" style="gap:6px">
                                    <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm" title="Edit"
                                        class="rounded" onclick="window.location='{{ route('bank.edit', $item->id) }}'" />
                                    
                                    <form action="{{ route('bank.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <x-adminlte-button class="show_confirm rounded" data-nama="Bank {{ $item->nama_bank }}"
                                            theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                                    </form>
                                </div>
                            </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data bank.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div>
                <p class="mb-0">
                    Menampilkan {{ $bank->firstItem() }} sampai {{ $bank->lastItem() }} dari total {{ $bank->total() }} data.
                </p>
            </div>
            <div>
                {{ $bank->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </x-adminlte-card>
@endsection

