@extends('layouts.app')

@section('title', 'Pengelolaan - Kedai Nusantara')

@section('content')
<div class="container py-4">
    <!-- Breadcrumb -->
    <div class="d-flex justify-content-between align-items-center mb-3 px-2">
        <div>
            <h5 class="fw-extrabold mb-0 text-dark">Daftar Inventaris Minuman</h5>
            <p class="text-muted small mb-0">Dikelola oleh: <span class="fw-semibold text-dark">{{ $username }}</span></p>
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
            <span class="window-title">kedainusantara.app — Pengelolaan Inventaris Minuman</span>
        </div>

        <div class="window-body flex-column flex-md-row">
            <!-- Sidebar -->
            <div class="window-sidebar">
                <div class="sidebar-section-title">WORKSPACE</div>
                <a href="{{ route('dashboard', ['username' => $username]) }}" class="sidebar-nav-item">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="sidebar-nav-item active">
                    <i class="bi bi-cup-straw"></i>
                    <span>Pengelolaan</span>
                </a>
                <a href="{{ route('profile', ['username' => $username]) }}" class="sidebar-nav-item">
                    <i class="bi bi-person-circle"></i>
                    <span>Profile</span>
                </a>

                <div class="sidebar-section-title mt-4">FILTER CEPAT</div>
                <button type="button" class="sidebar-filter-btn btn text-start p-2 mb-1 w-100 rounded-3 small fw-semibold text-dark border-0 bg-white shadow-sm" data-category="" onclick="applyCategoryFilter('')">
                    ● Semua Minuman
                </button>
                <button type="button" class="sidebar-filter-btn btn text-start p-2 mb-1 w-100 rounded-3 small text-secondary border-0" data-category="Herbal Segar" onclick="applyCategoryFilter('Herbal Segar')">
                    🌿 Herbal Segar
                </button>
                <button type="button" class="sidebar-filter-btn btn text-start p-2 mb-1 w-100 rounded-3 small text-secondary border-0" data-category="Tradisional Hangat" onclick="applyCategoryFilter('Tradisional Hangat')">
                    ☕ Tradisional Hangat
                </button>
                <button type="button" class="sidebar-filter-btn btn text-start p-2 w-100 rounded-3 small text-secondary border-0" data-category="Kopi Lokal" onclick="applyCategoryFilter('Kopi Lokal')">
                    🌰 Kopi Lokal
                </button>
            </div>

            <!-- Main Content Area -->
            <div class="window-main">
                <!-- Highlight Summary Blocks (Screenshot 3 style) -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="fw-bold small text-uppercase" style="letter-spacing: 0.08em; color: #557b75;">
                            STATUS PERSEDIAAN MENU
                        </span>
                        <span class="badge rounded-pill bg-light text-muted border small">Realtime</span>
                    </div>

                    <div class="row g-2">
                        <div class="col-md-4">
                            <div class="plan-block-row mb-0" style="background-color: #e8f5ec; cursor: pointer;" onclick="searchSpecificMenu('Es Kunyit Asam')">
                                <div class="plan-bar" style="background-color: #2e7d32;"></div>
                                <div class="plan-content" style="color: #173822; font-size: 0.825rem; padding: 12px 14px;">
                                    <strong>Stok Aman:</strong> Es Kunyit Asam (30 Cup)
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="plan-block-row mb-0" style="background-color: #fef2e9; cursor: pointer;" onclick="searchSpecificMenu('Es Bunga Telang')">
                                <div class="plan-bar" style="background-color: #e06d3d;"></div>
                                <div class="plan-content" style="color: #4a2818; font-size: 0.825rem; padding: 12px 14px;">
                                    <strong>Stok Stabil:</strong> Es Bunga Telang (25 Cup)
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="plan-block-row mb-0" style="background-color: #edf4fe; cursor: pointer;" onclick="searchSpecificMenu('Wedang Jahe')">
                                <div class="plan-bar" style="background-color: #3b82f6;"></div>
                                <div class="plan-content" style="color: #1b3152; font-size: 0.825rem; padding: 12px 14px;">
                                    <strong>Perlu Restock:</strong> Wedang Jahe (15 Cup)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Category Pills (Screenshot 2 / Screenshot 5) & Search Bar -->
                <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <button type="button" class="priority-pill active" data-category="" onclick="applyCategoryFilter('')">
                            Semua
                        </button>
                        <button type="button" class="priority-pill" data-category="Herbal Segar" onclick="applyCategoryFilter('Herbal Segar')">
                            Herbal Segar
                        </button>
                        <button type="button" class="priority-pill" data-category="Tradisional Hangat" onclick="applyCategoryFilter('Tradisional Hangat')">
                            Tradisional Hangat
                        </button>
                        <button type="button" class="priority-pill" data-category="Kopi Lokal" onclick="applyCategoryFilter('Kopi Lokal')">
                            Kopi Lokal
                        </button>
                    </div>

                    <div>
                        <input type="text" id="searchMenu" class="form-control form-control-sm rounded-pill px-3" placeholder="Cari nama menu..." style="width: 220px; border-color: #e2e8f0;" onkeyup="searchTable()">
                    </div>
                </div>

                <!-- Table of $daftarMinuman -->
                <div class="table-responsive rounded-3 border" style="border-color: #eff2f2;">
                    <table class="table lune-table mb-0 align-middle" id="inventarisTable">
                        <thead style="background-color: #fafbfb;">
                            <tr>
                                <th class="ps-4 py-3">Kode</th>
                                <th class="py-3">Nama Minuman</th>
                                <th class="py-3">Kategori</th>
                                <th class="py-3">Harga</th>
                                <th class="py-3">Stok</th>
                                <th class="pe-4 py-3 text-end">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($daftarMinuman as $item)
                            <tr>
                                <td class="ps-4 py-3 fw-bold" style="color: #0f766e;">
                                    {{ $item['kode'] }}
                                </td>
                                <td class="py-3 fw-semibold text-dark">
                                    {{ $item['nama'] }}
                                </td>
                                <td class="py-3">
                                    <span class="badge rounded-pill px-2.5 py-1 text-secondary" style="background-color: #f1f5f9; font-weight: 500;">
                                        {{ $item['kategori'] }}
                                    </span>
                                </td>
                                <td class="py-3 fw-semibold text-dark">
                                    {{ $item['harga'] }}
                                </td>
                                <td class="py-3">
                                    <span class="badge bg-light text-dark border px-2.5 py-1 rounded-pill">
                                        {{ $item['stok'] }} Cup
                                    </span>
                                </td>
                                <td class="pe-4 py-3 text-end">
                                    <span class="badge rounded-pill px-3 py-1.5 fw-semibold" style="background-color: #e8f5ec; color: #1b5e20;">
                                        ● {{ $item['status'] }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let currentCategory = '';

    function applyCategoryFilter(cat) {
        currentCategory = cat;

        // 1. Update Tombol Filter Cepat di Sidebar
        document.querySelectorAll('.sidebar-filter-btn').forEach(btn => {
            const btnCat = btn.getAttribute('data-category');
            if (btnCat === cat) {
                btn.classList.add('bg-white', 'shadow-sm', 'fw-semibold', 'text-dark');
                btn.classList.remove('text-secondary');
            } else {
                btn.classList.remove('bg-white', 'shadow-sm', 'fw-semibold', 'text-dark');
                btn.classList.add('text-secondary');
            }
        });

        // 2. Update Tombol Pill Kategori di Atas Tabel
        document.querySelectorAll('.priority-pill').forEach(pill => {
            const pillCat = pill.getAttribute('data-category');
            if (pillCat === cat) {
                pill.classList.add('active');
            } else {
                pill.classList.remove('active');
            }
        });

        // 3. Terapkan Filter pada Baris Tabel
        filterTableRows();
    }

    function searchSpecificMenu(keyword) {
        const input = document.getElementById('searchMenu');
        input.value = keyword;
        applyCategoryFilter('');
        searchTable();
    }

    function searchTable() {
        filterTableRows();
    }

    function filterTableRows() {
        const input = document.getElementById('searchMenu').value.toLowerCase();
        const table = document.getElementById('inventarisTable');
        const rows = table.getElementsByTagName('tr');

        for (let i = 1; i < rows.length; i++) {
            const tdCode = rows[i].getElementsByTagName('td')[0];
            const tdName = rows[i].getElementsByTagName('td')[1];
            const tdCat  = rows[i].getElementsByTagName('td')[2];

            if (tdName && tdCat) {
                const name = (tdName.textContent || tdName.innerText).toLowerCase();
                const code = tdCode ? (tdCode.textContent || tdCode.innerText).toLowerCase() : '';
                const catText = tdCat.textContent || tdCat.innerText;

                const matchesCategory = !currentCategory || catText.includes(currentCategory);
                const matchesSearch   = !input || name.includes(input) || code.includes(input);

                if (matchesCategory && matchesSearch) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }
    }
</script>
@endpush
