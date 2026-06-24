@extends('admin.layouts.app')

@section('title', 'Kelola Produk & Layanan')
@section('page-title', 'Produk & Layanan')

@section('content')
<div class="page-head d-flex justify-content-between align-items-center">
    <div>
        <h1>Kelola Produk & Layanan</h1>
        <p>Manajemen produk finansial, tabungan, kartu kredit, pinjaman, atau fitur digital banking.</p>
    </div>
    <div>
        <a href="{{ route('admin.produk.create') }}" class="btn-navy d-flex align-items-center gap-2 text-decoration-none">
            ➕ Tambah Produk
        </a>
    </div>
</div>

<div class="card-admin mb-4">
    <div class="card-body">
        <form action="{{ route('admin.produk.index') }}" method="GET" class="row g-3">
            <div class="col-md-9">
                <input type="text" name="search" class="form-control form-control-admin" placeholder="Cari nama produk..." value="{{ request('search') }}">
            </div>
            <div class="col-md-3 d-grid">
                <button type="submit" class="btn-navy w-100">Cari</button>
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
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga / Biaya</th>
                        <th>Status</th>
                        <th>Tanggal Ditambahkan</th>
                        <th style="width: 150px;" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produks as $produk)
                        <tr>
                            <td>
                                <img src="{{ $produk->image_url }}" alt="Image" class="img-thumb">
                            </td>
                            <td>
                                <div class="fw-semibold text-navy">{{ $produk->nama }}</div>
                                <small class="text-muted">{{ Str::limit($produk->deskripsi, 80) }}</small>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark px-2 py-1" style="border-radius:5px; font-size:11px;">
                                    {{ $produk->kategori }}
                                </span>
                            </td>
                            <td>
                                {{ $produk->harga ? $produk->harga : 'Gratis / Free' }}
                            </td>
                            <td>
                                @if($produk->is_active)
                                    <span class="badge bg-success badge-status">Aktif</span>
                                @else
                                    <span class="badge bg-danger badge-status">Nonaktif</span>
                                @endif
                            </td>
                            <td>
                                {{ $produk->created_at->format('d M Y') }}
                            </td>
                            <td class="text-end">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.produk.edit', $produk->id) }}" class="btn btn-sm btn-outline-primary" style="border-radius:6px;">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
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
                            <td colspan="7" class="text-center py-4 text-muted">
                                Tidak ada produk ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $produks->appends(request()->query())->links('pagination::bootstrap-5') }}
</div>
@endsection
