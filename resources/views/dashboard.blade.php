@extends('layouts.app')

@section('title', 'Dashboard - Kedai Minuman Nusantara')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3 px-2">
        <div>
            <h5 class="fw-extrabold mb-0 text-dark">Dashboard Operasional Kedai</h5>
            <p class="text-muted small mb-0">Pantau aktivitas, persediaan menu, dan ringkasan operasional harian.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                <i class="bi bi-cup-straw me-1"></i> Pengelolaan Menu
            </a>
            <a href="{{ route('profile', ['username' => $username]) }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                <i class="bi bi-person me-1"></i> Profil Admin
            </a>
        </div>
    </div>

    <div class="app-window text-start position-relative">
        <div class="butterfly-float position-absolute d-none d-lg-block" style="right: -15px; top: -15px; z-index: 10;">
            <svg viewBox="0 0 50 50" width="44" height="44">
                <path d="M25,25 Q10,5 5,15 Q0,25 20,25 Z" fill="#ff7a29"/>
                <path d="M25,25 Q12,38 8,30 Q4,22 25,25 Z" fill="#eb581e"/>
                <path d="M25,25 Q40,5 45,15 Q50,25 30,25 Z" fill="#ff7a29"/>
                <path d="M25,25 Q38,38 42,30 Q46,22 25,25 Z" fill="#eb581e"/>
                <ellipse cx="25" cy="25" rx="2" ry="8" fill="#1c1917"/>
            </svg>
        </div>

        <div class="window-header">
            <div class="window-dots">
                <span class="window-dot dot-red"></span>
                <span class="window-dot dot-yellow"></span>
                <span class="window-dot dot-green"></span>
            </div>
            <span class="window-title">Kedai Minuman Nusantara — Dashboard</span>
        </div>

        <div class="window-body flex-column flex-md-row">
            <div class="window-sidebar">
                <div class="sidebar-section-title">WORKSPACE</div>
                <a href="{{ route('dashboard', ['username' => $username]) }}" class="sidebar-nav-item active">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="sidebar-nav-item">
                    <i class="bi bi-cup-straw"></i>
                    <span>Pengelolaan</span>
                </a>
                <a href="{{ route('profile', ['username' => $username]) }}" class="sidebar-nav-item">
                    <i class="bi bi-person-circle"></i>
                    <span>Profile</span>
                </a>
            </div>

            <div class="window-main">
                <div class="text-center mb-4">
                    <span class="badge rounded-pill px-3 py-1.5 mb-2" style="background-color: #edf7f5; color: #164043; font-weight: 600;">
                        Ringkasan Harian Kedai
                    </span>
                    <h3 class="fw-extrabold mb-1 text-dark" style="font-size: 1.5rem; letter-spacing: -0.02em;">
                        Selamat Datang, {{ $username }} ☀️
                    </h3>
                    <p class="text-muted small mb-0">
                        Sistem pantau stok dan varian minuman Nusantara dalam satu halaman.
                    </p>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-4">
                        <div class="kpi-card">
                            <div class="kpi-label">Total Varian Menu</div>
                            <div class="kpi-value">{{ $ringkasan['total_menu'] }}</div>
                            <div class="kpi-sub">
                                <span class="badge rounded-pill" style="background-color: #e8f5ec; color: #1b5e20;">Produk Aktif</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="kpi-card">
                            <div class="kpi-label">Total Stok Siap Jual</div>
                            <div class="kpi-value text-success" style="color: #0f766e !important;">{{ $ringkasan['stok_tersedia'] }}</div>
                            <div class="kpi-sub">
                                <span class="badge rounded-pill" style="background-color: #e8f5ec; color: #1b5e20;">Cup Tersedia</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="kpi-card">
                            <div class="kpi-label">Kategori Minuman</div>
                            <div class="kpi-value">{{ $ringkasan['kategori_aktif'] }}</div>
                            <div class="kpi-sub">
                                <span class="badge rounded-pill bg-light text-dark border">Kelompok Menu</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div class="app-sec-title mb-0">FOKUS OPERASIONAL HARI INI</div>
                            <span class="badge rounded-pill bg-light text-muted border small">Checklist</span>
                        </div>

                        @foreach($fokusOperasional as $fokus)
                            <div class="focus-item {{ $fokus['selesai'] ? 'done' : '' }}" onclick="this.classList.toggle('done')">
                                <span class="focus-circle"></span>
                                <span class="focus-text">{{ $fokus['tugas'] }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-6">
                        <div class="app-sec-title">INSIGHT OPERASIONAL KEDAI</div>

                        <div class="ai-peach-card">
                            <div class="ai-insight-badge">✦ {{ $rekomendasiHarian['judul'] }}</div>
                            <p class="ai-peach-text">
                                {{ $rekomendasiHarian['pesan'] }}
                            </p>
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="btn-peach-white">
                                    Buka Pengelolaan Menu <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
