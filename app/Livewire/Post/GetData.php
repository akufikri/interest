<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class GetData extends Component
{
    public $data;
    public function render()
    {
        return view('livewire.post.get-data');
    }
    public function mount()
    {
        $this->data = Post::latest()->get();
    }
}
