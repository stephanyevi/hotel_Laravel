<?php

namespace App\Http\Controllers;

use App\Models\FerramentaManutencao;
use Illuminate\Http\Request;

class FerramentaManutencaoController extends Controller
{
    public function index()
    {
        $ferramentas = FerramentaManutencao::all();
        return view('ferramentas_manutencao.index', compact('ferramentas'));
    }

    public function create()
    {
        return view('ferramentas_manutencao.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'quantidade' => 'required|integer|min:0',
        ]);

        FerramentaManutencao::create($validated);

        return redirect()->route('ferramentas-manutencao.index')->with('success', 'Ferramenta criada com sucesso!');
    }

    public function edit(FerramentaManutencao $ferramenta)
    {
        return view('ferramentas_manutencao.edit', compact('ferramenta'));
    }

    public function update(Request $request, FerramentaManutencao $ferramenta)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'quantidade' => 'required|integer|min:0',
        ]);

        $ferramenta->update($validated);

        return redirect()->route('ferramentas-manutencao.index')->with('success', 'Ferramenta atualizada com sucesso!');
    }

    public function destroy(FerramentaManutencao $ferramenta)
    {
        $ferramenta->delete();
        return redirect()->route('ferramentas-manutencao.index')->with('success', 'Ferramenta excluída com sucesso!');
    }
}
