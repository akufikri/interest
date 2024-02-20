<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'media',
        'user_id'
    ];
    protected $table = 'posts';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function albums()
    {
        return $this->belongsToMany(Album::class, 'detail_albums');
    }
}
