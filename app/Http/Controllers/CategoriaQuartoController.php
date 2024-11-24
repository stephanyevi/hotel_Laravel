<?php

namespace App\Http\Controllers;

use App\Models\CategoriaQuarto;
use Illuminate\Http\Request;

class CategoriaQuartoController extends Controller
{
    public function index()
    {
        $categorias = CategoriaQuarto::all(); // ou o método que você usa para buscar os dados
        return view('categorias_quarto.index', compact('categorias'));
    }


    public function create()
    {
        return view('categorias_quarto.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
        ]);

        CategoriaQuarto::create($request->all());
        return redirect()->route('categorias-quarto.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit($id)
    {
        $categoria = CategoriaQuarto::findOrFail($id);
        return view('categorias_quarto.edit', compact('categoria'));
    }


    public function update(Request $request, CategoriaQuarto $categoriasQuarto)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
        ]);

        $categoriasQuarto->update($request->all());
        return redirect()->route('categorias-quarto.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy(CategoriaQuarto $categoriasQuarto)
    {
        $categoriasQuarto->delete();
        return redirect()->route('categorias-quarto.index')->with('success', 'Categoria deletada com sucesso!');
    }
}
