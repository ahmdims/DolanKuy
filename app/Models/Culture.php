<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    use HasFactory;

    protected $table = 'cultures';

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected static function getDefaultUserId()
    {
        // Menghasilkan nilai acak antara -1 dan 36
        return random_int(-1, 36);
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function commentCount()
    {
        return $this->comments()->count();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function viewCount()
    {
        return number_format($this->view_count, 0, ',', '.');
    }

    public function likeCount()
    {
        $likeCount = Like::where('entity_id', $this->id)
            ->where('entity_type', 'culture')
            ->count();

        return number_format($likeCount, 0, ',', '.');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'entity_id')->where('entity_type', 'culture');
    }

    public function historyCount()
    {
        $likeCount = History::where('entity_id', $this->id)
            ->where('entity_type', 'culture')
            ->count();

        return number_format($likeCount, 0, ',', '.');
    }

    public function histories()
    {
        return $this->hasMany(History::class, 'entity_id')->where('entity_type', 'culture');
    }

    public function countLikes()
    {
        return $this->likes()->count();
    }
}
