<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'entity_id',
        'entity_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'entity_id')->where('entity_type', 'destination');
    }

    public function msme()
    {
        return $this->belongsTo(Msme::class, 'entity_id')->where('entity_type', 'msme');
    }

    public function culure()
    {
        return $this->belongsTo(Culture::class, 'entity_id')->where('entity_type', 'culure');
    }

    public function scopeForEntity($query, $entityId, $entityType)
    {
        return $query->where('entity_id', $entityId)->where('entity_type', $entityType);
    }
}
