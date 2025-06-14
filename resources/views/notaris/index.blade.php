@extends('adminlte::page')

@section('title', 'Data Notaris')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Notaris" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('notaris.create') }}'" />

    <x-adminlte-card title="Daftar Notaris" theme="info" icon="fas fa-list">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK Notaris</th>
                    <th>Nama Notaris</th>
                    <th>Alamat Notaris</th>
                    <th>No Telepon Notaris</th>
                    @if (Auth::user()->role == 'admin')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($notaris as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nik_notaris }}</td>
                        <td>{{ $item->nama_notaris }}</td>
                        <td>{{ $item->alamat_notaris }}</tdf>
                        <td>{{ $item->no_telp_notaris }}</tdf>
                        @if (Auth::user()->role == 'admin')
                        <td>
                            <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm"
                                title="Edit"
                                onclick="window.location='{{ route('notaris.edit', $item->id) }}'" />

                            <form action="{{ route('notaris.destroy', $item->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <x-adminlte-button class="show_confirm" data-nama="{{$item->nama_notaris}}" theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                            </form>
                        </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data notaris.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-adminlte-card>
@endsection

