<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetoderOrder extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'metode_orders';

    public function product()
    {
        return $this->hasMany(Produk::class);
    }
}
