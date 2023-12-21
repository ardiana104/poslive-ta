<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class TentangKami extends Component
{
    public function render()
    {
        return view('livewire.frontend.tentang-kami')->layout('layouts.masterweb');
    }
}
