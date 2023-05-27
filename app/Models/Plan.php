<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'date_time',
        'area',
        'altitude',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
