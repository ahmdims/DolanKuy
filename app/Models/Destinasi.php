<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_destinasi',
        'deskripsi',
        'alamat',
        'kota',
        'provinsi',
        'latitude',
        'longitude',
        'jam_buka',
        'jam_tutup',
        'harga_tiket',
        'fasilitas',
        'kontak',
        'rating_rata_rata',
    ];
}
