<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\Produk;
use App\Models\ProfilPerusahaan;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'artikel'          => Artikel::count(),
            'produk'           => Produk::count(),
            'galeri'           => Galeri::count(),
            'profil'           => ProfilPerusahaan::count(),
            'artikel_published' => Artikel::where('status', 'published')->count(),
            'artikel_draft'    => Artikel::where('status', 'draft')->count(),
            'produk_aktif'     => Produk::where('is_active', true)->count(),
        ];

        return view('admin.dashboard.index', compact('stats'));
    }
}
