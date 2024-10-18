<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Msme extends Model
{
    use HasFactory;

    protected $table = 'msmes';

    protected $fillable = [
        'name',
        'slug',
        'msmes_type',
        'description',
        'address',
        'city',
        'province',
        'latitude',
        'longitude',
        'opening_time',
        'closing_time',
        'ticket_price',
        'facilities',
        'contact',
        'profile_photo',
        'view_count',
        'entity_id',
        'entity_type',
        'style',
        'id_destination'
    ];

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'id_destination');
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
            ->where('entity_type', 'msme')
            ->count();

        return number_format($likeCount, 0, ',', '.');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'entity_id')->where('entity_type', 'msme');
    }

    public function historyCount()
    {
        $likeCount = History::where('entity_id', $this->id)
            ->where('entity_type', 'msme')
            ->count();

        return number_format($likeCount, 0, ',', '.');
    }

    public function histories()
    {
        return $this->hasMany(History::class, 'entity_id')->where('entity_type', 'msme');
    }

    public function countLikes()
    {
        return $this->likes()->count();
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
