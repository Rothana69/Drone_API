<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Drone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'type',
        'battery_life',
        'weight',
        'payload',
        'max_speed',
        'max_altitude',
        'user_id',
        'plan_id'
    ];

    public static function store($reques, $id = null)
    {
        $drone = $reques->only([
            'name',
            'status',
            'type',
            'battery_life',
            'weight',
            'payload',
            'max_speed',
            'max_altitude',
        ]);

        $drone['user_id'] = Auth::user()->id;

        $drone = self::updateOrCreate(['id' => $id], $drone);

        return $drone;
    }

    public function plan(): BelongsTo
    {
        return $this->belongsTo(Plan::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function map(): HasMany
    {
        return $this->hasMany(Map::class);
    }
}
