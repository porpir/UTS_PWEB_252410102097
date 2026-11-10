@props(['username' => 'Pengunjung'])

<nav class="app-navbar">
    <div class="d-flex align-items-center">
        <a class="app-brand" href="{{ route('dashboard', ['username' => $username]) }}">
            <span class="fs-5">🌿</span>
            <span>Kedai Minuman Nusantara</span>
        </a>

        <ul class="app-nav-links d-none d-md-flex">
            <li>
                <a class="app-nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
                   href="{{ route('dashboard', ['username' => $username]) }}">
                    Dashboard
                </a>
            </li>
            <li>
                <a class="app-nav-link {{ request()->routeIs('pengelolaan') ? 'active' : '' }}" 
                   href="{{ route('pengelolaan', ['username' => $username]) }}">
                    Pengelolaan
                </a>
            </li>
            <li>
                <a class="app-nav-link {{ request()->routeIs('profile') ? 'active' : '' }}" 
                   href="{{ route('profile', ['username' => $username]) }}">
                    Profile
                </a>
            </li>
        </ul>
    </div>

    <div class="d-flex align-items-center gap-3">
        <span class="text-muted small d-none d-sm-inline">
            Halo, <strong class="text-dark">{{ $username }}</strong> ☀️
        </span>
        <a href="{{ route('login') }}" class="btn btn-outline-danger btn-sm rounded-pill px-3" style="font-size: 0.8rem;">
            Keluar
        </a>
    </div>
</nav>
