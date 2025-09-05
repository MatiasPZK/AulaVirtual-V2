<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function index()
    {
        $profesores = Profesor::all();
        return view('profesores.index', compact('profesores'));
    }

    public function create()
    {
        return view('profesores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'nullable|string|max:255',
        ]);

        Profesor::create($request->only('nombre','especialidad'));

        return redirect()->route('profesores.index')->with('success', 'Profesor creado correctamente');
    }

    public function edit(Profesor $profesor)
    {
        return view('profesores.edit', compact('profesor'));
    }

    public function update(Request $request, Profesor $profesor)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'nullable|string|max:255',
        ]);

        $profesor->update($request->only('nombre','especialidad'));

        return redirect()->route('profesores.index')->with('success', 'Profesor actualizado correctamente');
    }

    public function destroy(Profesor $profesor)
    {
        $profesor->delete();
        return redirect()->route('profesores.index')->with('success', 'Profesor eliminado correctamente');
    }

    public function show(Profesor $profesor)
    {
        return view('profesores.show', compact('profesor'));
    }
}
