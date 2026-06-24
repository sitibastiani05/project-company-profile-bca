<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $query = Produk::query();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $produks = $query->latest()->paginate(10);

        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga'     => 'nullable|string|max:100',
            'kategori'  => 'required|string|max:100',
            'is_active' => 'nullable|boolean',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'nama.required'      => 'Nama produk wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'kategori.required'  => 'Kategori wajib diisi.',
            'image.image'        => 'File harus berupa gambar.',
            'image.mimes'        => 'Format gambar: jpg, jpeg, png, webp.',
            'image.max'          => 'Ukuran gambar maksimal 2MB.',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('uploads/produk', 'public');
        }

        Produk::create($validated);

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Produk $produk)
    {
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga'     => 'nullable|string|max:100',
            'kategori'  => 'required|string|max:100',
            'is_active' => 'nullable|boolean',
            'image'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'nama.required'      => 'Nama produk wajib diisi.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'kategori.required'  => 'Kategori wajib diisi.',
            'image.image'        => 'File harus berupa gambar.',
            'image.mimes'        => 'Format gambar: jpg, jpeg, png, webp.',
            'image.max'          => 'Ukuran gambar maksimal 2MB.',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            if ($produk->image) {
                Storage::disk('public')->delete($produk->image);
            }
            $validated['image'] = $request->file('image')->store('uploads/produk', 'public');
        }

        $produk->update($validated);

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk)
    {
        if ($produk->image) {
            Storage::disk('public')->delete($produk->image);
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
