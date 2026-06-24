@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <style>
        body {
            background: #f6f8fc;
        }

        .hero-banner {
            background: url("{{ asset('images/image5.png') }}") center/cover no-repeat;
            width: 100%;
        }

        .hero-overlay {
            background: rgba(10, 20, 40, 0.75);
            padding: 120px 0;
        }

        .min-vh-75 {
            min-height: 75vh;
        }

        .hero-title {
            font-size: 2.9rem;
            font-weight: 700;
            color: #ffffff;
        }

        .btn-modern {
            border-radius: 50px;
            padding: 12px 28px;
            font-weight: 600;
            transition: 0.3s;
            background: #0b1f3a;
            color: #ffffff;
            border: 1px solid #1b3a63;
        }

        .btn-modern:hover {
            transform: translateY(-3px);
            background: #132c52;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25);
        }

        .glass-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 25px;
            transition: 0.3s;
            border: 1px solid #eef2f7;
        }

        .glass-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
        }

        .icon-box {
            width: 55px;
            height: 55px;
            border-radius: 14px;
            background: #0b1f3a;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 22px;
            margin-bottom: 15px;
        }

        .section-title {
            font-weight: 700;
            color: #0b1f3a;
        }

        .stats-box {
            background: #ffffff;
            border-radius: 18px;
            padding: 30px;
            text-align: center;
            border: 1px solid #eef2f7;
        }

        .counter {
            color: #0b1f3a !important;
        }

        .cta {
            background: #0b1f3a;
            border-radius: 22px;
            padding: 55px;
            color: #ffffff;
        }
    </style>

    <div class="hero-banner mt-0">
        <div class="hero-overlay">

            <div class="container">
                <div class="row align-items-center min-vh-75">

                    <div class="col-md-7 text-white">
                        <h1 class="hero-title mb-3">
                            Kelola Keuangan Lebih Cerdas & Modern
                        </h1>

                        <p class="mb-4 text-white-50">
                            Platform perbankan digital dengan keamanan tinggi, kecepatan transaksi, dan pengalaman modern
                            untuk masa depan finansial Anda.
                        </p>

                        <a href="#" class="btn btn-modern">
                            Mulai Sekarang →
                        </a>
                    </div>

                    <div class="col-md-5 text-center">

                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="container py-5">

        <div class="row g-4 mb-5">

            <div class="col-md-4">
                <div class="glass-card">
                    <div class="icon-box">⚡</div>
                    <h5 class="fw-bold">Transaksi Instan</h5>
                    <p class="text-muted">Kirim dan terima dana dengan cepat tanpa hambatan.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="glass-card">
                    <div class="icon-box">📊</div>
                    <h5 class="fw-bold">Kontrol Finansial</h5>
                    <p class="text-muted">Pantau keuangan secara real-time dengan mudah.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="glass-card">
                    <div class="icon-box">🔐</div>
                    <h5 class="fw-bold">Keamanan Tinggi</h5>
                    <p class="text-muted">Proteksi berlapis untuk setiap transaksi Anda.</p>
                </div>
            </div>

        </div>

        <div class="text-center mb-5">
            <h2 class="section-title mb-3">Tentang Platform Kami</h2>
            <p class="text-muted mx-auto" style="max-width: 650px;">
                Kami menghadirkan solusi finansial digital modern yang aman, cepat, dan terpercaya untuk mendukung kebutuhan
                Anda di era digital.
            </p>
        </div>

        <div class="row g-4 mb-5">

            <div class="col-md-4">
                <div class="stats-box">
                    <h2 class="fw-bold counter" data-target="50">0</h2>
                    <p class="text-muted">Juta Pengguna</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stats-box">
                    <h2 class="fw-bold counter" data-target="99">0</h2>
                    <p class="text-muted">% Uptime Sistem</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="stats-box">
                    <h2 class="fw-bold counter" data-target="24">0</h2>
                    <p class="text-muted">Jam Layanan</p>
                </div>
            </div>

        </div>

        <div class="cta text-center">
            <h2 class="fw-bold mb-3">Mulai Perjalanan Finansial Anda</h2>
            <p class="mb-4 text-white-50">
                Bergabung sekarang dan nikmati layanan digital banking modern.
            </p>
            <a href="#" class="btn btn-light btn-modern">
                Daftar Sekarang
            </a>
        </div>

    </div>

    <script>
        const counters = document.querySelectorAll('.counter');

        counters.forEach(counter => {
            counter.innerText = '0';

            const update = () => {
                const target = +counter.getAttribute('data-target');
                const current = +counter.innerText;
                const increment = target / 100;

                if (current < target) {
                    counter.innerText = Math.ceil(current + increment);
                    setTimeout(update, 20);
                } else {
                    counter.innerText = target + '+';
                }
            };

            update();
        });
    </script>

@endsection