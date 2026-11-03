<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Idea extends Model
{
    use SoftDeletes;
    //
    protected $fillable = [
        'titulo',
        'descripcion',
        'estado',
        'autor',
        'categoriaId',
        'observacion'
    ];

    public function categoria(): BelongsTo
    {
    return $this->belongsTo(Categoria::class, 'categoriaId');
    
    }
}
