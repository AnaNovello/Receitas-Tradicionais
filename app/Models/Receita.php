<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receita extends Model
{
    use HasFactory;

    protected $table = 'receita'; 
    protected $fillable = ['nome', 'categoria'];
}
