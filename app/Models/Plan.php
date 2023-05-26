<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'date_time',
        'area',
        'altitude',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function instraction():HasMany
    {
        return $this->hasMany(Instruction::class);
    }
}
