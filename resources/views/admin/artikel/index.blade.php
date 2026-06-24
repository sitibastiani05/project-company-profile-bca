@extends('admin.layouts.app')

@section('title', 'Kelola Artikel')
@section('page-title', 'Artikel & Berita')

@section('content')
<div class="page-head d-flex justify-content-between align-items-center">
    <div>
        <h1>Kelola Artikel</h1>
        <p>Tulis, edit, dan publikasikan artikel atau berita terbaru perusahaan.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.artikel.export-pdf', ['status' => request('status')]) }}" class="btn btn-outline-danger d-flex align-items-center gap-2" style="border-radius:10px; font-weight:600; font-size:13px;" target="_blank">
            📄 Export PDF
        </a>
        <a href="{{ route('admin.artikel.create') }}" class="btn-navy d-flex align-items-center gap-2 text-decoration-none">
            ➕ Tambah Artikel
        </a>
    </div>
</div>

<div class="card-admin mb-4">
    <div class="card-body">
        <form action="{{ route('admin.artikel.index') }}" method="GET" class="row g-3">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control form-control-admin" placeholder="Cari judul artikel..." value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <select name="status" class="form-select form-control-admin">
                    <option value="">Semua Status</option>
                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                </select>
            </div>
            <div class="col-md-2 d-grid">
                <button type="submit" class="btn-navy w-100">Filter</button>
            </div>
        </form>
    </div>
</div>

<div class="card-admin">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-admin mb-0">
                <thead>
                    <tr>
                        <th style="width: 80px;">Gambar</th>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Tanggal Dibuat</th>
                        <th style="width: 150px;" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($artikels as $artikel)
                        <tr>
                            <td>
                                <img src="{{ $artikel->image_url }}" alt="Image" class="img-thumb">
                            </td>
                            <td>
                                <div class="fw-semibold text-navy">{{ $artikel->title }}</div>
                                <small class="text-muted">{{ Str::limit($artikel->description, 80) }}</small>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark px-2 py-1" style="border-radius:5px; font-size:11px;">
                                    {{ $artikel->kategori }}
                                </span>
                            </td>
                            <td>
                                @if($artikel->status == 'published')
                                    <span class="badge bg-success badge-status">Published</span>
                                @elseif($artikel->status == 'draft')
                                    <span class="badge bg-warning text-dark badge-status">Draft</span>
                                @else
                                    <span class="badge bg-secondary badge-status">Archived</span>
                                @endif
                            </td>
                            <td>
                                {{ $artikel->created_at->format('d M Y') }}
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.artikel.edit', $artikel->id) }}" class="btn btn-sm btn-outline-primary" style="border-radius:6px;">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('admin.artikel.destroy', $artikel->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" style="border-radius:6px;">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                Tidak ada artikel ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $artikels->appends(request()->query())->links('pagination::bootstrap-5') }}
</div>
@endsection
