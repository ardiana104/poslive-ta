<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Kategori;
use App\Models\Komentar;
use App\Models\Post;
use Livewire\Component;

class ShowBlog extends Component
{
    public $nama, $idpost, $email, $body;
    public $post;

    public function mount($slug)
    {
        $this->post = Post::where('status', '1')->where('slug', $slug)->first();
    }
    
    public function render()
    {
        $data = Post::where('status', '1')->take(5)->get();
        $kategori = Kategori::wherein('id', [16, 17, 18])->get();
        $com = Komentar::where('idpost', $this->post->id)->get();
        $totalkomentar = Komentar::where('idpost', $this->post->id)->count();
        return view('livewire.frontend.show-blog', compact('data', 'kategori', 'com', 'totalkomentar'))->layout('layouts.masterweb');
    }

    private function resetInput()
    {
        $this->idpost = null;
        $this->nama = null;
        $this->email = null;
        $this->body = null;
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|string|unique:komentars',
            'email' => 'required',
            'body' => 'required'
        ]);
        
        Komentar::create([
            'idpost' => 2,
            'nama' => $this->nama,
            'email' => $this->email,
            'body' => $this->body
        ]);

        session()->flash('message', 'Komentar berhasil dibuat.');
        $this->dispatchBrowserEvent('komentarStore');
        $this->resetInput();
        return $this->redirectRoute('showblog', $this->post->slug);
    }
}
