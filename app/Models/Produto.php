<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produto extends Model
{
    use HasFactory;

    protected $fillable =["preco","nome","slug","descricao","categoria_id"];


    public function categoria():BelongsTo
    {
        return $this->belongsTo(Categoria::class);
    }
}
