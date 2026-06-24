@extends('admin.layouts.app')

@section('title', 'Tambah Foto Galeri')
@section('page-title', 'Tambah Foto Galeri')

@section('content')
<div class="page-head">
    <a href="{{ route('admin.galeri.index') }}" class="text-decoration-none text-muted mb-2 d-inline-block">
        ← Kembali ke Galeri
    </a>
    <h1>Tambah Foto Galeri</h1>
    <p>Unggah dokumentasi corporate event, kegiatan CSR, atau layanan perbankan baru.</p>
</div>

<div class="card-admin">
    <div class="card-body">
        <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row g-4">
                <div class="col-md-8">
                    <!-- Judul -->
                    <div class="mb-3">
                        <label for="judul" class="form-label-admin">Judul Foto <span class="text-danger">*</span></label>
                        <input type="text" name="judul" id="judul" class="form-control form-control-admin @error('judul') is-invalid @enderror" value="{{ old('judul') }}" placeholder="Contoh: Peresmian Kantor Cabang Pembantu Baru">
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label-admin">Keterangan / Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="6" class="form-control form-control-admin @error('deskripsi') is-invalid @enderror" placeholder="Tulis deskripsi singkat atau detail pelaksanaan acara/kegiatan...">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Image Upload -->
                    <div class="mb-4">
                        <label for="image" class="form-label-admin">Unggah Gambar <span class="text-danger">*</span></label>
                        <input type="file" name="image" id="image" class="form-control form-control-admin @error('image') is-invalid @enderror" accept="image/*">
                        <small class="text-muted d-block mt-1">Format: JPG, JPEG, PNG, WEBP. Maks: 3MB.</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn-navy py-2">
                            💾 Simpan Foto
                        </button>
                        <a href="{{ route('admin.galeri.index') }}" class="btn btn-light py-2" style="border-radius:10px; font-weight:600; font-size:13px; border:1px solid #d1d9e6;">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
