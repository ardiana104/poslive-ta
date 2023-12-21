<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


class Category extends Component
{
    use WithPagination;
    use WithFileUploads;
    //CATEGORY DATA
    public $gambar, $nama, $deskripsi, $kategori_id;
    public $search;
    public $updateMode = false;
    //UTILITY
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $categories = Kategori::where('nama', 'like', '%' . $this->search . '%')->orderBy('id')->get();
        return view('livewire.categories', ['categories' => $categories]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    private function resetInput()
    {
        $this->nama = null;
        $this->gambar = null;
        $this->deskripsi = null;
    }

    public function previewImage()
    {
        $this->validate([
            'gambar' => 'nullable|gambar|max:2048'
        ]);
    }

    public function store()
    {
        $this->validate([
            'gambar' => 'nullable|image|max:2048',
            'nama' => 'required|string|unique:kategoris',
            'deskripsi' => 'required'
        ]);
        $imageName = $this->gambar->getClientOriginalName();

        Storage::putFileAs('public/uploads', $this->gambar, $imageName);

        Kategori::create([
            'nama' => $this->nama,
            'gambar' => $imageName,
            'deskripsi' => $this->deskripsi
        ]);
        
        session()->flash('message', 'Kategori berhasil dibuat.');
        $this->dispatchBrowserEvent('categoryStore');
        $this->resetInput();
        return $this->redirectRoute('categories');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $category = Kategori::where('id', $id)->first();
        $this->kategori_id = $id;
        $this->nama = $category->nama;
        $this->gambar = $category->gambar;
        $this->deskripsi = $category->deskripsi;
    }
    public function update()
    {
        $this->validate([
            'nama' => 'required|string|max:50',
            'deskripsi' => 'required',
            'gambar' => 'nullable|gambar|max:2048'
        ]);

        $imageName = $this->gambar->getClientOriginalName();
        Storage::putFileAs('public/uploads', $this->gambar, $imageName);

        if ($this->kategori_id) {
            $category = Kategori::find($this->kategori_id);
            $category->update([
                'nama' => $this->nama,
                'deskripsi' => $this->deskripsi,
                'gambar' => $imageName,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Kategori berhasil diubah.');
            $this->resetInput();
            return $this->redirectRoute('categories');
        }
    }

    public function updateCategoryImage()
    {
        $this->validate([
            'gambar' => 'nullable|gambar|max:2048',
        ]);

        $imageName = $this->gambar->getClientOriginalName();
        Storage::putFileAs('public/uploads', $this->gambar, $imageName);

        if ($this->kategori_id) {
            $category = Kategori::find($this->kategori_id);
            $category->update([
                'gambar' => $imageName,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Berhasil ubah gambar.');
            $this->resetInput();
            return $this->redirectRoute('categories');
        }
    }

    public function delete($id)
    {
        if ($id) {
            Kategori::where('id', $id)->delete();
            session()->flash('message', 'Kategori berhasil dihapus.');
        }
    }
}
