@extends('adminlte::page')

@section('title', 'Data Pengiriman Berkas')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Pengiriman" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('pengirimanberkas.create') }}'" />

    <x-adminlte-card title="Daftar Pengiriman Berkas" theme="info" icon="fas fa-list">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Konsumen</th>
                    <th>Nama Bank</th>
                    <th>Nama Marketing</th>
                    <th>Tanggal Kirim</th>
                    <th>Status</th>
                    @if (Auth::user()->role == 'admin')
                        <th>Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($pengirimanberkas as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->konsumen->nama_konsumen ?? '-' }}</td>
                        <td>{{ $item->bank->nama_bank ?? '-' }}</td>
                        <td>{{ $item->marketing->nama_marketing ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_kirim)->format('d-m-Y') }}</td>
                        <td>{{ ucfirst($item->status ?? '-') }}</td>

                        @if (Auth::user()->role == 'admin')
                            <td>
                                <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm"
                                    title="Edit"
                                    onclick="window.location='{{ route('pengirimanberkas.edit', $item->id) }}'" />

                                <form action="{{ route('pengirimanberkas.destroy', $item->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <x-adminlte-button theme="danger" class="show_confirm" data-nama="Pengiriman Berkas {{ $item->konsumen->nama_konsumen }}"
                                        icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                                </form>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data pengiriman berkas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </x-adminlte-card>
@endsection
