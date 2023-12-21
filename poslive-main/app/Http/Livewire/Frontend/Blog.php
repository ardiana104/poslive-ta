<?php

namespace App\Http\Livewire\Frontend;

use App\Http\Livewire\Posts;
use App\Models\Post;
use Livewire\Component;

class Blog extends Component
{
    public function render()
    {
        return view('livewire.frontend.blog')->layout('layouts.masterweb');
    }
}
