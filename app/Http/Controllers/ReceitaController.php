<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receita;
use Illuminate\Support\Facades\Auth;

class ReceitaController extends Controller
{
    public function index(){
        $receitas = Receita::all();

        //return view('receitas', ['receitas' => $receitas]);
        return view('receitas');
    }

    public function adicionar() {
        $categorias = [
            'Norte',
            'Nordeste',
            'Centro Oeste',
            'Sudeste',
            'Sul'
        ];

        return view('admin.receitas.adicionar', compact('categorias'));
    }

    public function aprovadas() {
        $receitas = Receita::where('status', 'aprovada')->get();
        return view('admin.receitas.aprovadas', compact('receitas'));
    }

    public function atualizar() {
        $receitas = Receita::all();
        return view('admin.receitas.atualizar', compact('receitas'));
    }

    public function excluir() {
        $receitas = Receita::all();
        return view('admin.receitas.excluir', compact('receitas'));
    }


    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'descricao' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'ingredientes' => 'required|string',
            'preparo' => 'required|string',
        ]);

        // Criação da receita
        $receita = new Receita();
        $receita->nome = $request->nome;
        $receita->categoria = $request->categoria;
        $receita->descricao = $request->descricao;
        $receita->ingredientes = $request->ingredientes;
        $receita->preparo = $request->preparo;
        
        // Armazenando a imagem
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('fotos_receitas', 'public');
            $receita->foto = $fotoPath;
        }

        // Definindo o status como 'pendente' por padrão
        $receita->status = 'pendente';

        if (Auth::check()) {
            $receita->admin_id = Auth::id();
        }

        // Salvar a receita no banco de dados
        $receita->save();

        // Redirecionar ou retornar uma resposta de sucesso
        return redirect()->route('admin.dashboard')->with('success', 'Receita adicionada com sucesso!');
    }

    public function editar($id){
        $receita = Receita::findOrFail($id);
        
        // Se você tiver uma listagem de categorias, passe também; senão, defina aqui um array fixo
        $categorias = ['Norte',
            'Nordeste',
            'Centro Oeste',
            'Sudeste',
            'Sul'
        ];

        return view('admin.receitas.adicionar', compact('receita', 'categorias'));
    }

    public function update(Request $request, $id){
        $receita = Receita::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'descricao' => 'required|string',
            'ingredientes' => 'required|string',
            'preparo' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $receita->nome = $request->nome;
        $receita->categoria = $request->categoria;
        $receita->descricao = $request->descricao;
        $receita->ingredientes = $request->ingredientes;
        $receita->preparo = $request->preparo;

        // Atualiza a foto se um novo arquivo for enviado
        if ($request->hasFile('foto')) {
            if($receita->foto){
                \Illuminate\Support\Facades\Storage::delete('public/' . $receita->foto);
            }
            $fotoPath = $request->file('foto')->store('fotos_receitas', 'public');
            $receita->foto = $fotoPath;
        }

        $receita->save();

        return redirect()->route('admin.dashboard')->with('success', 'Receita atualizada com sucesso!');
    }

    public function destroy($id){
        $receita = Receita::findOrFail($id);

        // Opcional: Se desejar apagar a foto associada
        if ($receita->foto) {
            \Illuminate\Support\Facades\Storage::delete('public/' . $receita->foto);
        }

        $receita->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Receita excluída com sucesso!');
    }

    public function atualizarStatus(Request $request, $id){
        // Valide o status
        $request->validate([
            'status' => 'required|in:pendente,aprovada,rejeitada',
        ]);

        // Encontre a receita pelo ID
        $receita = Receita::findOrFail($id);

        // Atualize o status
        $receita->status = $request->status;
        $receita->save();

        // Redirecione com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Status atualizado com sucesso!');
    }
        



    
}
