@extends('adminlte::page')

@section('title', 'Data Berkas Konsumen')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Berkas Konsumen" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('berkas_konsumen.create') }}'" />

    <x-adminlte-card title="Daftar Berkas Konsumen" theme="info" icon="fas fa-list">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Nama Konsumen</th>
                    <th>Ketersediaan Berkas</th>
                    <th>keterangan Berkas</th>
                    <th>Jenis Berkas</th>
                    @if (Auth::user()->role == 'admin')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($berkasKonsumen as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->konsumen->nama_konsumen ?? '-'}}</td>
                        <td>{{ $item->ketersediaan_berkas }}</td>
                        <td>{{ $item->keterangan_berkas }}</td>
                        <td>{{ $item->JenisBerkas->jenis_Berkas }}</td>
                        @if (Auth::user()->role == 'admin')
                        <td>
                            <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm"
                                title="Edit"
                                onclick="window.location='{{ route('berkas_konsumen.edit', $item->id) }}'" />

                            <form action="{{ route('berkas_konsumen.destroy', $item->id) }}" method="POST"
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
                        <td colspan="9" class="text-center">Tidak ada data Berkas Konsumen.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-adminlte-card>
@endsection

