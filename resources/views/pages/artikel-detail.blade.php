@extends('layouts.app')

@section('title', 'Detail Artikel')

@section('content')
    <div class="container py-5">

        <style>
            .hero-img {
                width: 100%;
                max-height: 420px;
                object-fit: cover;
                border-radius: 18px;
                border: 1px solid #eef2f7;
            }

            .badge-modern {
                font-size: 11px;
                padding: 6px 12px;
                border-radius: 20px;
            }

            .article-title {
                font-size: 2.3rem;
                font-weight: 800;
                color: #0b1f3a;
                line-height: 1.3;
            }

            .meta-text {
                font-size: 13px;
                color: #6b7280;
            }

            .content-text {
                line-height: 1.9;
                color: #374151;
                font-size: 16px;
            }

            .glass-box {
                background: #ffffff;
                border: 1px solid #eef2f7;
                border-radius: 16px;
                padding: 25px;
            }

            .glass-box h5 {
                color: #0b1f3a;
            }

            .btn-modern {
                border-radius: 30px;
                padding: 8px 20px;
                transition: 0.3s;
                font-weight: 500;
            }

            .btn-modern:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 25px rgba(11, 31, 58, 0.25);
            }

            .divider {
                height: 1px;
                background: #e5e7eb;
                margin: 30px 0;
            }
        </style>

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div data-aos="fade-up">
                    <img src="{{ $artikel->image_url }}" class="hero-img mb-4">
                </div>

                <div class="mb-3" data-aos="fade-up">
                    <span class="badge bg-dark badge-modern">
                        {{ $artikel->kategori ?? 'Finansial' }}
                    </span>

                    <span class="badge {{ $artikel->status == 'publish' ? 'bg-success' : 'bg-secondary' }} badge-modern">
                        {{ $artikel->status }}
                    </span>
                </div>

                <h1 class="article-title mb-3" data-aos="fade-up">
                    {{ $artikel->title }}
                </h1>
                <div class="meta-text mb-4" data-aos="fade-up">
                    Dipublikasikan oleh Digital Banking • 5 menit baca
                </div>

                <div class="divider"></div>
                <div class="content-text mb-5" data-aos="fade-up">
                    {{ $artikel->description }}
                </div>

                <div class="glass-box mb-4" data-aos="zoom-in">
                    <h5 class="fw-semibold mb-2">Insight Tambahan</h5>
                    <p class="mb-0 text-muted">
                        Informasi dalam artikel ini memberikan wawasan finansial untuk membantu keputusan keuangan yang
                        lebih bijak.
                    </p>
                </div>

                <div class="d-flex justify-content-between align-items-center" data-aos="fade-up">
                    <a href="{{ route('artikel') }}" class="btn btn-outline-dark btn-modern">
                        ← Kembali
                    </a>

                    <a href="/contact" class="btn btn-dark btn-modern">
                        Konsultasi →
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection