<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\DetailAlbum;
use App\Models\Post;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        return view('page.beranda');
    }
    public function create()
    {
        return view('page.postingan.buat-postingan');
    }


    // Postingan
    public function d_post($id)
    {
        $data = Post::find($id);
        return view('page.postingan.detail-postingan', compact('data'));
    }
    public function e_post($id)
    {
        $data = Post::find($id);
        return view('page.postingan.edit-postingan', compact('data'));
    }
    // Postingan


    // Album
    public function album()
    {
        return view('page.album.album');
    }
    public function d_album($id)
    {
        $data = Album::find($id);
        return view('page.album.detail-album', compact('data'));
    }
    // Album

    public function search(Request $request)
    {
        $search = $request->input('search');
        $result = Post::where('title', 'like', "%$search%")->get();
        return view('page.search', ['result' => $result]);
    }
}
