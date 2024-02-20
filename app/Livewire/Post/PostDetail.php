<?php

namespace App\Livewire\Post;

use App\Models\Album;
use App\Models\Commentar;
use App\Models\DetailAlbum;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostDetail extends Component
{
    public $data;
    public $content;
    public $coment;
    public $liked;
    public $album;
    public $selectedAlbumId;
    public $albumId;
    public $dataPostAlbum;
    public function render()
    {
        return view('livewire.post.post-detail');
    }
    public function mount($id)
    {
        $this->data = Post::find($id);
        $this->coment = Commentar::where('post_id', $this->data->id)->latest()->get();
        $this->liked = Like::where('user_id', Auth::user()->id)
            ->where('post_id', $this->data->id)
            ->first();
        $this->album = Album::where('user_id', Auth::user()->id)->get();
    }
    public function submit_comment()
    {
        $this->validate([
            'content' => 'required|max:300'
        ]);

        Commentar::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->data->id,
            'content' => $this->content
        ]);

        $this->content = '';

        $this->coment = Commentar::where('post_id', $this->data->id)->get();
    }

    public function likes()
    {

        if ($this->liked) {
            $this->liked->delete();
        } else {
            Like::create([
                'user_id' => Auth::user()->id,
                'post_id' => $this->data->id,
                'likes' => true
            ]);
        }
        $this->liked = Like::where('user_id', Auth::user()->id)
            ->where('post_id', $this->data->id)
            ->first();
    }
    public function delete_post($id)
    {
        $this->data = Post::find($id);
        $this->data->delete();
        DetailAlbum::where('post_id', $this->data->id)
            ->delete();
        Like::where('post_id', $this->data->id)
            ->delete();
        Commentar::where('post_id', $this->data->id)
            ->delete();

        return redirect('/');
    }
    public function save_to_album($albumId)
    {
        if ($albumId) {
            DetailAlbum::create([
                'post_id' => $this->data->id,
                'album_id' => $albumId
            ]);
        }
    }
    public function delete_coment($id)
    {
        // Commentar::where('post_id','user_id', Auth::user()->id)
        //     ->delete();

        $this->coment = Commentar::find($id);
        $this->coment->delete();
        $this->coment = Commentar::where('post_id', $this->data->id)->get();
    }
}
