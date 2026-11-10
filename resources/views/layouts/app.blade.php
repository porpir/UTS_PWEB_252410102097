<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Kedai Minuman Nusantara')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --app-dark: #111827;
            --app-teal-dark: #0f3f44;
            --app-teal-mid: #1b5e5a;
            --app-teal-light: #2d7a75;
            --app-orange: #df5834;
            --app-orange-hover: #c94927;
            --app-peach: #fdeee3;
            --app-peach-dark: #b8542c;
            --app-peach-text: #644133;
            --app-mint: #e8f5ec;
            --app-mint-dark: #1b5e20;
            --app-blue: #edf4fe;
            --app-sidebar: #edf7f5;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            color: var(--app-dark);
            min-height: 100vh;
            margin: 0;
            padding: 0;
            background-color: #cae8e1;
            background-image: url('/images/background.svg');
            background-size: cover;
            background-position: top center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            -webkit-font-smoothing: antialiased;
        }

        /* Navigasi Mengambang */
        .app-navbar-wrapper {
            position: sticky;
            top: 16px;
            z-index: 1030;
            padding: 0 1rem;
            margin-bottom: 1.5rem;
        }

        .app-navbar {
            max-width: 920px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 9999px;
            padding: 8px 14px 8px 24px;
            box-shadow: 0 10px 30px -10px rgba(18, 55, 50, 0.12);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .app-brand {
            font-size: 1.15rem;
            font-weight: 800;
            color: #111827;
            text-decoration: none;
            letter-spacing: -0.02em;
            margin-right: 1.5rem;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .app-nav-links {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .app-nav-link {
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            color: #4b5563;
            transition: all 0.2s ease;
            padding: 6px 14px;
            border-radius: 9999px;
        }

        .app-nav-link:hover {
            color: #111827;
            background: rgba(0, 0, 0, 0.04);
        }

        .app-nav-link.active {
            color: #111827;
            font-weight: 700;
            background: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        /* Tombol Utama */
        .btn-app-primary {
            background-color: var(--app-orange);
            color: #ffffff !important;
            border-radius: 9999px;
            font-size: 0.95rem;
            font-weight: 600;
            padding: 12px 28px;
            border: none;
            box-shadow: 0 8px 20px rgba(223, 88, 52, 0.25);
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-app-primary:hover {
            background-color: var(--app-orange-hover);
            transform: translateY(-1px);
            box-shadow: 0 10px 24px rgba(223, 88, 52, 0.35);
        }

        /* Kontainer Jendela Aplikasi */
        .app-window {
            background: #ffffff;
            border-radius: 24px;
            box-shadow: 0 30px 60px -15px rgba(14, 45, 40, 0.2), 0 0 0 1px rgba(255, 255, 255, 0.85);
            overflow: hidden;
            width: 100%;
            max-width: 1080px;
            margin: 0 auto;
        }

        .window-header {
            padding: 12px 18px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #f1f4f4;
            background: #ffffff;
        }

        .window-dots {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-right: 12px;
        }

        .window-dot {
            width: 11px;
            height: 11px;
            border-radius: 50%;
            display: inline-block;
        }

        .dot-red { background-color: #ff5f56; }
        .dot-yellow { background-color: #ffbd2e; }
        .dot-green { background-color: #27c93f; }

        .window-title {
            font-size: 0.8rem;
            font-weight: 600;
            color: #4b5563;
        }

        .window-body {
            display: flex;
            min-height: 520px;
        }

        .window-sidebar {
            width: 220px;
            background: linear-gradient(180deg, #ecf6f4 0%, #e2f1ee 100%);
            border-right: 1px solid #e1ece9;
            padding: 22px 12px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
        }

        .sidebar-section-title {
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            color: #557b75;
            text-transform: uppercase;
            padding: 0 10px;
            margin-bottom: 8px;
        }

        .sidebar-nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            font-size: 0.875rem;
            font-weight: 500;
            color: #4b625d;
            border-radius: 10px;
            text-decoration: none;
            margin-bottom: 3px;
            transition: all 0.15s ease;
        }

        .sidebar-nav-item:hover {
            color: #111827;
            background: rgba(255, 255, 255, 0.5);
        }

        .sidebar-nav-item.active {
            background: #ffffff;
            color: #111827;
            font-weight: 700;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .sidebar-nav-item i {
            font-size: 1rem;
            width: 20px;
            text-align: center;
        }

        .window-main {
            flex-grow: 1;
            padding: 28px 32px;
            background: #ffffff;
            overflow-x: hidden;
        }

        /* Kartu Metrik Ringkasan */
        .kpi-card {
            border: 1px solid #eff2f2;
            border-radius: 14px;
            padding: 18px 14px;
            text-align: center;
            background: #ffffff;
            height: 100%;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .kpi-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0,0,0,0.04);
        }

        .kpi-label {
            font-size: 0.8rem;
            color: #6b7280;
            font-weight: 500;
            margin-bottom: 4px;
        }

        .kpi-value {
            font-size: 2rem;
            font-weight: 800;
            color: #111827;
            line-height: 1.1;
            margin-bottom: 4px;
        }

        .kpi-sub {
            font-size: 0.75rem;
            color: #6b7280;
        }

        .app-sec-title {
            font-size: 0.725rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            color: #374151;
            text-transform: uppercase;
            text-align: center;
            margin-bottom: 12px;
        }

        /* Daftar Tugas Operasional */
        .focus-item {
            border: 1px solid #f0f3f3;
            border-radius: 12px;
            padding: 10px 14px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.15s ease;
            background: #ffffff;
        }

        .focus-item:hover {
            border-color: #d1d5db;
            background: #fafbfb;
        }

        .focus-circle {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            border: 2px solid #9ca3af;
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.15s ease;
        }

        .focus-item.done .focus-circle {
            background-color: #2b3935;
            border-color: #2b3935;
        }

        .focus-item.done .focus-text {
            color: #9ca3af;
            text-decoration: line-through;
        }

        .focus-text {
            color: #1f2937;
            font-weight: 500;
            user-select: none;
        }

        /* Kotak Rekomendasi / Informasi */
        .ai-peach-card {
            background-color: var(--app-peach);
            border-radius: 18px;
            padding: 20px 22px;
            text-align: center;
        }

        .ai-insight-badge {
            font-size: 0.725rem;
            font-weight: 800;
            letter-spacing: 0.05em;
            color: var(--app-peach-dark);
            margin-bottom: 8px;
            text-transform: uppercase;
        }

        .ai-peach-text {
            font-size: 0.85rem;
            line-height: 1.45;
            color: var(--app-peach-text);
            margin-bottom: 16px;
        }

        .btn-peach-white {
            background: #ffffff;
            color: #1f2937;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            padding: 6px 14px;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: all 0.15s ease;
        }

        .btn-peach-white:hover {
            transform: translateY(-1px);
            color: #000;
        }

        /* Input Form Border Label */
        .floating-border-input {
            position: relative;
            border: 1.5px solid #7cd1d9;
            border-radius: 14px;
            padding: 12px 16px;
            background: #ffffff;
            margin-bottom: 1.25rem;
        }

        .floating-border-label {
            position: absolute;
            top: -9px;
            left: 16px;
            background: #ffffff;
            padding: 0 6px;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            color: #497a82;
            text-transform: uppercase;
        }

        .floating-border-input input {
            border: none;
            outline: none;
            width: 100%;
            font-size: 0.95rem;
            font-weight: 500;
            color: #111827;
            background: transparent;
        }

        /* Tombol Pill Kategori */
        .priority-pill {
            background: #ffffff;
            color: #374151;
            border: 1px solid #e5e7eb;
            border-radius: 9999px;
            padding: 6px 16px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.15s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .priority-pill:hover {
            border-color: #111827;
            color: #111827;
        }

        .priority-pill.active {
            background-color: #111827;
            color: #ffffff;
            border-color: #111827;
            font-weight: 600;
        }

        /* Blok Bar Status */
        .plan-block-row {
            display: flex;
            align-items: stretch;
            border-radius: 12px;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .plan-bar {
            width: 5px;
            flex-shrink: 0;
        }

        .plan-content {
            flex-grow: 1;
            padding: 14px 18px;
            font-size: 0.925rem;
            font-weight: 600;
        }

        /* Dekorasi Animasi */
        .butterfly-float {
            display: inline-block;
            animation: butterfly-anim 4s ease-in-out infinite alternate;
        }

        @keyframes butterfly-anim {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-8px) rotate(4deg); }
            100% { transform: translateY(-3px) rotate(-3deg); }
        }

        /* Tabel Kustom */
        .custom-table thead th {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: #6b7280;
            border-bottom: 1px solid #edf2f2;
            padding: 12px 16px;
        }

        .custom-table tbody td {
            padding: 14px 16px;
            vertical-align: middle;
            border-bottom: 1px solid #f3f5f5;
            font-size: 0.875rem;
        }

        .custom-table tbody tr:hover td {
            background-color: #f9fbfb;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    @hasSection('hide_nav')
    @else
        <div class="app-navbar-wrapper">
            <x-navbar :username="$username ?? 'Pengunjung'" />
        </div>
    @endif

    <main class="flex-grow-1">
        @yield('content')
    </main>

    @include('components.footer')

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>
