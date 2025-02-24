<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;

class AdminContatoController extends Controller
{
    // Método para listar todos os contatos na área administrativa
    public function index()
    {
        // Recupera todos os contatos, ou aplique paginação
        $contatos = Contato::orderBy('created_at', 'asc')->get();
        return view('admin.contatos.admin_contatos', compact('contatos'));
    }

    public function updateStatus(Request $request, $id){
        $request->validate([
            'status' => 'required|in:pendente,aprovada,rejeitada',
        ]);

        $contato = Contato::findOrFail($id);
        $contato->status = $request->status;
        $contato->save();

        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }


    // Método para excluir um contato
    public function destroy($id)
    {
        $contato = Contato::findOrFail($id);
        $contato->delete();
        return redirect()->route('admin.contatos.admin_contatos')->with('success', 'Contato excluído com sucesso!');
    }

    // Se necessário, métodos para editar/atualizar podem ser adicionados aqui
}
