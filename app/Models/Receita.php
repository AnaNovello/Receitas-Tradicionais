<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receita extends Model
{
    use HasFactory;

    protected $table = 'receita'; 

    protected $fillable = [
        'nome', 
        'categoria',
        'descricao',
        'foto',
        'ingredientes',
        'preparo',
        'status', 
        'admin_id'
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function salvas(){
        return $this->belongsToMany(User::class, 'receitas_salvas', 'receita_id', 'user_id');
    }

}
