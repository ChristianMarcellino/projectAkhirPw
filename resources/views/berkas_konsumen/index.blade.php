@extends('adminlte::page')

@section('title', 'Data Berkas Konsumen')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Berkas Konsumen" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('berkas_konsumen.create') }}'" />

    <x-adminlte-card title="Daftar Berkas Konsumen" theme="info" icon="fas fa-list">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped w-100">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Konsumen</th>
                        <th>Ketersediaan Berkas</th>
                        <th>Keterangan Berkas</th>
                        <th>Jenis Berkas</th>
                        @can ('admin-only')
                        <th>Aksi</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($berkasKonsumen as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->konsumen->nama_konsumen ?? '-'}}</td>
                            <td>{{ $item->ketersediaan_berkas }}</td>
                            <td>{{ $item->keterangan_berkas }}</td>
                            <td>{{ $item->jenisBerkas->jenis_Berkas ?? "-" }}</td>
                            @can ('admin-only')
                            <td>
                                <div class="d-flex align-items-center" style="gap:6px">
                                    <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm" title="Edit"
                                        class="rounded" onclick="window.location='{{ route('berkas_konsumen.edit', $item->id) }}'" />
                                    
                                    <form action="{{ route('berkas_konsumen.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <x-adminlte-button class="show_confirm rounded" data-nama="Berkas Konsumen {{ $item->konsumen->nama_konsumen }}"
                                            theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                                    </form>
                                </div>
                            </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada data Berkas Konsumen.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-adminlte-card>
@endsection

