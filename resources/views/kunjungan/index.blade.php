@extends('layouts.app')

@section('title', 'Data Kunjungan')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Data Kunjungan</h4>
    <a href="{{ route('kunjungan.create') }}" class="btn btn-primary btn-sm">+ Tambah Kunjungan</a>
</div>

@if(session('ok'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('ok') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Tanggal</th>
                    <th>Diagnosis</th>
                    <th>Biaya</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kunjungans as $kunjungan)
                <tr>
                    <td>{{ $kunjungan->tanggal }}</td>
                    <td>{{ $kunjungan->diagnosis }}</td>
                    <td>{{ $kunjungan->biaya }}</td>
                    <td><span class="badge bg-secondary">{{ $kunjungan->status }}</span></td>
                    <td class="text-end">
                        <a href="{{ route('kunjungan.edit', $kunjungan) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kunjungan.destroy', $kunjungan) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus kunjungan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-4">Belum ada data kunjungan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="mt-3">
    {{ $kunjungans->links() }}
</div>
@endsection
