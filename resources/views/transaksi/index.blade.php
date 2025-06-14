@extends('adminlte::page')

@section('title', 'Data Transaksi')

@section('content_header')
    <h1>@yield('title')</h1>
@endsection

@section('content')
    <x-adminlte-button label="Tambah Transaksi" theme="success" icon="fas fa-plus" class="mb-3"
        onclick="window.location='{{ route('transaksi.create') }}'" />

    <x-adminlte-card title="Daftar Transaksi" theme="info" icon="fas fa-list">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Transaksi</th>
                    <th>Tanggal Transaksi</th>
                    <th>Jumlah Pembayaran</th>
                    <th>Jenis Pembayaran</th>
                    <th>Nama Konsumen</th>
                    @can ('admin-only')
                        <th>Aksi</th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @forelse($transaksi as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->jenis_transaksi ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_transaksi)->format('d-m-Y') }}</td>
                        <td>{{ $item->jumlah_pembayaran ?? '-' }}</td>
                        <td>{{ ucfirst($item->jenis_pembayaran ?? '-') }}</td>
                        <td>{{ $item->konsumen->nama_konsumen ?? '-' }}</td>
                        @can ('admin-only')
                            <td>
                                <x-adminlte-button theme="primary" icon="fas fa-edit" size="sm"
                                    title="Edit"
                                    onclick="window.location='{{ route('transaksi.edit', $item->id) }}'" />

                                <form action="{{ route('transaksi.destroy', $item->id) }}" method="POST"
                                    style="display:inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <x-adminlte-button theme="danger" class="show_confirm" data-nama="Pengiriman Berkas {{ $item->konsumen->nama_konsumen }}"
                                        icon="fas fa-trash" size="sm" title="Hapus" type="submit" />
                                </form>
                            </td>
                        @endcan
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