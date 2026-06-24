@extends('layouts.app')

@section('title', 'Artikel')

@section('content')

    <style>
        body {
            background: #f4f7fb;
        }

        .article-hero {
            background: linear-gradient(135deg, #0b1f3a, #142b4f);
            color: white;
            padding: 90px 0;
            position: relative;
            overflow: hidden;
        }

        .article-hero::after {
            content: "";
            position: absolute;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: 50%;
            top: -180px;
            right: -180px;
        }

        .hero-title {
            font-size: 2.7rem;
            font-weight: 800;
        }

        .hero-sub {
            opacity: 0.85;
            max-width: 750px;
            margin: auto;
        }

        .hero-logo {
            max-height: 90px;
            margin-bottom: 20px;
            filter: brightness(0) invert(1);
        }

        .article-card {
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid #eef2f7;
            transition: 0.3s;
            height: 100%;
        }

        .article-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(0, 0, 0, 0.08);
        }

        .article-img {
            height: 210px;
            width: 100%;
            object-fit: cover;
            transition: 0.4s;
        }

        .article-card:hover .article-img {
            transform: scale(1.05);
        }

        .badge-modern {
            font-size: 11px;
            padding: 6px 10px;
            border-radius: 20px;
        }

        .article-title {
            font-weight: 700;
            font-size: 17px;
            color: #0b1f3a;
        }

        .article-desc {
            font-size: 13px;
            color: #6b7280;
        }

        .empty {
            padding: 80px 0;
            text-align: center;
        }
    </style>

    <div class="article-hero text-center">

        <div class="container">

            <img src="{{ asset('images/logo.png') }}" class="hero-logo">

            <h1 class="hero-title mb-3">
                Insight & Edukasi Finansial
            </h1>

            <p class="hero-sub">
                Temukan artikel terbaru seputar keuangan, teknologi digital banking,
                dan tips mengelola finansial secara modern dan aman.
            </p>

        </div>

    </div>

    <div class="container py-5">

        <div class="row g-4">

            @forelse ($artikels as $artikel)
                <div class="col-md-4">

                    <a href="{{ route('artikel.show', $artikel->id) }}" style="text-decoration:none;">

                        <div class="article-card">

                            <img src="{{ $artikel->image_url }}" class="article-img">

                            <div class="p-4 d-flex flex-column h-100">

                                <div class="mb-2">
                                    <span class="badge bg-primary badge-modern">
                                        {{ $artikel->kategori ?? 'Finance' }}
                                    </span>

                                    <span
                                        class="badge {{ $artikel->status == 'publish' ? 'bg-success' : 'bg-secondary' }} badge-modern">
                                        {{ $artikel->status ?? 'Draft' }}
                                    </span>
                                </div>

                                <div class="article-title mb-2">
                                    {{ $artikel->title }}
                                </div>

                                <div class="article-desc mb-3">
                                    {{ Str::limit($artikel->description, 120) }}
                                </div>

                                <small class="text-muted mt-auto">
                                    Topik: {{ $artikel->kategori ?? '-' }}
                                </small>

                            </div>

                        </div>

                    </a>

                </div>

            @empty

                <div class="col-12 empty">
                    <h5 class="text-muted">Belum ada artikel tersedia</h5>
                    <p class="text-muted">Konten akan segera hadir</p>
                </div>
            @endforelse

        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $artikels->links('pagination::bootstrap-5') }}
        </div>

    </div>

@endsection