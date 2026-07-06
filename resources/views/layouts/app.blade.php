<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniKlinik — @yield('title', 'Beranda')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    @livewireStyles
    <style>
        body { background-color: #f8f9fa; }
        .navbar-brand { font-weight: 700; letter-spacing: .5px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('pasien.index') }}">&#x1F3E5; MiniKlinik</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link text-white" href="{{ route('pasien.index') }}">Data Pasien</a>
            <a class="nav-link text-white" href="{{ route('kunjungan.index') }}">Data Kunjungan</a>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<footer class="text-center text-muted py-4 mt-5 border-top">
    <small>MiniKlinik &mdash; Starter Tes Live Coding</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@livewireScripts
</body>
</html>
