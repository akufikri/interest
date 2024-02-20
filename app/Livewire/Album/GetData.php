<?php

namespace App\Livewire\Album;

use App\Models\Album;
use App\Models\DetailAlbum;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class GetData extends Component
{
    public $data;
    public $title;
    public $desc;
    public function render()
    {
        return view('livewire.album.get-data');
    }
    public function mount()
    {
        $this->data = Album::where('user_id', Auth::user()->id)->with('posts')->get();
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required',
            'desc' => 'max:300'
        ]);

        Album::create([
            'title' => $this->title,
            'desc' => $this->desc,
            'user_id' => Auth::user()->id
        ]);

        $this->data = Album::where('user_id', Auth::user()->id)
            ->get();

        $this->title = '';
        $this->desc = '';
    }
}
