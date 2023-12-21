<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Coffee extends Component
{
    public function render()
    {
        return view('livewire.frontend.coffee')->layout('layouts.masterweb');
    }
}
