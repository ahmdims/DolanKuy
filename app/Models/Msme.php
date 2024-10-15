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
        'rating',
        'id_destination'
    ];

    /**
     * Get the destination associated with the MSME.
     */
    public function destination()
    {
        return $this->belongsTo(Destination::class, 'id_destination');
    }
}