<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

class Farmers extends Model
{
    use HasApiTokens, HasFactory;
    protected $fillable = [
        'name',
        'email',
        'role_id',
        'password',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Roles::class);
    }
    
}
