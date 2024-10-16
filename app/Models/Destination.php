<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $table = 'destinations';

    protected $fillable = [
        'name',
        'slug',
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
        'rating'
    ];

    // Polymorphic relation with Image
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
