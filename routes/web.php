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


require __DIR__.'/auth.php';

//route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);