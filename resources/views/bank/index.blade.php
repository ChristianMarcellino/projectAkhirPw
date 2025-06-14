@extends('adminlte::page')

@section('title', 'Data Bank')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Bank" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('bank.create') }}'" />

    <x-adminlte-card title="Daftar Bank" theme="info" icon="fas fa-list">
        <table class="table table-bordered table-hover table-striped">
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
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_bank }}</td>
                        <td>{{ $item->alamat_bank }}</td>
                        <td>{{ $item->no_telp_bank }}</td>
                        <td>{{ $item->notaris->nama_notaris ?? '-'}}</td>
                        @can ('admin-only')
                        <td>
                            <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm"
                                title="Edit"
                                onclick="window.location='{{ route('bank.edit', $item->id) }}'" />

                            <form action="{{ route('bank.destroy', $item->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <x-adminlte-button class="show_confirm" data-nama="{{$item->nama_bank}}" theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                            </form>
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
    </x-adminlte-card>
@endsection

