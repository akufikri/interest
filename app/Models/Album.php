<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'user_id'
    ];
    protected $table = 'albums';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'detail_albums');
    }
}
