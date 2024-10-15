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
        'rating',
        'id_destination'
    ];
}