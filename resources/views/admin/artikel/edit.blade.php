@extends('admin.layouts.app')

@section('title', 'Edit Artikel')
@section('page-title', 'Edit Artikel')

@section('content')
<div class="page-head">
    <a href="{{ route('admin.artikel.index') }}" class="text-decoration-none text-muted mb-2 d-inline-block">
        ← Kembali ke Daftar Artikel
    </a>
    <h1>Edit Artikel</h1>
    <p>Perbarui informasi atau status artikel: {{ $artikel->title }}</p>
</div>

<div class="card-admin">
    <div class="card-body">
        <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-4">
                <div class="col-md-8">
                    <!-- Judul -->
                    <div class="mb-3">
                        <label for="title" class="form-label-admin">Judul Artikel <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" class="form-control form-control-admin @error('title') is-invalid @enderror" value="{{ old('title', $artikel->title) }}" placeholder="Contoh: Tips Mengamankan Password Mobile Banking">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-3">
                        <label for="description" class="form-label-admin">Konten / Deskripsi <span class="text-danger">*</span></label>
                        <textarea name="description" id="description" rows="10" class="form-control form-control-admin @error('description') is-invalid @enderror" placeholder="Tulis deskripsi atau isi artikel di sini...">{{ old('description', $artikel->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Kategori -->
                    <div class="mb-3">
                        <label for="categori" class="form-label-admin">Kategori <span class="text-danger">*</span></label>
                        <input type="text" name="categori" id="categori" class="form-control form-control-admin @error('categori') is-invalid @enderror" value="{{ old('categori', $artikel->categori) }}" placeholder="Contoh: Finansial, Keamanan, UMKM">
                        @error('categori')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-3">
                        <label for="status" class="form-label-admin">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-select form-control-admin @error('status') is-invalid @enderror">
                            <option value="draft" {{ old('status', $artikel->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status', $artikel->status) == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="archived" {{ old('status', $artikel->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Current Image Preview -->
                    <div class="mb-3">
                        <label class="form-label-admin d-block">Gambar Saat Ini</label>
                        <img src="{{ $artikel->image_url }}" alt="Preview" class="img-fluid rounded mb-2" style="max-height: 180px; object-fit: cover; border: 1px solid #d1d9e6;">
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-4">
                        <label for="image" class="form-label-admin">Ganti Gambar</label>
                        <input type="file" name="image" id="image" class="form-control form-control-admin @error('image') is-invalid @enderror" accept="image/*">
                        <small class="text-muted d-block mt-1">Biarkan kosong jika tidak ingin mengganti gambar. Format: JPG, JPEG, PNG, WEBP. Maks: 2MB.</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn-navy py-2">
                            💾 Perbarui Artikel
                        </button>
                        <a href="{{ route('admin.artikel.index') }}" class="btn btn-light py-2" style="border-radius:10px; font-weight:600; font-size:13px; border:1px solid #d1d9e6;">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
