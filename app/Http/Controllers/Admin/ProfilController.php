<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProfilPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfilController extends Controller
{
    public function index()
    {
        $profil = ProfilPerusahaan::first();
        return view('admin.profil.index', compact('profil'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'tagline'         => 'nullable|string|max:255',
            'deskripsi'       => 'required|string',
            'email'           => 'required|email|max:255',
            'telepon'         => 'required|string|max:50',
            'alamat'          => 'required|string',
            'logo'            => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:1024',
        ], [
            'nama_perusahaan.required' => 'Nama perusahaan wajib diisi.',
            'deskripsi.required'       => 'Deskripsi wajib diisi.',
            'email.required'           => 'Email wajib diisi.',
            'email.email'              => 'Format email tidak valid.',
            'telepon.required'         => 'Telepon wajib diisi.',
            'alamat.required'          => 'Alamat wajib diisi.',
            'logo.image'               => 'File harus berupa gambar.',
            'logo.max'                 => 'Ukuran logo maksimal 1MB.',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('uploads/profil', 'public');
        }

        ProfilPerusahaan::create($validated);

        return redirect()->route('admin.profil.index')
            ->with('success', 'Profil perusahaan berhasil dibuat.');
    }

    public function update(Request $request, ProfilPerusahaan $profil)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'tagline'         => 'nullable|string|max:255',
            'deskripsi'       => 'required|string',
            'email'           => 'required|email|max:255',
            'telepon'         => 'required|string|max:50',
            'alamat'          => 'required|string',
            'logo'            => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:1024',
        ], [
            'nama_perusahaan.required' => 'Nama perusahaan wajib diisi.',
            'deskripsi.required'       => 'Deskripsi wajib diisi.',
            'email.required'           => 'Email wajib diisi.',
            'email.email'              => 'Format email tidak valid.',
            'telepon.required'         => 'Telepon wajib diisi.',
            'alamat.required'          => 'Alamat wajib diisi.',
            'logo.image'               => 'File harus berupa gambar.',
            'logo.max'                 => 'Ukuran logo maksimal 1MB.',
        ]);

        if ($request->hasFile('logo')) {
            if ($profil->logo) {
                Storage::disk('public')->delete($profil->logo);
            }
            $validated['logo'] = $request->file('logo')->store('uploads/profil', 'public');
        }

        $profil->update($validated);

        return redirect()->route('admin.profil.index')
            ->with('success', 'Profil perusahaan berhasil diperbarui.');
    }
}
