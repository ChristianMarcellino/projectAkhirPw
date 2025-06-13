@extends('adminlte::page')

@section('title', 'Data Konsumen')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Konsumen" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('konsumen.create') }}'" />

    <x-adminlte-card title="Daftar Konsumen" theme="info" icon="fas fa-list">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK Konsumen</th>
                    <th>Nama Konsumen</th>
                    <th>No Telepon Konsumen</th>
                    <th>Alamat Konsumen</th>
                    <th>Gaji</th>
                    <th>Status Pernikahan</th>
                    <th>No SHM</th>
                    <th>Nama Bank</th>
                    <th>Nama Marketing</th>
                    @if (Auth::user()->role == 'admin')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($konsumen as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nik_konsumen }}</td>
                        <td>{{ $item->nama_konsumen }}</td>
                        <td>{{ $item->no_telp_konsumen }}</td>
                        <td>{{ $item->alamat_konsumen }}</tdf>
                        <td>{{ $item->gaji }}</td>
                        <td>{{ $item->status_pernikahan }}</td>
                        <td>{{ $item->rumah->no_shm_rumah }}</td>
                        <td>{{ $item->bank->nama_bank }}</td>
                        <td>{{ $item->marketing->nama_marketing }}</tdf>
                        @if (Auth::user()->role == 'admin')
                        <td>
                            <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm"
                                title="Edit"
                                onclick="window.location='{{ route('konsumen.edit', $item->id) }}'" />

                            <form action="{{ route('konsumen.destroy', $item->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <x-adminlte-button theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                            </form>
                        </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="11" class="text-center">Tidak ada data konsumen.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-adminlte-card>
@endsection

