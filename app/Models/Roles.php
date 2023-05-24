<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roles extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public static function store($request, $id = null)
    {
        $role = $request->only(['name']);

        $role = self::updateOrCreate(['id' => $id], $role);

        return $role;
    }

    public function role(): HasMany
    {
        return $this->hasMany(Farmers::class);
    }
}
