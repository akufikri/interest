<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailAlbum extends Model
{
    use HasFactory;

    protected $fillable = [
        'album_id',
        'post_id'
    ];
    protected $table = 'detail_albums';

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
