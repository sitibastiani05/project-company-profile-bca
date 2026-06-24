@extends('admin.layouts.app')

@section('title', 'Tambah Produk Baru')
@section('page-title', 'Tambah Produk')

@section('content')
<div class="page-head">
    <a href="{{ route('admin.produk.index') }}" class="text-decoration-none text-muted mb-2 d-inline-block">
        ← Kembali ke Daftar Produk
    </a>
    <h1>Tambah Produk Baru</h1>
    <p>Buat dan tampilkan produk atau layanan perbankan digital baru.</p>
</div>

<div class="card-admin">
    <div class="card-body">
        <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">
                <div class="col-md-8">
                    <!-- Nama Produk -->
                    <div class="mb-3">
                        <label for="nama" class="form-label-admin">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" name="nama" id="nama" class="form-control form-control-admin @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Contoh: Tahapan BCA Gold, Kartu Kredit BCA Visa Black">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label-admin">Deskripsi Produk <span class="text-danger">*</span></label>
                        <textarea name="deskripsi" id="deskripsi" rows="8" class="form-control form-control-admin @error('deskripsi') is-invalid @enderror" placeholder="Tulis rincian produk, fitur utama, dan ketentuan produk di sini...">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Kategori -->
                    <div class="mb-3">
                        <label for="kategori" class="form-label-admin">Kategori <span class="text-danger">*</span></label>
                        <input type="text" name="kategori" id="kategori" class="form-control form-control-admin @error('kategori') is-invalid @enderror" value="{{ old('kategori') }}" placeholder="Contoh: Simpanan, Kartu Kredit, Pinjaman, Digital">
                        @error('kategori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Harga / Biaya Admin -->
                    <div class="mb-3">
                        <label for="harga" class="form-label-admin">Biaya / Harga</label>
                        <input type="text" name="harga" id="harga" class="form-control form-control-admin @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="Contoh: Rp 15.000 / bulan atau Gratis">
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status Keaktifan -->
                    <div class="mb-3">
                        <div class="form-check form-switch mt-4">
                            <input class="form-check-input" type="checkbox" role="switch" id="is_active" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label form-label-admin mb-0 ms-2" for="is_active">Aktifkan Produk (Tampilkan ke Publik)</label>
                        </div>
                        @error('is_active')
                            <div class="text-danger mt-1" style="font-size:12px;">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-4">
                        <label for="image" class="form-label-admin">Gambar Produk</label>
                        <input type="file" name="image" id="image" class="form-control form-control-admin @error('image') is-invalid @enderror" accept="image/*">
                        <small class="text-muted d-block mt-1">Format: JPG, JPEG, PNG, WEBP. Maks: 2MB.</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn-navy py-2">
                            💾 Simpan Produk
                        </button>
                        <a href="{{ route('admin.produk.index') }}" class="btn btn-light py-2" style="border-radius:10px; font-weight:600; font-size:13px; border:1px solid #d1d9e6;">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
