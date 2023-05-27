<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Farm extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'size',
        'user_id',
        'province_id',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
    public function location(): HasMany
    {
        return $this->hasMany(Location::class);
    }
    public function map(): HasMany
    {
        return $this->hasMany(Map::class);
    }
}
