<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $primaryKey = 'ProdukID';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'ProdukID',
        'NamaProduk',
        'Harga',
        'Stok',
    ];
}