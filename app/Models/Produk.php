<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'kategori',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Resolve the product image URL dynamically.
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

