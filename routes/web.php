<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\InicialController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminContatoController;

/*Route::get('/receitas', function () {
    return view('receitas'); // Verifique se este arquivo existe em resources/views/
})->name('receitas'); // Definindo o nome da rota*/

//Route::get('/inicial',[InicialController::class, 'index'])->name('inicial');

Route::get('/',[InicialController::class, 'index'])->name('inicial');

Route::get('/receitas', [ReceitaController::class, 'index'])->name('receitas');

Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias');

Route::get('/sobre-nos', [SobreNosController::class, 'index'])->name('sobre_nos');

Route::get('/contato', [ContatoController::class, 'index'])->name('contato');

// Para usuários comuns
Route::middleware(['auth', 'verified', 'redirectIfAdmin'])->group(function(){
    Route::get('/dashboard', [ProfileController::class, 'show'])->name('dashboard');
});

// Para administradores
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard'); // Alterando o controller conforme necessário
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/contato', [ContatoController::class, 'store'])->name('contato.store');

Route::prefix('admin/receitas')->group(function(){
    Route::get('/adicionar', [ReceitaController::class, 'adicionar'])->name('admin.receitas.adicionar');
    Route::get('/aprovadas', [ReceitaController::class, 'aprovadas'])->name('admin.receitas.aprovadas');
    Route::get('/atualizar', [ReceitaController::class, 'atualizar'])->name('admin.receitas.atualizar');
    Route::get('/excluir', [ReceitaController::class, 'excluir'])->name('admin.receitas.excluir');

    // Rotas de Ações (CRUD)
    Route::post('/adicionar', [ReceitaController::class, 'store'])->name('admin.receitas.store');
    Route::get('/editar/{id}', [ReceitaController::class, 'editar'])->name('admin.receitas.editar');
    Route::put('/atualizar/{id}', [ReceitaController::class, 'update'])->name('admin.receitas.update');
    Route::delete('/deletar/{id}', [ReceitaController::class, 'destroy'])->name('admin.receitas.deletar');

    Route::put('/{id}/atualizar-status', [ReceitaController::class, 'atualizarStatus'])->name('admin.receitas.atualizarStatus');
});

Route::prefix('admin/contatos')->middleware(['auth', 'admin'])->group(function() {
    Route::get('/', [AdminContatoController::class, 'index'])->name('admin.contatos.index');
    Route::get('/{id}', [AdminContatoController::class, 'show'])->name('admin.contatos.show'); // Opcional, se quiser visualizar detalhes
    Route::delete('/{id}', [AdminContatoController::class, 'destroy'])->name('admin.contatos.destroy');
    Route::put('/{id}/atualizar-status', [AdminContatoController::class, 'updateStatus'])->name('admin.contatos.atualizarStatus');

});













require __DIR__.'/auth.php';