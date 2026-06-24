@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<div class="page-head">
    <h1>Dashboard</h1>
    <p>Selamat datang, <strong>{{ session('admin_name') }}</strong>! Berikut ringkasan data website.</p>
</div>

<!-- Stats Row -->
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="text-muted mb-1" style="font-size:12px;font-weight:600;letter-spacing:.5px;text-transform:uppercase;">Total Artikel</p>
                    <h2 class="fw-bold mb-0" style="font-size:32px;color:#0b1f3a;">{{ $stats['artikel'] }}</h2>
                    <small class="text-muted">
                        <span class="text-success fw-semibold">{{ $stats['artikel_published'] }} published</span> ·
                        {{ $stats['artikel_draft'] }} draft
                    </small>
                </div>
                <div class="stat-icon" style="background:#eff6ff;">📰</div>
            </div>
            <a href="{{ route('admin.artikel.index') }}" class="btn btn-sm btn-navy mt-3 d-block text-center">Kelola</a>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="text-muted mb-1" style="font-size:12px;font-weight:600;letter-spacing:.5px;text-transform:uppercase;">Total Produk</p>
                    <h2 class="fw-bold mb-0" style="font-size:32px;color:#0b1f3a;">{{ $stats['produk'] }}</h2>
                    <small class="text-muted"><span class="text-success fw-semibold">{{ $stats['produk_aktif'] }} aktif</span></small>
                </div>
                <div class="stat-icon" style="background:#f0fdf4;">💼</div>
            </div>
            <a href="{{ route('admin.produk.index') }}" class="btn btn-sm btn-navy mt-3 d-block text-center">Kelola</a>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="text-muted mb-1" style="font-size:12px;font-weight:600;letter-spacing:.5px;text-transform:uppercase;">Foto Galeri</p>
                    <h2 class="fw-bold mb-0" style="font-size:32px;color:#0b1f3a;">{{ $stats['galeri'] }}</h2>
                    <small class="text-muted">Total foto tersimpan</small>
                </div>
                <div class="stat-icon" style="background:#fdf4ff;">🖼️</div>
            </div>
            <a href="{{ route('admin.galeri.index') }}" class="btn btn-sm btn-navy mt-3 d-block text-center">Kelola</a>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <p class="text-muted mb-1" style="font-size:12px;font-weight:600;letter-spacing:.5px;text-transform:uppercase;">Profil Perusahaan</p>
                    <h2 class="fw-bold mb-0" style="font-size:32px;color:#0b1f3a;">{{ $stats['profil'] > 0 ? '✓' : '–' }}</h2>
                    <small class="text-muted">{{ $stats['profil'] > 0 ? 'Data sudah diisi' : 'Belum diisi' }}</small>
                </div>
                <div class="stat-icon" style="background:#fff7ed;">🏢</div>
            </div>
            <a href="{{ route('admin.profil.index') }}" class="btn btn-sm btn-navy mt-3 d-block text-center">Kelola</a>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row g-3">
    <div class="col-lg-6">
        <div class="card-admin">
            <div class="card-header">⚡ Aksi Cepat</div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('admin.artikel.create') }}" class="btn btn-navy">
                        📝 Tambah Artikel Baru
                    </a>
                    <a href="{{ route('admin.produk.create') }}" class="btn btn-outline-secondary" style="border-radius:10px;font-size:13px;font-weight:600;">
                        ➕ Tambah Produk/Layanan
                    </a>
                    <a href="{{ route('admin.galeri.create') }}" class="btn btn-outline-secondary" style="border-radius:10px;font-size:13px;font-weight:600;">
                        📷 Upload Foto Galeri
                    </a>
                    <a href="{{ route('admin.artikel.export-pdf') }}" target="_blank"
                       class="btn btn-outline-danger" style="border-radius:10px;font-size:13px;font-weight:600;">
                        📄 Export Laporan PDF
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card-admin">
            <div class="card-header">📊 Statistik Artikel</div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span style="font-size:13px;font-weight:600;">Published</span>
                        <span style="font-size:13px;color:#16a34a;font-weight:700;">{{ $stats['artikel_published'] }}</span>
                    </div>
                    @if($stats['artikel'] > 0)
                    <div class="progress" style="height:8px;border-radius:10px;background:#e5edf7;">
                        <div class="progress-bar bg-success" style="width: {{ $stats['artikel'] > 0 ? ($stats['artikel_published']/$stats['artikel']*100) : 0 }}%; border-radius:10px;"></div>
                    </div>
                    @endif
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span style="font-size:13px;font-weight:600;">Draft</span>
                        <span style="font-size:13px;color:#6b7280;font-weight:700;">{{ $stats['artikel_draft'] }}</span>
                    </div>
                    @if($stats['artikel'] > 0)
                    <div class="progress" style="height:8px;border-radius:10px;background:#e5edf7;">
                        <div class="progress-bar bg-secondary" style="width: {{ $stats['artikel'] > 0 ? ($stats['artikel_draft']/$stats['artikel']*100) : 0 }}%; border-radius:10px;"></div>
                    </div>
                    @endif
                </div>
                <hr class="my-3">
                <div class="d-flex justify-content-between align-items-center">
                    <span style="font-size:13px;color:#6b7280;">Total Artikel</span>
                    <span class="fw-bold" style="color:#0b1f3a;font-size:18px;">{{ $stats['artikel'] }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
