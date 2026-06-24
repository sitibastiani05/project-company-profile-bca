<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilPerusahaan extends Model
{
    use HasFactory;

    protected $table = 'profil_perusahaan';

    protected $fillable = [
        'nama_perusahaan',
        'tagline',
        'deskripsi',
        'email',
        'telepon',
        'alamat',
        'logo',
    ];

    /**
     * Resolve the logo image URL dynamically.
     */
    public function getLogoUrlAttribute()
    {
        if (!$this->logo) {
            return asset('images/logo.png'); // fallback to default logo
        }

        if (str_starts_with($this->logo, 'uploads/')) {
            return \Illuminate\Support\Facades\Storage::url($this->logo);
        }

        return asset('images/' . $this->logo);
    }
}

