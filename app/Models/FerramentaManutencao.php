<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FerramentaManutencao extends Model
{
    use HasFactory;

    // Nome da tabela no banco de dados
    protected $table = 'ferramentas_manutencao';

    // Campos permitidos para preenchimento
    protected $fillable = [
        'nome',
        'descricao',
        'quantidade',
    ];
}
