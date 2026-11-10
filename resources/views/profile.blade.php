@extends('layouts.app')

@section('title', 'Profile - Kedai Nusantara')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center mb-3 px-2">
        <div>
            <h5 class="fw-extrabold mb-0 text-dark">Profil Pengguna & Status Akun</h5>
            <p class="text-muted small mb-0">Kelola informasi akun aktif Anda di sini.</p>
        </div>
        <div>
            <a href="{{ route('dashboard', ['username' => $username]) }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Dashboard
            </a>
        </div>
    </div>

    <!-- macOS Window Frame (Screenshot 1) -->
    <div class="lune-window text-start mb-4">
        <!-- Window Header -->
        <div class="window-header">
            <div class="window-dots">
                <span class="window-dot dot-red"></span>
                <span class="window-dot dot-yellow"></span>
                <span class="window-dot dot-green"></span>
            </div>
            <span class="window-title">kedainusantara.app — Profil Pengguna</span>
        </div>

        <div class="window-body flex-column flex-md-row">
            <!-- Sidebar -->
            <div class="window-sidebar">
                <div class="sidebar-section-title">WORKSPACE</div>
                <a href="{{ route('dashboard', ['username' => $username]) }}" class="sidebar-nav-item">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="sidebar-nav-item">
                    <i class="bi bi-cup-straw"></i>
                    <span>Pengelolaan</span>
                </a>
                <a href="{{ route('profile', ['username' => $username]) }}" class="sidebar-nav-item active">
                    <i class="bi bi-person-circle"></i>
                    <span>Profile</span>
                </a>

                <div class="sidebar-section-title mt-4">INFO AKUN</div>
                <div class="px-2 py-1">
                    <span class="text-muted small d-block">Masuk sebagai:</span>
                    <strong class="text-dark small">{{ $username }}</strong>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="window-main">
                <div class="row g-4">
                    <!-- Left: Weekly Performance / Status Card (Screenshot 4 style) -->
                    <div class="col-lg-6">
                        <div class="p-4 rounded-4 border bg-white h-100 position-relative" style="border-color: #edf1f2;">
                            <!-- Floating butterfly decoration (Screenshot 4: top right) -->
                            <div class="butterfly-float position-absolute d-none d-sm-block" style="right: 15px; top: -15px; z-index: 5;">
                                <svg viewBox="0 0 50 50" width="40" height="40">
                                    <path d="M25,25 Q10,5 5,15 Q0,25 20,25 Z" fill="#ff7a29"/>
                                    <path d="M25,25 Q12,38 8,30 Q4,22 25,25 Z" fill="#eb581e"/>
                                    <path d="M25,25 Q40,5 45,15 Q50,25 30,25 Z" fill="#ff7a29"/>
                                    <path d="M25,25 Q38,38 42,30 Q46,22 25,25 Z" fill="#eb581e"/>
                                    <ellipse cx="25" cy="25" rx="2" ry="8" fill="#1c1917"/>
                                </svg>
                            </div>

                            <div class="d-flex align-items-center gap-2 mb-3">
                                <span class="badge rounded-pill" style="background-color: #edf7f5; color: #0f766e; font-weight: 600;">
                                    Tinjauan Kinerja
                                </span>
                            </div>

                            <h5 class="fw-extrabold text-dark mb-4" style="font-size: 1.25rem;">
                                Status Operasional Mingguan
                            </h5>

                            <!-- Two Stat Boxes (Screenshot 4) -->
                            <div class="row g-3 mb-4">
                                <div class="col-6">
                                    <div class="p-3 text-center rounded-3 border" style="border-color: #eff2f4;">
                                        <div class="fw-extrabold text-dark" style="font-size: 2.25rem; line-height: 1;">100%</div>
                                        <div class="text-muted small mt-1">Kehadiran Shift</div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="p-3 text-center rounded-3 border" style="border-color: #eff2f4;">
                                        <div class="fw-extrabold text-dark" style="font-size: 2.25rem; line-height: 1;">5</div>
                                        <div class="text-muted small mt-1">Menu Aktif</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Insight Box (Screenshot 4) -->
                            <div class="p-3 rounded-3" style="background-color: #edf6f0;">
                                <div class="fw-bold mb-1" style="font-size: 0.95rem; color: #224d3a;">
                                    Catatan Sistem
                                </div>
                                <p class="mb-0 small" style="color: #3b5c4b; line-height: 1.45;">
                                    Akun pengelola aktif dan bertugas di cabang {{ $infoAdmin['lokasi'] }} dengan jadwal shift {{ $infoAdmin['shift'] }}.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Informasi Detail Akun (Original UTS Data) -->
                    <div class="col-lg-6">
                        <div class="p-4 rounded-4 border bg-white h-100" style="border-color: #edf1f2;">
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="d-flex align-items-center justify-content-center rounded-circle" style="width: 52px; height: 52px; background-color: #e8f5ec; color: #0f766e; font-size: 1.5rem;">
                                    👤
                                </div>
                                <div>
                                    <h5 class="fw-extrabold text-dark mb-0">{{ $username }}</h5>
                                    <p class="text-muted small mb-0">Kelola informasi akun aktif Anda di sini</p>
                                </div>
                            </div>

                            <hr class="text-secondary opacity-10 my-3">

                            <div class="d-flex justify-content-between py-2.5 border-bottom" style="border-color: #f1f4f4;">
                                <span class="text-muted small">Username Aktif</span>
                                <span class="fw-bold text-dark small">{{ $username }}</span>
                            </div>
                            <div class="d-flex justify-content-between py-2.5 border-bottom" style="border-color: #f1f4f4;">
                                <span class="text-muted small">Jabatan</span>
                                <span class="text-dark small fw-medium">{{ $infoAdmin['peran'] }}</span>
                            </div>
                            <div class="d-flex justify-content-between py-2.5 border-bottom" style="border-color: #f1f4f4;">
                                <span class="text-muted small">Cabang Operasional</span>
                                <span class="text-dark small fw-medium">{{ $infoAdmin['lokasi'] }}</span>
                            </div>
                            <div class="d-flex justify-content-between py-2.5 border-bottom" style="border-color: #f1f4f4;">
                                <span class="text-muted small">Jadwal Kerja</span>
                                <span class="text-dark small fw-medium">{{ $infoAdmin['shift'] }}</span>
                            </div>
                            <div class="d-flex justify-content-between py-2.5 align-items-center">
                                <span class="text-muted small">Status Akun</span>
                                <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background-color: #e8f5ec; color: #1b5e20;">
                                    {{ $infoAdmin['status_akun'] }}
                                </span>
                            </div>

                            <div class="mt-4 pt-2">
                                <a href="{{ route('login') }}" class="btn btn-outline-danger btn-sm w-100 rounded-pill py-2">
                                    <i class="bi bi-box-arrow-right me-1"></i> Keluar
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
