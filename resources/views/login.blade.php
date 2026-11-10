@extends('layouts.app')

@section('title', 'Login - Kedai Nusantara')
@section('hide_nav', true)

@section('content')
<div class="container py-5 d-flex flex-column justify-content-center align-items-center" style="min-height: 85vh;">
    <!-- Floating macOS Window Card (Screenshot 1 & 2 design) -->
    <div class="position-relative w-100" style="max-width: 460px;">
        <!-- Floating Butterfly decoration (Screenshot 2 / 4) -->
        <div class="butterfly-float position-absolute d-none d-sm-block" style="left: -24px; bottom: 35px; z-index: 10;">
            <svg viewBox="0 0 50 50" width="44" height="44">
                <path d="M25,25 Q10,5 5,15 Q0,25 20,25 Z" fill="#ff7a29"/>
                <path d="M25,25 Q12,38 8,30 Q4,22 25,25 Z" fill="#eb581e"/>
                <path d="M25,25 Q40,5 45,15 Q50,25 30,25 Z" fill="#ff7a29"/>
                <path d="M25,25 Q38,38 42,30 Q46,22 25,25 Z" fill="#eb581e"/>
                <ellipse cx="25" cy="25" rx="2" ry="8" fill="#1c1917"/>
            </svg>
        </div>

        <div class="lune-window text-start">
            <!-- Window Header (Screenshot 1) -->
            <div class="window-header">
                <div class="window-dots">
                    <span class="window-dot dot-red"></span>
                    <span class="window-dot dot-yellow"></span>
                    <span class="window-dot dot-green"></span>
                </div>
                <span class="window-title">kedainusantara.app — Masuk Sistem</span>
            </div>

            <!-- Card Body -->
            <div class="p-4 p-md-5 bg-white">
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3" style="width: 58px; height: 58px; background-color: #e8f5ec; font-size: 1.75rem;">
                        🌱
                    </div>
                    <h3 class="fw-extrabold text-dark mb-1" style="font-size: 1.5rem; letter-spacing: -0.02em;">
                        Masuk Aplikasi
                    </h3>
                    <p class="text-muted small mb-0">
                        Sistem Pengelolaan Kedai Minuman Nusantara
                    </p>
                </div>

                <form action="{{ route('login.proses') }}" method="POST">
                    @csrf

                    <!-- Username Field (Screenshot 2 floating-border style) -->
                    <div class="floating-border-input mb-3">
                        <span class="floating-border-label">USERNAME</span>
                        <input type="text" name="username" id="username" placeholder="Masukkan nama pengguna" value="Andi" required autofocus>
                    </div>

                    <!-- Password Field (Screenshot 2 floating-border style) -->
                    <div class="floating-border-input mb-4">
                        <span class="floating-border-label">PASSWORD</span>
                        <input type="password" name="password" id="password" placeholder="Masukkan kata sandi" value="password" required>
                    </div>

                    <button type="submit" class="btn btn-lune-orange w-100 py-3">
                        Masuk ke Dashboard <i class="bi bi-arrow-right"></i>
                    </button>
                </form>

                <div class="mt-4 text-center">
                    <span class="text-muted small" style="font-size: 0.8rem;">
                        💡 Petunjuk: Masukkan nama Anda (contoh: <strong>Andi</strong>) lalu klik masuk.
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
