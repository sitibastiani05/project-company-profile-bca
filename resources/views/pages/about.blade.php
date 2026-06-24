@extends('layouts.app')

@section('title', 'About')

@section('content')

<style>
    body {
        background: #f4f7fb;
    }

    .about-hero {
        background: url("{{ asset('images/image1.png') }}") center 25% / cover no-repeat;
        width: 100%;
        min-height: 70vh;
        position: relative;
    }

    .about-hero::after {
        content: "";
        position: absolute;
        inset: 0;
        background: rgba(5, 15, 35, 0.55);
    }

    .content-wrap {
        padding: 70px 0;
    }

    .box {
        background: #ffffff;
        border-radius: 18px;
        padding: 35px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.06);
        height: 100%;
        border: 1px solid #eef2f7;
    }

    .section-title {
        font-weight: 800;
        color: #0b1f3a;
        margin-bottom: 15px;
    }

    .text-muted {
        color: #6b7280 !important;
        line-height: 1.7;
    }

    .value-card {
        background: #0b1f3a;
        color: #ffffff;
        border-radius: 16px;
        padding: 24px;
        height: 100%;
        transition: 0.3s;
        border: 1px solid rgba(255,255,255,0.05);
    }

    .value-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px rgba(11,31,58,0.35);
    }

    .value-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        background: rgba(255,255,255,0.12);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
        font-size: 18px;
    }

    .value-title {
        font-weight: 700;
        margin-bottom: 6px;
    }

</style>
<div class="about-hero"></div>
<div class="container content-wrap">

    <div class="row g-4 align-items-stretch">
        <div class="col-md-5">
            <div class="box">

                <h2 class="section-title">Tentang Kami</h2>
                <p class="text-muted">
                    Kami adalah platform digital banking modern yang berfokus pada inovasi, keamanan, dan kenyamanan dalam setiap layanan keuangan.
                </p>

                <p class="text-muted">
                    Dengan teknologi yang terus berkembang, kami berkomitmen memberikan pengalaman finansial yang lebih cepat, aman, dan terpercaya untuk semua pengguna.
                </p>
            </div>
        </div>
        <div class="col-md-7">

            <div class="row g-4">

                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">⚡</div>
                        <div class="value-title">Inovasi</div>
                        <p class="small text-white-50 mb-0">
                            Teknologi finansial modern dan terus berkembang.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">🔐</div>
                        <div class="value-title">Keamanan</div>
                        <p class="small text-white-50 mb-0">
                            Sistem perlindungan data dan transaksi tingkat tinggi.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon">🤝</div>
                        <div class="value-title">Kepercayaan</div>
                        <p class="small text-white-50 mb-0">
                            Komitmen jangka panjang kepada seluruh pengguna.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection