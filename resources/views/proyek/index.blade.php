@extends('adminlte::page')

@section('title', 'Data Proyek')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Proyek" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('proyek.create') }}'" />

    <x-adminlte-card title="Daftar Proyek" theme="info" icon="fas fa-list">
        <table class="table table-bordered table-hover table-striped">
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
                    @can('is-admin')
                    <th>Aksi</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @forelse($proyek as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->no_pbg }}</td>
                        <td>{{ $item->nama_proyek }}</td>
                        <td>{{ $item->jumlah_unit }}</td>
                        <td>Rp{{ number_format($item->harga_rumah, 0, ',', '.') }}</td>
                        <td>{{ $item->luas_tanah }} m²</td>
                        <td>Rp{{ number_format($item->harga_kelebihan_tanah, 0, ',', '.') }}</td>
                        <td>{{ $item->alamat }}</tdf>
                        @can('is-admin')
                        <td>
                            <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm"
                                title="Edit"
                                onclick="window.location='{{ route('proyek.edit', $item->id) }}'" />

                            <form action="{{ route('proyek.destroy', $item->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <x-adminlte-button theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                            </form>
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
    </x-adminlte-card>
@endsection
