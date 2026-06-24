@extends('admin.layouts.app')

@section('title', 'Kelola Galeri Foto')
@section('page-title', 'Galeri Foto')

@section('content')
<div class="page-head d-flex justify-content-between align-items-center">
    <div>
        <h1>Kelola Galeri Foto</h1>
        <p>Manajemen album foto kegiatan, dokumentasi corporate event, CSR, atau layanan perbankan.</p>
    </div>
    <div>
        <a href="{{ route('admin.galeri.create') }}" class="btn-navy d-flex align-items-center gap-2 text-decoration-none">
            ➕ Tambah Foto
        </a>
    </div>
</div>

<div class="row g-4">
    @forelse($galeris as $galeri)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="card-admin h-100 d-flex flex-column">
                <div class="position-relative" style="padding-top: 65%; overflow: hidden; border-radius: 16px 16px 0 0;">
                    <img src="{{ $galeri->image_url }}" alt="{{ $galeri->judul }}" class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover">
                </div>
                <div class="card-body p-3 d-flex flex-column flex-grow-1">
                    <h5 class="fw-semibold text-navy mb-1" style="font-size: 14px; line-height: 1.4;">{{ $galeri->judul }}</h5>
                    <p class="text-muted mb-3 flex-grow-1" style="font-size: 12px; line-height: 1.5;">
                        {{ $galeri->deskripsi ? Str::limit($galeri->deskripsi, 60) : 'Tidak ada deskripsi.' }}
                    </p>
                    <div class="d-flex gap-2 justify-content-between align-items-center border-top pt-2">
                        <small class="text-muted" style="font-size: 11px;">
                            {{ $galeri->created_at->format('d M Y') }}
                        </small>
                        <div class="d-flex gap-1">
                            <a href="{{ route('admin.galeri.edit', $galeri->id) }}" class="btn btn-sm btn-outline-primary py-1 px-2" style="border-radius:6px; font-size:11px;">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger py-1 px-2" style="border-radius:6px; font-size:11px;">
                                    🗑️ Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="card-admin py-5 text-center text-muted">
                <div style="font-size: 32px;" class="mb-2">🖼️</div>
                <h5>Belum ada foto galeri</h5>
                <p class="mb-0" style="font-size: 13px;">Klik tombol "Tambah Foto" di atas untuk menambahkan dokumentasi baru.</p>
            </div>
        </div>
    @endforelse
</div>

<div class="d-flex justify-content-center mt-5">
    {{ $galeris->links('pagination::bootstrap-5') }}
</div>
@endsection
