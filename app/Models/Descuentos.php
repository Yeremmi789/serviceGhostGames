<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Games;


class Descuentos extends Model
{
    use HasFactory;

    public function games(){
        return $this->hasMany(Games::class, 'game_id');
    }
}
