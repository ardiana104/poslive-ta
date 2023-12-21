<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = [];
    protected $fillable = [
        'idkategori', 'judul', 'isi', 'slug', 'gambar', 'status'
    ];

    public function komentar()
    {
        return $this->hasOne(Komentar::class, 'id', 'idpost');
    }
}
