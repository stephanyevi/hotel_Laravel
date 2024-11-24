<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarto extends Model
{
    use HasFactory;

    // Nome da tabela
    protected $table = 'quartos';

    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'categoria_quarto_id',
        'numero',
        'descricao',
    ];

    // Relacionamento com CategoriaQuarto
    public function categoria()
    {
        return $this->belongsTo(CategoriaQuarto::class, 'categoria_quarto_id');
    }
}

