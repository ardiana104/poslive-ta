<?php
  
namespace App\Http\Livewire;

use App\Models\Komentar as ModelsKomentar;
use App\Models\Post;
use Livewire\Component;
  
class Komentar extends Component
{
    public $nama, $idpost, $email, $body;
    public $post;

    public function mount($id)
    {
        $this->post = Post::find($id);
    }

    private function resetInput()
    {
        $this->nama = null;
        $this->idpost = null;
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
        
        ModelsKomentar::create([
            'idpost' => $this->post->id,
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