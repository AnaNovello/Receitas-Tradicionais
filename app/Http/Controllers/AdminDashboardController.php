<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $contatos = \App\Models\Contato::orderBy('created_at', 'asc')->get();
        $user = Auth::user();
        return view('admin.dashboard', compact('user', 'contatos'));
    }
}
