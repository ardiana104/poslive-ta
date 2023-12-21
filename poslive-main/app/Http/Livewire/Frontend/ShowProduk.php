<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Produk;
use Livewire\Component;

class ShowProduk extends Component
{
    public $product;

    public function mount($slug)
    {
        $this->product = Produk::with('category', 'option', 'order_method')->where('status', 'active')->where('slug', $slug)->first();
    }

    public function render()
    {
        $produk = Produk::with('category', 'option', 'order_method')->where('status', 'active')->where('id', '!=', $this->product->id)->take(3)->get();
        return view('livewire.frontend.show-produk', compact('produk'))->layout('layouts.masterweb');
    }
}
