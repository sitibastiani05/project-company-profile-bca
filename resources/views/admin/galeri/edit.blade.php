@extends('admin.layouts.app')

@section('title', 'Edit Foto Galeri')
@section('page-title', 'Edit Foto Galeri')

@section('content')
<div class="page-head">
    <a href="{{ route('admin.galeri.index') }}" class="text-decoration-none text-muted mb-2 d-inline-block">
        ← Kembali ke Galeri
    </a>
    <h1>Edit Foto Galeri</h1>
    <p>Perbarui rincian atau ganti foto: {{ $galeri->judul }}</p>
</div>

<div class="card-admin">
    <div class="card-body">
        <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <div class="col-md-8">
                    <!-- Judul -->
                    <div class="mb-3">
                        <label for="judul" class="form-label-admin">Judul Foto <span class="text-danger">*</span></label>
                        <input type="text" name="judul" id="judul" class="form-control form-control-admin @error('judul') is-invalid @enderror" value="{{ old('judul', $galeri->judul) }}" placeholder="Contoh: Peresmian Kantor Cabang Pembantu Baru">
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label-admin">Keterangan / Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="6" class="form-control form-control-admin @error('deskripsi') is-invalid @enderror" placeholder="Tulis deskripsi singkat atau detail pelaksanaan acara/kegiatan...">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Current Image Preview -->
                    <div class="mb-3">
                        <label class="form-label-admin d-block">Gambar Saat Ini</label>
                        <img src="{{ $galeri->image_url }}" alt="Preview" class="img-fluid rounded mb-2" style="max-height: 180px; object-fit: cover; border: 1px solid #d1d9e6;">
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-4">
                        <label for="image" class="form-label-admin">Ganti Gambar</label>
                        <input type="file" name="image" id="image" class="form-control form-control-admin @error('image') is-invalid @enderror" accept="image/*">
                        <small class="text-muted d-block mt-1">Biarkan kosong jika tidak ingin mengganti gambar. Format: JPG, JPEG, PNG, WEBP. Maks: 3MB.</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn-navy py-2">
                            💾 Perbarui Foto
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
