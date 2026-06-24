@extends('admin.layouts.app')

@section('title', 'Profil Perusahaan')
@section('page-title', 'Profil Perusahaan')

@section('content')
<div class="page-head">
    <h1>Profil Perusahaan</h1>
    <p>Kelola data identitas utama perusahaan, tagline, visi-misi, info kontak, dan logo.</p>
</div>

<div class="card-admin">
    <div class="card-header">
        Identitas Utama Perusahaan
    </div>
    <div class="card-body">
        <form action="{{ $profil ? route('admin.profil.update', $profil->id) : route('admin.profil.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($profil)
                @method('PUT')
            @endif

            <div class="row g-4">
                <!-- Sisi Kiri: Form Identitas -->
                <div class="col-md-8">
                    <!-- Nama Perusahaan -->
                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label-admin">Nama Perusahaan <span class="text-danger">*</span></label>
                        <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control form-control-admin @error('nama_perusahaan') is-invalid @enderror" value="{{ old('nama_perusahaan', $profil->nama_perusahaan ?? '') }}" placeholder="Contoh: PT Bank Central Asia Tbk">
                        @error('nama_perusahaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tagline -->
                    <div class="mb-3">
                        <label for="tagline" class="form-label-admin">Tagline / Slogan</label>
                        <input type="text" name="tagline" id="tagline" class="form-control form-control-admin @error('tagline') is-invalid @enderror" value="{{ old('tagline', $profil->tagline ?? '') }}" placeholder="Contoh: Senantiasa di Sisi Anda">
                        @error('tagline')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label-admin">Deskripsi / Visi Misi <span class="text-danger">*</span></label>
                        <textarea name="deskripsi" id="deskripsi" rows="8" class="form-control form-control-admin @error('deskripsi') is-invalid @enderror" placeholder="Tulis sejarah singkat, deskripsi korporasi, serta visi dan misi perusahaan di sini...">{{ old('deskripsi', $profil->deskripsi ?? '') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Sisi Kanan: Kontak & Logo -->
                <div class="col-md-4">
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label-admin">Email Kontak <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email" class="form-control form-control-admin @error('email') is-invalid @enderror" value="{{ old('email', $profil->email ?? '') }}" placeholder="Contoh: halobca@bca.co.id">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Telepon -->
                    <div class="mb-3">
                        <label for="telepon" class="form-label-admin">Nomor Telepon <span class="text-danger">*</span></label>
                        <input type="text" name="telepon" id="telepon" class="form-control form-control-admin @error('telepon') is-invalid @enderror" value="{{ old('telepon', $profil->telepon ?? '') }}" placeholder="Contoh: 1500888">
                        @error('telepon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="mb-3">
                        <label for="alamat" class="form-label-admin">Alamat Kantor Pusat <span class="text-danger">*</span></label>
                        <textarea name="alamat" id="alamat" rows="3" class="form-control form-control-admin @error('alamat') is-invalid @enderror" placeholder="Alamat lengkap kantor pusat...">{{ old('alamat', $profil->alamat ?? '') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Logo Saat Ini -->
                    @if($profil && $profil->logo)
                        <div class="mb-3">
                            <label class="form-label-admin d-block">Logo Saat Ini</label>
                            <div class="p-3 border rounded text-center" style="background:#f8f9fa;">
                                <img src="{{ $profil->logo_url }}" alt="Logo" class="img-fluid" style="max-height:60px;">
                            </div>
                        </div>
                    @endif

                    <!-- Upload Logo -->
                    <div class="mb-4">
                        <label for="logo" class="form-label-admin">Upload Logo Baru</label>
                        <input type="file" name="logo" id="logo" class="form-control form-control-admin @error('logo') is-invalid @enderror" accept="image/*">
                        <small class="text-muted d-block mt-1">Format: JPG, JPEG, PNG, WEBP, SVG. Maks: 1MB.</small>
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn-navy py-2">
                            💾 {{ $profil ? 'Perbarui Profil' : 'Simpan Profil Baru' }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
