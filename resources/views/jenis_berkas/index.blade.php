@extends('adminlte::page')

@section('title', 'Data Jenis Berkas')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Bank" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('jenis_berkas.create') }}'" />

    <x-adminlte-card title="Daftar Jenis Berkas" theme="info" icon="fas fa-list">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Berkas</th>
                    @if (Auth::user()->role == 'admin')
                    <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($jenisBerkas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->jenis_Berkas }}</td>
                        @if (Auth::user()->role == 'admin')
                        <td>
                            <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm"
                                title="Edit"
                                onclick="window.location='{{ route('jenis_berkas.edit', $item->id) }}'" />

                            <form action="{{ route('jenis_berkas.destroy', $item->id) }}" method="POST"
                                style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <x-adminlte-button class="show_confirm" data-nama="{{$item->jenis_Berkas}}" theme="danger" icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                            </form>
                        </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Tidak ada data Jenis Berkas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-adminlte-card>
@endsection

