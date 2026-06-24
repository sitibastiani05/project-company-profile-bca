<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $query = Artikel::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $artikels = $query->latest()->paginate(10);

        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255|unique:artikels,title',
            'description' => 'required|string',
            'categori'    => 'required|string|max:100',
            'status'      => 'required|in:draft,published,archived',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'title.required'       => 'Judul artikel wajib diisi.',
            'title.unique'         => 'Judul artikel sudah digunakan.',
            'description.required' => 'Deskripsi wajib diisi.',
            'categori.required'    => 'Kategori wajib diisi.',
            'status.required'      => 'Status wajib dipilih.',
            'image.image'          => 'File harus berupa gambar.',
            'image.mimes'          => 'Format gambar: jpg, jpeg, png, webp.',
            'image.max'            => 'Ukuran gambar maksimal 2MB.',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('uploads/artikel', 'public');
        }

        Artikel::create($validated);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit(Artikel $artikel)
    {
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, Artikel $artikel)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255|unique:artikels,title,' . $artikel->id,
            'description' => 'required|string',
            'categori'    => 'required|string|max:100',
            'status'      => 'required|in:draft,published,archived',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'title.required'       => 'Judul artikel wajib diisi.',
            'title.unique'         => 'Judul artikel sudah digunakan.',
            'description.required' => 'Deskripsi wajib diisi.',
            'categori.required'    => 'Kategori wajib diisi.',
            'status.required'      => 'Status wajib dipilih.',
            'image.image'          => 'File harus berupa gambar.',
            'image.mimes'          => 'Format gambar: jpg, jpeg, png, webp.',
            'image.max'            => 'Ukuran gambar maksimal 2MB.',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada di storage (bukan public/images)
            if ($artikel->image && str_starts_with($artikel->image, 'uploads/')) {
                Storage::disk('public')->delete($artikel->image);
            }
            $validated['image'] = $request->file('image')->store('uploads/artikel', 'public');
        }

        $artikel->update($validated);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy(Artikel $artikel)
    {
        if ($artikel->image && str_starts_with($artikel->image, 'uploads/')) {
            Storage::disk('public')->delete($artikel->image);
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }

    public function exportPdf(Request $request)
    {
        $query = Artikel::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $artikels = $query->latest()->get();
        $totalData = $artikels->count();
        $tanggalCetak = now()->locale('id')->isoFormat('dddd, D MMMM YYYY HH:mm');

        $pdf = Pdf::loadView('admin.pdf.artikel', compact('artikels', 'totalData', 'tanggalCetak'))
            ->setPaper('A4', 'portrait');

        return $pdf->download('laporan-artikel-' . now()->format('Ymd') . '.pdf');
    }
}
