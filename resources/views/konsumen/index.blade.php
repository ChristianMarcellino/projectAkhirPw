@extends('adminlte::page')

@section('title', 'Data Konsumen')

@section('content_header')
    <h1>Data Konsumen</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Konsumen" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('konsumen.create') }}'" />

    <x-adminlte-card title="Daftar Konsumen" theme="info" icon="fas fa-users">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>No. Telepon</th>
                    <th>Alamat</th>
                    <th>Gaji</th>
                    <th>Status Pernikahan</th>
                    <th>Rumah</th>
                    <th>Marketing</th>
                    @can('is-admin')
                        <th>Aksi</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @forelse($konsumen as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nik_konsumen }}</td>
                        <td>{{ $item->nama_konsumen }}</td>
                        <td>{{ $item->no_telp }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>Rp{{ number_format($item->gaji, 0, ',', '.') }}</td>
                        <td>{{ $item->status_pernikahan }}</td>
                        <td>{{ $item->rumah->blok_rumah ?? '-' }}</td>
                        <td>{{ $item->marketing->nama_marketing ?? '-' }}</td>
                        @can('is-admin')
                            <td>
                                <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm"
                                    title="Edit"
                                    onclick="window.location='{{ route('konsumen.edit', $item->id) }}'" />

                                <form action="{{ route('konsumen.destroy', $item->id) }}" method="POST" style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <x-adminlte-button theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                                </form>
                            </td>
                        @endcan
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">Tidak ada data konsumen.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-adminlte-card>
@endsection