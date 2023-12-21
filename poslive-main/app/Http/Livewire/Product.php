<?php

namespace App\Http\Livewire;

use App\Models\Atribut;
use Livewire\Component;
use App\Models\Kategori;
use App\Models\MetoderOrder;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class Product extends Component
{
    use WithFileUploads;
    use WithPagination;
    //PRODUCT DATA
    public $nama, $idkategori, $idatribut, $idmetode, $gambar, $status, $deskripsi, $stok, $harga, $slug, $product_id;
    public $updateMode = false;
    public $search;

    //UTILITY
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['editProduct', 'createProduct'];

    public function render()
    {
        $categories = Kategori::where('nama', 'like', '%' . $this->search . '%')->get();
        $options = Atribut::where('nama', 'like', '%' . $this->search . '%')->get();
        $ordermethods = MetoderOrder::where('nama', 'like', '%' . $this->search . '%')->get();
        $products = Produk::where('nama', 'like', '%' . $this->search . '%')
            ->orWhere('status', 'like', '%' . $this->search . '%')
            ->orWhere('harga', 'like', '%' . $this->search . '%')
            ->orWhere('deskripsi', 'like', '%' . $this->search . '%')
            ->orWhere('stok', 'like', '%' . $this->search . '%')
            ->orderBy('id')
            ->get();
        return view('livewire.products', compact('products', 'categories', 'options', 'ordermethods'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    private function resetInput()
    {
        $this->product_id = null;
        $this->nama = null;
        $this->idkategori = null;
        $this->idatribut = null;
        $this->idmetode = null;
        $this->gambar = null;
        $this->stok = null;
        $this->harga = null;
        $this->status = null;
        $this->deskripsi = null;
        $this->slug = null;
    }

    public function previewImage()
    {
        $this->validate([
            'gambar' => 'image|max:2048|required'
        ]);
    }

    public function store()
    {
        $this->validate([
            'gambar' => 'image|max:2048|required',
            'nama' => 'required|string|max:100',
            'idkategori' => 'required|string|max:100',
            'idatribut' => 'required|string|max:100',
            'idmetode' => 'required|string|max:100',
            'deskripsi' => 'required|string|max:255',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'status' => 'required|string|max:50'
        ]);
        $imageName = $this->gambar->getClientOriginalName();
        Storage::putFileAs('public/uploads', $this->gambar, $imageName);

        Produk::create([
            'nama' => $this->nama,
            'idkategori' => $this->idkategori,
            'idatribut' => $this->idatribut,
            'idmetode' => $this->idmetode,
            'stok' => $this->stok,
            'harga' => $this->harga,
            'deskripsi' => $this->deskripsi,
            'status' => $this->status,
            'gambar' => $imageName,
            'slug' => $this->slug = Str::slug($this->nama),
        ]);
        session()->flash('message', 'Produk berhasil dibuat.');
        $this->resetInput();
        $this->resetPage();
        return $this->redirectRoute('products');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $product = Produk::with('category', 'option', 'order_method')->where('id', $id)->first();
        $this->product_id = $id;
        $this->nama = $product->nama;
        $this->idkategori = $product->idkategori;
        $this->idatribut = $product->idatribut;
        $this->idmetode = $product->idmetode;
        $this->stok = $product->stok;
        $this->harga = $product->harga;
        $this->deskripsi = $product->deskripsi;
        $this->status = $product->status;
    }
    public function deleteProduct($id)
    {
        $product = Produk::with('category', 'option', 'order_method')->where('id', $id)->first();
        $this->product_id = $id;
        $this->nama = $product->nama;
        $this->idkategori = $product->idkategori;
        $this->idatribut = $product->idatribut;
        $this->idmetode = $product->idmetode;
        $this->stok = $product->stok;
        $this->harga = $product->harga;
        $this->status = $product->status;
        $this->deskripsi = $product->deskripsi;
    }


    public function editProductImage($id)
    {
        $this->updateMode = true;
        $product = Produk::with('category', 'option', 'order_method')->where('id', $id)->first();
        $this->product_id = $id;
        $this->gambar = $product->gambar;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required|string|max:100',
            'idkategori' => 'required',
            'idatribut' => 'required',
            'idmetode' => 'required',
            'stok' => 'required|numeric',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string|max:255',
            'status' => 'required|string|max:50',
            'gambar' => 'image|max:2048|required',
        ]);

        $imageName = $this->gambar->getClientOriginalName();
        Storage::putFileAs('public/uploads', $this->gambar, $imageName);

        if ($this->product_id) {
            $product = Produk::find($this->product_id);
            $product->update([
                'nama' => $this->nama,
                'idkategori' => $this->idkategori,
                'idatribut' => $this->idatribut,
                'idmetode' => $this->idmetode,
                'stok' => $this->stok,
                'harga' => $this->harga,
                'deskripsi' => htmlspecialchars($this->deskripsi, ENT_HTML5),
                'status' => $this->status,
                'slug' => $this->slug = Str::slug($this->nama),
                'gambar' => $imageName,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Produk berhasil diubah.');
            $this->resetInput();
            return $this->redirectRoute('products');
        }
    }

    public function updateProductImage()
    {
        $this->validate([
            'gambar' => 'image|max:2048|required',
        ]);

        $imageName = $this->gambar->getClientOriginalName();
        Storage::putFileAs('public/uploads', $this->gambar, $imageName);

        if ($this->product_id) {
            $product = Produk::find($this->product_id);
            $product->update([
                'gambar' => $imageName,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Berhasil ubah gambar.');
            $this->resetInput();
            return $this->redirectRoute('products');
        }
    }

    public function delete($id)
    {
        if ($this->product_id) {
            Produk::find($this->product_id)->delete();
            session()->flash('message', 'Produk berhasil dihapus.');
        }
    }
}
