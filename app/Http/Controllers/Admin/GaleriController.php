<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->paginate(12);
        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:500',
            'image'     => 'required|image|mimes:jpg,jpeg,png,webp|max:3072',
        ], [
            'judul.required' => 'Judul galeri wajib diisi.',
            'image.required' => 'Gambar galeri wajib diunggah.',
            'image.image'    => 'File harus berupa gambar.',
            'image.mimes'    => 'Format gambar: jpg, jpeg, png, webp.',
            'image.max'      => 'Ukuran gambar maksimal 3MB.',
        ]);

        $validated['image'] = $request->file('image')->store('uploads/galeri', 'public');

        Galeri::create($validated);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto galeri berhasil ditambahkan.');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'deskripsi' => 'nullable|string|max:500',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
        ], [
            'judul.required' => 'Judul galeri wajib diisi.',
            'image.image'    => 'File harus berupa gambar.',
            'image.mimes'    => 'Format gambar: jpg, jpeg, png, webp.',
            'image.max'      => 'Ukuran gambar maksimal 3MB.',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($galeri->image);
            $validated['image'] = $request->file('image')->store('uploads/galeri', 'public');
        }

        $galeri->update($validated);

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto galeri berhasil diperbarui.');
    }

    public function destroy(Galeri $galeri)
    {
        Storage::disk('public')->delete($galeri->image);
        $galeri->delete();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto galeri berhasil dihapus.');
    }
}
