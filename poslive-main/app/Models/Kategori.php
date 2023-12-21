<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'kategoris';
    protected $fillable = [
        'nama', 'gambar', 'deskripsi'
    ];
    public function product()
    {
        return $this->hasMany(Produk::class);
    }
}
