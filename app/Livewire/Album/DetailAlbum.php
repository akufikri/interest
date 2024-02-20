<?php

namespace App\Livewire\Album;

use App\Models\Album;
use App\Models\DetailAlbum as ModelsDetailAlbum;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DetailAlbum extends Component
{
    public $data;
    public $albumDetail;
    public $post;
    public $title;
    public $desc;
    public function render()
    {
        return view('livewire.album.detail-album');
    }
    public function mount($id)
    {
        $this->data = Album::find($id);
        $this->albumDetail = ModelsDetailAlbum::where('album_id', $this->data->id)->get();
        if ($this->data) {
            $this->title = $this->data->title;
            $this->desc = $this->data->desc;
        }
    }
    public function delete($id)
    {
        $this->albumDetail = ModelsDetailAlbum::find($id);
        $this->albumDetail->delete();
        $this->albumDetail = ModelsDetailAlbum::where('album_id', $this->data->id)->get();
    }

    public function delete_album($id)
    {
        $this->data = Album::find($id);
        $this->data->delete($id);

        ModelsDetailAlbum::where('album_id', $this->data->id)
            ->delete();
        // $this->data = Album::where('user_id', Auth::user()->id)->with('posts')->get();
        return redirect('/album');
    }
    public function update_album()
    {

        if ($this->data) {
            $this->data->title = $this->title;
            $this->data->desc = $this->desc;
            $this->data->user_id = Auth::user()->id;
            $this->data->save();
        }
    }
}
