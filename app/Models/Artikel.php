<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'description',
        'categori',
        'status',
    ];

    /**
     * Map kategori to categori column for backward compatibility with frontend views.
     */
    public function getKategoriAttribute()
    {
        return $this->categori;
    }

    /**
     * Resolve the article image URL dynamically.
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

