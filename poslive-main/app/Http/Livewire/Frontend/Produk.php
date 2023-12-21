<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Produk as ProdukModel;
use Livewire\Component;
use App\Models\Kategori;

class Produk extends Component
{
    public function render()
    {
        $product = ProdukModel::where('status', 'active')->orderBy('id','desc')->paginate(6);
        $categories = Kategori::all();
        return view('livewire.frontend.produk', compact('product', 'categories'))->layout('layouts.masterweb');
    }
}
