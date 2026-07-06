@extends('layouts.app')

@section('title', 'Tambah Kunjungan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <strong>Tambah Kunjungan Baru</strong>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('kunjungan.store') }}" method="POST">
                    @csrf
                    @include('kunjungan._form')
                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kunjungan.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
