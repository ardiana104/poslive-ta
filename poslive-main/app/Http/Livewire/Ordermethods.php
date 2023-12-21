<?php

namespace App\Http\Livewire;

use App\Models\MetoderOrder;
use Livewire\Component;
use App\Models\OrderMethod;

class Ordermethods extends Component
{
    public $nama, $deskripsi, $ordermethod_id;
    public $search;
    public $updateMode = false;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $ordermethods = MetoderOrder::where('nama', 'like', '%' . $this->search . '%')->orderBy('id')->paginate(8);
        return view('livewire.ordermethods', compact('ordermethods'));
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    private function resetInput()
    {
        $this->ordermethod_id = null;
        $this->nama = null;
        $this->deskripsi = null;
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required|string|max:255|unique:metode_orders',
            'deskripsi' => 'required|string|max:255',
        ]);

        MetoderOrder::create([
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
        ]);
        session()->flash('message', 'Berhasil tambah metode order.');
        $this->resetInput();
        return $this->redirectRoute('ordermethods');
    }
    public function edit($id)
    {
        $this->updateMode = true;
        $ordermethod = MetoderOrder::where('id', $id)->first();
        $this->ordermethod_id = $id;
        $this->nama = $ordermethod->nama;
        $this->deskripsi = $ordermethod->deskripsi;
    }
    public function update()
    {
        $this->validate([
            'nama' => 'required|string|max:50',
            'deskripsi' => 'required'
        ]);

        if ($this->ordermethod_id) {
            $ordermethod = MetoderOrder::find($this->ordermethod_id);
            $ordermethod->update([
                'nama' => $this->nama,
                'deskripsi' => $this->deskripsi,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Berhasil ubah metode order.');
            $this->resetInput();
            return $this->redirectRoute('ordermethods');
        }
    }

    public function delete($id)
    {
        if ($id) {
            MetoderOrder::where('id', $id)->delete();
            session()->flash('message', 'Berhasil hapus metode order.');
        }
    }
}
