@extends('adminlte::page')

@section('title', 'Data Akad')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Akad" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('akad.create') }}'" />

    <x-adminlte-card title="Daftar Akad" theme="info" icon="fas fa-list">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Id Akad</th>
                    <th>Nama Konsumen</th>
                    <th>TAnggal Akad</th>
                    <th>Tempat Akad</th>
                    @if (Auth::user()->role == 'admin')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($akad as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id_akad }}</td>
                        <td>{{ $item->konsumen->nama_konsumen ?? '-' }}</td>
                        <td>{{ $item->tanggal_akad }}</td>
                        <td>{{ $item->tempat_akad }}</td>
                        @if (Auth::user()->role == 'admin')
                        <td>
                            <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm"
                                title="Edit"
                                onclick="window.location='{{ route('akad.edit', $item->id) }}'" />

                            <form action="{{ route('akad.destroy', $item->id) }}" method="POST"
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
                        <td colspan="9" class="text-center">Tidak ada data akad.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-adminlte-card>
@endsection

