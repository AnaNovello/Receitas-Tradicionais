<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Receita;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $contatos = \App\Models\Contato::where('status', 'pendente')->orderBy('created_at', 'asc')->get();
        $user = Auth::user();
        $receitas = Receita::all();
        return view('admin.dashboard', compact('user', 'contatos', 'receitas'));
    }
}
