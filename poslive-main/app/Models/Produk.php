<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $guarded = [];

    public function category()
    {
        return $this->hasOne(Kategori::class, 'id', 'idkategori');
    }
    public function option()
    {
        return $this->hasOne(Atribut::class, 'id', 'idatribut');
    }
    public function order_method()
    {
        return $this->hasOne(MetoderOrder::class, 'id', 'idmetode');
    }
}
