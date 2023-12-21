<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Atribut;
use Livewire\WithPagination;

class Atributs extends Component
{
    use WithPagination;
    public $nama, $deskripsi, $option_id;
    public $search;
    public $updateMode = false;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $options = Atribut::where('nama', 'like', '%' . $this->search . '%')
            ->orWhere('deskripsi', 'LIKE', '%' . $this->search . '%')
            ->orderBy('id')
            ->paginate(8);
        return view('livewire.options', compact('options'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    private function resetInput()
    {
        $this->option_id = null;
        $this->nama = null;
        $this->deskripsi = null;
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
        ]);

        Atribut::create([
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
        ]);
        session()->flash('message', 'Berhasil tambah atribut.');
        $this->resetInput();
        return $this->redirectRoute('atributs');
    }
    public function edit($id)
    {
        $this->updateMode = true;
        $option = Atribut::where('id', $id)->first();
        $this->option_id = $id;
        $this->nama = $option->nama;
        $this->deskripsi = $option->deskripsi;
    }
    public function update()
    {
        $this->validate([
            'nama' => 'required|string|max:50',
            'deskripsi' => 'required'
        ]);

        if ($this->option_id) {
            $option = Atribut::find($this->option_id);
            $option->update([
                'nama' => $this->nama,
                'deskripsi' => $this->deskripsi,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Berhasil ubah atribut.');
            $this->resetInput();
            return $this->redirectRoute('atributs');
        }
    }

    public function delete($id)
    {
        if ($id) {
            Atribut::where('id', $id)->delete();
            session()->flash('message', 'Berhasil hapus atribut.');
        }
    }
}
