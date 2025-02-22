<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contato;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Nullable;
use Illuminate\Support\Facades\Log;

class ContatoController extends Controller
{
    public function index(){
        return view('contato');
    }

    public function store(Request $request){
        //dd($request->all());
        //file_put_contents(storage_path('logs/laravel.log'), '');
        //Log::info('Antes da Validação');

        $request->merge(['tipo' => $request->input('motivo')]);
        \Log::info('Dados após conversão: ', $request->all());

        $data = $request->validate([
            'tipo' => 'required|string',
            'arquivo' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'descricao' => 'required|string',
        ]);

        /*Log::info('Após a Validação', $data);
        $data['tipo'] = $data['motivo'];
        unset($data['motivo']);*/

        //Log::info('Antes do Upload');
        if ($request->hasFile('arquivo')){
            $data['arquivo'] = $request->file('arquivo')->store('contato_arqs', 'public');
        }
       //Log::info('Após o Upload');

        //Log::info('Antes do Auth');
        if (Auth::check()){
            $data['user_id'] = Auth::id();
        }
        //Log::info('Após o Auth');

        //Log::info('Antes do Create');
        //dd($data);
        
        Contato::create($data);

        return redirect()->back()->with('status', 'Formulário enviado com sucesso!');
    }
}
