<?php
  
namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Kategori;
use Illuminate\Support\Str;
use App\Http\Livewire\Quill;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
  
class Posts extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $posts, $idkategori, $judul, $isi, $slug, $gambar, $post_id;
    public $updateMode = false;
    public $search;

    protected $paginationTheme = 'bootstrap';

    public $listeners = [
        Quill::EVENT_VALUE_UPDATED
    ];

    public function quill_value_updated($value){
        $this->isi = $value;
    }

    public function render()
    {
        $this->posts = Post::all();
        $categories = Kategori::where('nama', 'like', '%' . $this->search . '%')->wherein('id', [16, 17, 18])->get();
        return view('livewire.posts', compact('categories'));
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    private function resetInput()
    {
        $this->idkategori = null;
        $this->judul = null;
        $this->gambar = null;
        $this->isi = null;
    }

    public function previewImage()
    {
        $this->validate([
            'gambar' => 'nullable|image|max:2048'
        ]);
    }

    public function store()
    {
        $this->validate([
            'gambar' => 'nullable|image|max:2048',
            'judul' => 'required|string|unique:posts',
            'isi' => 'required'
        ]);
        $imageName = $this->gambar->getClientOriginalName();

        Storage::putFileAs('public/uploads/blog', $this->gambar, $imageName);

        Post::create([
            'idkategori' => $this->idkategori,
            'judul' => $this->judul,
            'slug' => $this->slug = Str::slug($this->judul),
            'gambar' => $imageName,
            'isi' => $this->isi
        ]);
        
        session()->flash('message', 'Blog berhasil dibuat.');
        $this->dispatchBrowserEvent('postStore');
        $this->resetInput();
        return $this->redirectRoute('post');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $posts = Post::where('id', $id)->first();
        $this->post_id = $id;
        $this->idkategori = $posts->idkategori;
        $this->judul = $posts->judul;
        $this->slug = $posts->slug;
        $this->gambar = $posts->gambar;
        $this->isi = $posts->isi;
    }
    public function update()
    {
        $this->validate([
            'judul' => 'required|string|max:50',
            'isi' => 'required',
            'gambar' => 'nullable|image|max:2048',
        ]);

        $imageName = $this->gambar->getClientOriginalName();
        Storage::putFileAs('public/uploads/blog', $this->gambar, $imageName);

        if ($this->post_id) {
            $posts = Post::find($this->post_id);
            $posts->update([
                'judul' => $this->judul,
                'slug' => $this->slug = Str::slug($this->judul),
                'isi' => $this->isi,
                'gambar' => $imageName,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Blog berhasil diubah.');
            $this->resetInput();
            return $this->redirectRoute('post');
        }
    }

    public function updatePostImage()
    {
        $this->validate([
            'gambar' => 'nullable|image|max:2048',
        ]);

        $imageName = $this->gambar->getClientOriginalName();
        Storage::putFileAs('public/uploads/blog', $this->gambar, $imageName);

        if ($this->post_id) {
            $posts = Post::find($this->post_id);
            $posts->update([
                'gambar' => $imageName,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Berhasil ubah gambar.');
            $this->resetInput();
            return $this->redirectRoute('post');
        }
    }

    public function delete($id)
    {
        if ($id) {
            Post::where('id', $id)->delete();
            session()->flash('message', 'Blog berhasil dihapus.');
        }
    }
}