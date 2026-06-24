@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<style>
    body {
        background: #f3f6fb;
    }

    .contact-wrapper {
        padding: 70px 0;
    }

    .contact-header {
        text-align: center;
        margin-bottom: 45px;
    }

    .contact-header h1 {
        font-weight: 800;
        font-size: 36px;
        color: #0b2a5b;
    }

    .contact-header p {
        color: #6b7a90;
        margin-top: 10px;
    }

    .panel {
        background: #ffffff;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(15, 40, 90, 0.08);
        height: 100%;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 28px;
    }

    .info-title {
        font-size: 18px;
        font-weight: 700;
        color: #0b2a5b;
        margin-bottom: 20px;
    }

    .info-box {
        padding: 14px 0;
        border-bottom: 1px solid #eef2f7;
    }

    .info-box:last-child {
        border: none;
    }

    .info-label {
        font-size: 12px;
        color: #7a8aa0;
    }

    .info-value {
        font-size: 15px;
        font-weight: 600;
        color: #1b2b45;
    }

    .form-group {
        margin-bottom: 14px;
    }

    .form-group label {
        font-size: 13px;
        color: #5b6b82;
        margin-bottom: 6px;
        display: block;
        font-weight: 500;
    }

    .form-control {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid #e5edf7;
        border-radius: 12px;
        outline: none;
        transition: 0.2s;
        background: #f9fbff;
    }

    .form-control:focus {
        border-color: #0d47a1;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(13, 71, 161, 0.1);
    }

    .btn-primary-custom {
        width: 100%;
        padding: 12px;
        background: #0b2a5b;
        border: none;
        color: #fff;
        border-radius: 12px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-primary-custom:hover {
        background: #123b7a;
        transform: translateY(-2px);
    }

    .map {
        margin-top: 28px;
    }

    iframe {
        width: 100%;
        height: 320px;
        border-radius: 14px;
        border: none;
    }

    @media (max-width: 900px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="contact-wrapper">
    <div class="container">

        <div class="contact-header">
            <h1>Contact Center</h1>
            <p>Hubungi kami untuk bantuan layanan perbankan kapan saja</p>
        </div>

        <div class="contact-grid">

            <div class="panel">

                <div class="info-title">Informasi Kontak</div>

                <div class="info-box">
                    <div class="info-label">Email</div>
                    <div class="info-value">support@banking.id</div>
                </div>

                <div class="info-box">
                    <div class="info-label">Call Center</div>
                    <div class="info-value">1500 888</div>
                </div>

                <div class="info-box">
                    <div class="info-label">Kantor Pusat</div>
                    <div class="info-value">Jakarta, Indonesia</div>
                </div>

                <div class="info-box">
                    <div class="info-label">Jam Layanan</div>
                    <div class="info-value">24 Jam / 7 Hari</div>
                </div>

            </div>

            <div class="panel">

                <div class="info-title">Kirim Pesan</div>

                <form action="#" method="POST">
                    @csrf

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama">
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Masukkan email">
                    </div>

                    <div class="form-group">
                        <label>Pesan</label>
                        <textarea rows="5" class="form-control" placeholder="Tulis pesan Anda"></textarea>
                    </div>

                    <button class="btn-primary-custom">Kirim Pesan</button>
                </form>
            </div>
        </div>
        <div class="panel map">
            <div class="info-title">Lokasi Kantor</div>
            <iframe src="https://www.google.com/maps?q=Jakarta&output=embed"></iframe>
        </div>
    </div>
</div>
@endsection