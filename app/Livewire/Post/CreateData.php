<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateData extends Component
{
    use WithFileUploads;
    public $title;
    public $desc;
    public $media;
    public $user_id;
    public function render()
    {
        return view('livewire.post.create-data');
    }
    public function submit()
    {
        $this->validate([
            'title' => 'required',
            'desc' => 'required',
            'media' => 'required|mimes:png,jpg',
        ]);
        Post::create([
            'title' => $this->title,
            'desc' => $this->desc,
            'media' => $this->media->store('public/media'),
            'user_id' => Auth::user()->id,
        ]);

        $this->title = '';
        $this->desc = '';
        $this->media = null;

        $this->reset();
    }
}
