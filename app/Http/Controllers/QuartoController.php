<?php

namespace App\Http\Controllers;

use App\Models\Quarto;
use App\Models\CategoriaQuarto;
use Illuminate\Http\Request;

class QuartoController extends Controller
{
    public function index()
    {
        $quartos = Quarto::with('categoria')->get();
        return view('quartos.index', compact('quartos'));
    }

    public function create()
    {
        $categorias = CategoriaQuarto::all();
        return view('quartos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|string|max:255',
            'categoria_quarto_id' => 'required|exists:categorias_quarto,id',
            'descricao' => 'nullable|string',
        ]);

        Quarto::create($request->all());
        return redirect()->route('quartos.index')->with('success', 'Quarto criado com sucesso!');
    }

    public function edit(Quarto $quarto)
    {
        $categorias = CategoriaQuarto::all();
        return view('quartos.edit', compact('quarto', 'categorias'));
    }

    public function update(Request $request, Quarto $quarto)
    {
        $request->validate([
            'numero' => 'required|string|max:255',
            'categoria_quarto_id' => 'required|exists:categorias_quarto,id',
            'descricao' => 'nullable|string',
        ]);

        $quarto->update($request->all());
        return redirect()->route('quartos.index')->with('success', 'Quarto atualizado com sucesso!');
    }

    public function destroy(Quarto $quarto)
    {
        $quarto->delete();
        return redirect()->route('quartos.index')->with('success', 'Quarto excluído com sucesso!');
    }
}
