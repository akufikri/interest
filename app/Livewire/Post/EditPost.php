<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{
    use WithFileUploads;
    public $title;
    public $desc;
    public $media;
    public $data;
    public function render()
    {
        return view('livewire.post.edit-post');
    }
    public function mount($id)
    {
        $this->data = Post::find($id);
        if ($this->data) {
            $this->title = $this->data->title;
            $this->desc = $this->data->desc;
        }
    }
    public function update()
    {
        $this->validate([
            'media' => 'nullable|mimes:png,jpg'
        ]);

        if ($this->data) {
            $this->data->title = $this->title;
            $this->data->desc = $this->desc;

            if ($this->media) {
                $this->data->media = $this->media->store('public/media');
            }
            $this->data->user_id = Auth::user()->id;
            $this->data->save();

            return redirect('/');
        }
    }
}
