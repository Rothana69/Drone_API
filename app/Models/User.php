<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


// class User extends Model
// {
//     use HasApiTokens, HasFactory;
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
    public function drone():HasMany{
        return $this->hasMany(Drone::class);
    }
    
}
