<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipo',
        'arquivo',
        'descricao',
        'status'
    ];
}
