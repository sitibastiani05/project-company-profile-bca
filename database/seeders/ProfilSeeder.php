<?php

namespace Database\Seeders;

use App\Models\ProfilPerusahaan;
use Illuminate\Database\Seeder;

class ProfilSeeder extends Seeder
{
    public function run(): void
    {
        ProfilPerusahaan::updateOrCreate(
            ['email' => 'halobca@bca.co.id'],
            [
                'nama_perusahaan' => 'PT Bank Central Asia Tbk',
                'tagline' => 'Senantiasa di Sisi Anda',
                'deskripsi' => 'PT Bank Central Asia Tbk (BCA) merupakan salah satu bank terkemuka di Indonesia yang fokus pada bisnis perbankan transaksi serta menyediakan fasilitas kredit dan solusi keuangan bagi segmen korporasi, komersial, UKM, dan konsumer. BCA berkomitmen memberikan layanan terbaik dengan mengedepankan inovasi digital banking yang aman dan tepercaya.',
                'telepon' => '1500888',
                'alamat' => 'Menara BCA, Grand Indonesia, Jl. M.H. Thamrin No. 1, Jakarta Pusat 10310',
                'logo' => 'logo.png',
            ]
        );
    }
}
