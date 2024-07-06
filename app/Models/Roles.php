<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Roles extends Model
{
    use HasFactory;

    // public function users(): HasMany{ // Un rol lo tienen muchos usuarios <-> un usuario tiene un rol
    //     return $this->hasMany(User::class, 'rol_id');
    // }
}
