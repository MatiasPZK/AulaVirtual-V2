<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    // Mostrar listado de aulas
    public function index()
    {
        $aulas = Aula::all();
        return view('aulas.index', compact('aulas'));
    }

    // Mostrar formulario para crear aula
    public function create()
    {
        return view('aulas.create');
    }

    // Guardar nueva aula
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'nullable|integer',
            'profesores' => 'nullable|string',
        ]);

        Aula::create($request->only('nombre','capacidad','profesores'));

        return redirect()->route('aulas.index')->with('success', 'Aula creada correctamente');
    }

    // Mostrar un aula específica (opcional)
    public function show(Aula $aula)
    {
        return view('aulas.show', compact('aula'));
    }

    // Formulario para editar aula
    public function edit(Aula $aula)
    {
        return view('aulas.edit', compact('aula'));
    }

    // Actualizar aula
    public function update(Request $request, Aula $aula)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'nullable|integer',
            'profesores' => 'nullable|string',
        ]);

        $aula->update($request->only('nombre','capacidad','profesores'));

        return redirect()->route('aulas.index')->with('success', 'Aula actualizada correctamente');
    }

    // Eliminar aula
    public function destroy(Aula $aula)
    {
        $aula->delete();
        return redirect()->route('aulas.index')->with('success', 'Aula eliminada correctamente');
    }
}
