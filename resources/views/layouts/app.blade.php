<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Digital Banking')</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f7f9fc;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(10px);
            padding: 12px 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 999;
            border-bottom: 1px solid #e5e7eb;
        }

        .navbar.scrolled {
            box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        }

        .navbar-brand span {
            font-weight: 600;
            color: #1e3a8a;
        }

        .nav-link {
            display: inline-block;
            padding: 8px 16px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 500;
            color: #1e3a8a !important;
            background: #f1f5ff;
            transition: all 0.25s ease;
            border: 1px solid transparent;
        }

        .nav-link:hover {
            background: #2563eb;
            color: #fff !important;
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(37,99,235,0.25);
        }

        .nav-link.active {
            background: #1e3a8a;
            color: #fff !important;
            box-shadow: 0 8px 18px rgba(30,58,138,0.25);
        }

        .navbar-nav .nav-item {
            margin-left: 6px;
        }

        main {
            min-height: 100vh;
        }

        .page-content {
            padding-top: 80px;
        }

        footer {
            background: #ffffff;
            border-top: 1px solid #e5e7eb;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a href="/" class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('images/logo.png') }}" style="height:38px;">
                <span class="ms-2">Digital Banking</span>
            </a>

            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/about" class="nav-link {{ request()->is('about') ? 'active' : '' }}">
                            About
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/artikel" class="nav-link {{ request()->is('artikel*') ? 'active' : '' }}">
                            Artikel
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/contact" class="nav-link {{ request()->is('contact') ? 'active' : '' }}">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="page-content">
            @yield('content')
        </div>
    </main>

    <footer class="text-center py-4 mt-5">
        <div class="container">
            <p class="mb-0 fw-semibold">Digital Banking Platform</p>
            <small>&copy; 2026 All rights reserved.</small>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function () {
            let navbar = document.querySelector('.navbar');
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });
    </script>
</body>
</html>