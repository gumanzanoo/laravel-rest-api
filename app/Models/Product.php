<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];

    public function getPriceAttribute(): float|int
    {
        return $this->attributes['price'] / 100;
    }

    public function setPriceAttribute($attr): float|int
    {
        return $this->attributes['price'] = $attr * 100;
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class, 'id');
    }
}
