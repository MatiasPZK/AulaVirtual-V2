<?php

namespace App\Http\Controllers;

use App\Models\Objeto;
use App\Models\Aula;
use Illuminate\Http\Request;

class ObjetoController extends Controller
{
    public function index()
    {
        $objetos = Objeto::with('aula')->get();
        return view('objetos.index', compact('objetos'));
    }

    public function create()
    {
        $aulas = Aula::all();
        return view('objetos.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        Objeto::create($request->all());

        return redirect()->route('objetos.index')->with('success', 'Objeto creado correctamente');
    }

    public function edit(Objeto $objeto)
    {
        $aulas = Aula::all();
        return view('objetos.edit', compact('objeto','aulas'));
    }

    public function update(Request $request, Objeto $objeto)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tipo' => 'nullable|string|max:255',
            'aula_id' => 'required|exists:aulas,id',
        ]);

        $objeto->update($request->all());

        return redirect()->route('objetos.index')->with('success', 'Objeto actualizado correctamente');
    }

    public function destroy(Objeto $objeto)
    {
        $objeto->delete();
        return redirect()->route('objetos.index')->with('success', 'Objeto eliminado correctamente');
    }

    public function show(Objeto $objeto)
    {
        return view('objetos.show', compact('objeto'));
    }
}
