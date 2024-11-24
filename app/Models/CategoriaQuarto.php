<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaQuarto extends Model
{
    use HasFactory;

    protected $table = 'categorias_quarto';

    protected $fillable = ['nome', 'descricao', 'preco'];

    public function quartos()
    {
        return $this->hasMany(Quarto::class, 'categoria_quarto_id');
    }
}
