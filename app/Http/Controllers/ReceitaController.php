<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receita;

class ReceitaController extends Controller
{
    public function index(){
        $receitas = Receita::all();

        return view('receitas', ['receitas' => $receitas]);
    }
}
