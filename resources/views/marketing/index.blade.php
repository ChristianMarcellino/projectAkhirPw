@extends('adminlte::page')

@section('title', 'Data Marketing')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Marketing" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('marketing.create') }}'" />

    <x-adminlte-card title="Daftar Marketing" theme="info" icon="fas fa-list">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK Marketing</th>
                    <th>Nama Marketing</th>
                    <th>Nomor Telepon</th>
                    <th>Tanggal Masuk</th>
                    @if (Auth::user()->role == 'admin')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($marketing as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nik_marketing }}</td>
                        <td>{{ $item->nama_marketing }}</td>
                        <td>{{ $item->no_telp_marketing }}</td>
                        <td>{{ $item->tanggal_masuk }}</tdf>
                        @if (Auth::user()->role == 'admin')
                        <td>
                            <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm"
                                title="Edit"
                                onclick="window.location='{{ route('marketing.edit', $item->id) }}'" />

                            <form action="{{ route('marketing.destroy', $item->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <x-adminlte-button class="show_confirm" data-nama="{{$item->nama_marketing}}" theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                            </form>
                        </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data marketing.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-adminlte-card>
@endsection

