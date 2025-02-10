<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReceitaController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/', [ReceitaController::class, 'index']);

/*Route::get('/', function(){
    $nome = "soda";
    $categoria = "Italiana";
    return view('receitas', ['nome' => $nome, 'categoria' => $categoria]);
});*/


/*Route::get('/', function () {
    return redirect()->route('perfil.galeria');
});*/


/*controllers
Route::get('/', [UserController::class, 'index'])->name('receitas.index');

Route::get('/receitas/{id?}', [UserController::class, 'show'])->name('receitas.show');*/



/* exemplo de agrupamento de rotas

Route::group(['prefix' => 'perfil', 'as' => 'perfil.'], function(){

    Route::get('galeria', function(){
        return "galeria";
    })->name('galeria');

    Route::get('competencias', function(){
        return "competencias";
    })->name('competencias');

    Route::get('editar', function(){
        return "editar perfil";
    })->name('editar');
});*/

//Route::resource('usuarios', UserController::class);