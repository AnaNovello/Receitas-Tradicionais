<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Receita;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $contatos = \App\Models\Contato::where('status', 'pendente')->orderBy('created_at', 'asc')->paginate(10);
        $user = Auth::user();
        $receitas = Receita::orderBy('created_at', 'desc')->get();
        return view('admin.dashboard', compact('user', 'contatos', 'receitas'));
    }

    public function filterStatus(Request $request){
        $status = $request->input('status');
        $query = Receita::query(); 

        $receitas = Receita::when($status, function ($query, $status) {
            return $query->where('status', $status);
        })->get();
    
        return view('admin.tabela_parcial_envios', compact('receitas'));
    }

}
