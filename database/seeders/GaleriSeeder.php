<?php

namespace Database\Seeders;

use App\Models\Galeri;
use Illuminate\Database\Seeder;

class GaleriSeeder extends Seeder
{
    public function run(): void
    {
        $galeris = [
            [
                'judul' => 'Rapat Umum Pemegang Saham (RUPS) BCA',
                'image' => 'rups_bca.webp',
                'deskripsi' => 'Pelaksanaan Rapat Umum Pemegang Saham Tahunan BCA berjalan dengan lancar dan menetapkan pembagian dividen bagi para pemegang saham.',
            ],
            [
                'judul' => 'Aksi CSR Bakti BCA untuk Lingkungan',
                'image' => 'csr_bca.webp',
                'deskripsi' => 'Melalui pilar Bakti Lingkungan, BCA melakukan penanaman 10.000 bibit mangrove sebagai wujud komitmen nyata terhadap kelestarian alam dan ekosistem pesisir.',
            ],
            [
                'judul' => 'Peluncuran Aplikasi Mobile Banking Terbaru myBCA',
                'image' => 'mybca_launch.webp',
                'deskripsi' => 'Peluncuran resmi myBCA sebagai portal perbankan masa depan yang mengintegrasikan seluruh rekening nasabah dalam satu single user ID.',
            ],
            [
                'judul' => 'BCA Sabet Penghargaan Bank Terbaik di Asia Tenggara',
                'image' => 'award_bca.webp',
                'deskripsi' => 'Penyerahan piala penghargaan kepada jajaran direksi atas dedikasi dan performa bisnis berkelanjutan di ajang financial regional.',
            ]
        ];

        foreach ($galeris as $galeri) {
            Galeri::updateOrCreate(['judul' => $galeri['judul']], $galeri);
        }
    }
}
