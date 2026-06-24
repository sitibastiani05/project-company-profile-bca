<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $produks = [
            [
                'nama' => 'Tahapan BCA Gold',
                'deskripsi' => 'Produk tabungan yang dirancang khusus untuk kemudahan bisnis dan kenyamanan transaksi dengan limit harian yang lebih besar serta fitur e-banking terintegrasi.',
                'harga' => 'Biaya admin Rp 17.000 / bulan',
                'kategori' => 'Simpanan',
                'image' => 'tahapan_gold.webp',
                'is_active' => true,
            ],
            [
                'nama' => 'Kartu Kredit BCA Visa Black',
                'deskripsi' => 'Nikmati kemudahan transaksi di seluruh dunia, kumpulkan reward point yang lebih besar, dan akses eksklusif ke airport lounge terpilih.',
                'harga' => 'Iuran tahunan Rp 450.000',
                'kategori' => 'Kartu Kredit',
                'image' => 'visa_black.webp',
                'is_active' => true,
            ],
            [
                'nama' => 'BCA Mobile & MyBCA',
                'deskripsi' => 'Aplikasi mobile banking inovatif untuk melayani seluruh kebutuhan finansial Anda mulai dari transfer, QRIS, pembayaran tagihan, hingga investasi dalam genggaman.',
                'harga' => 'Bebas biaya aplikasi',
                'kategori' => 'Digital Banking',
                'image' => 'bca_mobile.webp',
                'is_active' => true,
            ],
            [
                'nama' => 'Kredit Kendaraan Bermotor (KKB)',
                'deskripsi' => 'Wujudkan impian memiliki kendaraan pribadi dengan suku bunga kompetitif, proses persetujuan cepat, dan tenor angsuran yang fleksibel.',
                'harga' => 'Suku bunga mulai 3.15% p.a.',
                'kategori' => 'Pinjaman',
                'image' => 'kkb_bca.webp',
                'is_active' => true,
            ]
        ];

        foreach ($produks as $produk) {
            Produk::updateOrCreate(['nama' => $produk['nama']], $produk);
        }
    }
}
