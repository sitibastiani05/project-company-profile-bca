<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — Digital Banking</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy: #0b1f3a;
            --navy-mid: #142b4f;
            --navy-light: #1e3a6e;
            --accent: #2563eb;
            --sidebar-w: 260px;
            --topbar-h: 64px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f4f8;
            margin: 0;
        }

        /* ── Sidebar ─────────────────────── */
        .sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-w);
            height: 100vh;
            background: var(--navy);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 20px 22px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            text-decoration: none;
        }

        .sidebar-brand img {
            height: 34px;
            filter: brightness(0) invert(1);
        }

        .sidebar-brand span {
            color: #fff;
            font-weight: 700;
            font-size: 15px;
            line-height: 1.2;
        }

        .sidebar-brand small {
            color: rgba(255,255,255,0.5);
            font-size: 11px;
            font-weight: 400;
        }

        .sidebar-menu {
            padding: 16px 12px;
            flex: 1;
        }

        .menu-label {
            font-size: 10px;
            font-weight: 600;
            color: rgba(255,255,255,0.35);
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 16px 10px 6px;
        }

        .nav-item-admin {
            list-style: none;
            margin-bottom: 2px;
        }

        .nav-link-admin {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 10px;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .nav-link-admin:hover {
            background: rgba(255,255,255,0.08);
            color: #fff;
        }

        .nav-link-admin.active {
            background: var(--accent);
            color: #fff;
            box-shadow: 0 6px 16px rgba(37,99,235,0.35);
        }

        .nav-link-admin .icon {
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        .sidebar-footer {
            padding: 14px 12px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        /* ── Topbar ──────────────────────── */
        .topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-w);
            right: 0;
            height: var(--topbar-h);
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            z-index: 999;
        }

        .topbar-title {
            font-weight: 600;
            color: var(--navy);
            font-size: 16px;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .admin-badge {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #f0f4f8;
            border-radius: 30px;
            padding: 6px 14px 6px 8px;
        }

        .admin-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--navy);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
        }

        .admin-name {
            font-size: 13px;
            font-weight: 600;
            color: var(--navy);
        }

        /* ── Content ─────────────────────── */
        .main-content {
            margin-left: var(--sidebar-w);
            padding-top: var(--topbar-h);
            min-height: 100vh;
        }

        .content-body {
            padding: 28px;
        }

        /* ── Cards & Forms ───────────────── */
        .card-admin {
            background: #fff;
            border-radius: 16px;
            border: 1px solid #e5edf7;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
        }

        .card-admin .card-header {
            background: none;
            border-bottom: 1px solid #e5edf7;
            padding: 18px 24px;
            font-weight: 600;
            color: var(--navy);
            border-radius: 16px 16px 0 0;
        }

        .card-admin .card-body {
            padding: 24px;
        }

        .stat-card {
            background: #fff;
            border-radius: 16px;
            padding: 22px;
            border: 1px solid #e5edf7;
            transition: 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(0,0,0,0.07);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .btn-navy {
            background: var(--navy);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 9px 20px;
            font-weight: 600;
            font-size: 13px;
            transition: 0.2s;
        }

        .btn-navy:hover {
            background: var(--navy-light);
            color: #fff;
            transform: translateY(-1px);
        }

        .form-label-admin {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 5px;
        }

        .form-control-admin {
            border: 1px solid #d1d9e6;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 13.5px;
            transition: 0.2s;
            font-family: 'Poppins', sans-serif;
        }

        .form-control-admin:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(37,99,235,0.12);
            outline: none;
        }

        .table-admin thead th {
            background: #f8fafd;
            font-weight: 600;
            font-size: 12px;
            color: #6b7280;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e5edf7;
            padding: 14px 16px;
        }

        .table-admin tbody td {
            padding: 13px 16px;
            font-size: 13.5px;
            vertical-align: middle;
            border-bottom: 1px solid #f0f4f8;
        }

        .table-admin tbody tr:hover {
            background: #fafbfd;
        }

        .alert-flash {
            border-radius: 12px;
            font-size: 13.5px;
            font-weight: 500;
        }

        .badge-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .img-thumb {
            width: 60px;
            height: 45px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #e5edf7;
        }

        .page-head {
            margin-bottom: 24px;
        }

        .page-head h1 {
            font-size: 22px;
            font-weight: 700;
            color: var(--navy);
            margin: 0;
        }

        .page-head p {
            color: #6b7280;
            font-size: 13px;
            margin: 4px 0 0;
        }

        .invalid-feedback { font-size: 12px; }
    </style>
    @stack('styles')
</head>

<body>

    <!-- Sidebar -->
    <aside class="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <div>
                <span>Digital Banking</span><br>
                <small>Admin Panel</small>
            </div>
        </a>

        <nav class="sidebar-menu">
            <div class="menu-label">Utama</div>
            <ul class="list-unstyled">
                <li class="nav-item-admin">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link-admin {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <span class="icon">🏠</span> Dashboard
                    </a>
                </li>
            </ul>

            <div class="menu-label">Konten</div>
            <ul class="list-unstyled">
                <li class="nav-item-admin">
                    <a href="{{ route('admin.artikel.index') }}"
                       class="nav-link-admin {{ request()->routeIs('admin.artikel*') ? 'active' : '' }}">
                        <span class="icon">📰</span> Artikel / Berita
                    </a>
                </li>
                <li class="nav-item-admin">
                    <a href="{{ route('admin.produk.index') }}"
                       class="nav-link-admin {{ request()->routeIs('admin.produk*') ? 'active' : '' }}">
                        <span class="icon">💼</span> Produk / Layanan
                    </a>
                </li>
                <li class="nav-item-admin">
                    <a href="{{ route('admin.galeri.index') }}"
                       class="nav-link-admin {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
                        <span class="icon">🖼️</span> Galeri
                    </a>
                </li>
                <li class="nav-item-admin">
                    <a href="{{ route('admin.profil.index') }}"
                       class="nav-link-admin {{ request()->routeIs('admin.profil*') ? 'active' : '' }}">
                        <span class="icon">🏢</span> Profil Perusahaan
                    </a>
                </li>
            </ul>

            <div class="menu-label">Laporan</div>
            <ul class="list-unstyled">
                <li class="nav-item-admin">
                    <a href="{{ route('admin.artikel.export-pdf') }}" target="_blank"
                       class="nav-link-admin">
                        <span class="icon">📄</span> Export PDF Artikel
                    </a>
                </li>
            </ul>

            <div class="menu-label">Website</div>
            <ul class="list-unstyled">
                <li class="nav-item-admin">
                    <a href="{{ url('/') }}" target="_blank" class="nav-link-admin">
                        <span class="icon">🌐</span> Lihat Website
                    </a>
                </li>
            </ul>
        </nav>

        <div class="sidebar-footer">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link-admin w-100 border-0 text-start"
                        style="background:rgba(255,255,255,0.05); cursor:pointer;">
                    <span class="icon">🚪</span> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Topbar -->
    <div class="topbar">
        <span class="topbar-title">@yield('page-title', 'Admin Panel')</span>
        <div class="topbar-right">
            <div class="admin-badge">
                <div class="admin-avatar">
                    {{ strtoupper(substr(session('admin_name', 'A'), 0, 1)) }}
                </div>
                <span class="admin-name">{{ session('admin_name', 'Admin') }}</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="content-body">

            @if(session('success'))
                <div class="alert alert-success alert-flash alert-dismissible fade show" role="alert">
                    ✅ {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-flash alert-dismissible fade show" role="alert">
                    ❌ {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <script src="{{ asset('bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>
</html>
