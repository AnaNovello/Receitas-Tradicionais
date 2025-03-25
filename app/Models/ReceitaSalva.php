<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReceitaSalva extends Model
{
    protected $table = 'receitas_salvas';
    protected $fillable = [
        'user_id', 
        'receita_id'
    ];
}

