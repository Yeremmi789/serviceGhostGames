<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Categoria;
use App\Models\Descuentos;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Games extends Model
{
    use HasFactory;

    public function categoria():BelongsTo{
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }


    public function descuentos(){
        return $this->belongsTo(Descuentos::class, 'game_id');
    }
}
