<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receita;
use Illuminate\Support\Facades\Auth;
use App\Models\ReceitaSalva;

class ReceitaController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');

        $receitas = Receita::where('status', 'aprovada')
                    ->when($search, function($query, $search){
                        return $query->where('nome', 'like', "%{$search}%");
                    })
                    ->paginate(10);
        return view('receitas', compact('receitas', 'search'));
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

    public function show($id){
        $receita = Receita::findOrFail($id);
        $receitasSalvas = [];
        if (Auth::check() && Auth::user()->usertype === 'user') {
            $receitasSalvas = ReceitaSalva::where('user_id', Auth::id())
                                        ->pluck('receita_id')
                                        ->toArray();
        }

        return view('receita', compact('receita', 'receitasSalvas'));
    }

    public function salvarReceita($id){
        // Verifica se o usuário está logado e é do tipo 'user'
        if (!Auth::check() || Auth::user()->usertype !== 'user') {
            return redirect()->route('login')->with('error', 'Você não tem permissão para salvar receitas.');
        }

        $user = Auth::user();

        // Verifica se a receita já foi salva pelo usuário
        $jaSalva = ReceitaSalva::where('user_id', $user->id)
                                ->where('receita_id', $id)
                                ->exists();

        if ($jaSalva) {
            return redirect()->back()->with('info', 'Você já salvou essa receita.');
        }

        // Salva a receita na tabela 'receitas_salvas'
        ReceitaSalva::create([
            'user_id' => $user->id,
            'receita_id' => $id,
        ]);

        return redirect()->back()->with('success', 'Receita salva com sucesso!');
    }

    public function excluirReceita($id) {
        if (Auth::check() && Auth::user()->usertype === 'user') {
            ReceitaSalva::where('user_id', Auth::id())
                        ->where('receita_id', $id)
                        ->delete();
            
            return redirect()->back()->with('success', 'Receita removida da coleção com sucesso!');
        }
        
        return redirect()->route('login')->with('error', 'Você precisa estar logado para excluir receitas.');
    }
    
    
}
