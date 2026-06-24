<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri';

    protected $fillable = [
        'judul',
        'image',
        'deskripsi',
    ];

    /**
     * Resolve the gallery image URL dynamically.
     */
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return asset('images/logo.png'); // fallback
        }

        if (str_starts_with($this->image, 'uploads/')) {
            return \Illuminate\Support\Facades\Storage::url($this->image);
        }

        return asset('images/' . $this->image);
    }
}

