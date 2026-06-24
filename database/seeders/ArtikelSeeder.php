<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        $artikels = [
            [
                'title' => 'Transformasi Digital BCA untuk Kemudahan Nasabah',
                'categori' => 'transformasi-digital-bca',
                'image' => 'image1.png',
                'description' => 'BCA terus berinovasi dalam menghadirkan layanan digital seperti mobile banking dan internet banking guna memberikan kemudahan, kecepatan, dan keamanan bagi seluruh nasabah di Indonesia.',
                'status' => 'published'
            ],
            [
                'title' => 'Komitmen BCA dalam Mendukung UMKM Indonesia',
                'categori' => 'bca-dukung-umkm-indonesia',
                'image' => 'image2.png',
                'description' => 'Melalui berbagai program pembiayaan dan edukasi, BCA berperan aktif dalam membantu pertumbuhan UMKM agar lebih kompetitif di era digital dan mampu menjangkau pasar yang lebih luas.',
                'status' => 'published'
            ],
            [
                'title' => 'Keamanan Transaksi Digital di Era Modern',
                'categori' => 'keamanan-transaksi-digital-bca',
                'image' => 'image3.png',
                'description' => 'BCA mengutamakan keamanan dengan menghadirkan fitur proteksi berlapis, seperti OTP and notifikasi real-time, untuk menjaga setiap transaksi nasabah tetap aman dari ancaman cyber.',
                'status' => 'published'
            ],
            [
                'title' => 'Inovasi Layanan Mobile Banking untuk Generasi Digital',
                'categori' => 'inovasi-mobile-banking-bca',
                'image' => 'image4.png',
                'description' => 'Dengan pengembangan fitur mobile banking yang semakin lengkap, BCA menghadirkan pengalaman transaksi yang lebih praktis, cepat, dan sesuai dengan kebutuhan generasi digital masa kini.',
                'status' => 'published'
            ],
            [
                'title' => 'Peran BCA dalam Mendorong Literasi Keuangan Masyarakat',
                'categori' => 'literasi-keuangan-bca',
                'image' => 'image5.png',
                'description' => 'BCA aktif mengedukasi masyarakat melalui berbagai program literasi keuangan agar mampu mengelola keuangan dengan lebih bijak dan memahami pentingnya perencanaan finansial jangka panjang.',
                'status' => 'published'
            ]
        ];

        foreach ($artikels as $artikel) {
            Artikel::create($artikel);
        }
    }
}
