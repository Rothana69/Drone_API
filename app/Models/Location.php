<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'latitude',
        'longitude',
        'farm_id',
        'drone_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }
    public function drone(): BelongsTo
    {
        return $this->belongsTo(Drone::class);
    }
    
}
