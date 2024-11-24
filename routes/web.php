<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaQuartoController;
use App\Http\Controllers\QuartoController;
use App\Http\Controllers\FerramentaManutencaoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rotas para Categorias de Quarto
    Route::resource('categorias-quarto', CategoriaQuartoController::class);


    // Rotas para Quartos
    Route::resource('quartos', QuartoController::class);

    // Rotas para Ferramentas de Manutenção
    Route::resource('ferramentas-manutencao', FerramentaManutencaoController::class);

    // Rota para Relatório
    Route::get('/relatorio/categorias', [CategoriaQuartoController::class, 'relatorio'])->name('categorias-quarto.relatorio');
});

require __DIR__.'/auth.php';
