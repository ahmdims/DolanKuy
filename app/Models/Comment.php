<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'commentable_id',
        'commentable_type',
        'comment',
    ];

    // Polymorphic relationship
    public function commentable()
    {
        return $this->morphTo();
    }

    // Relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}