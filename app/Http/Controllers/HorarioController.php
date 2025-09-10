<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Profesor;
use App\Models\Aula;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::with('profesor', 'aula')->get(); // traer relación con aula también
        $profesores = Profesor::all();
        $aulas = Aula::all(); // importante pasar esto a la vista

        return view('horarios.index', compact('horarios', 'profesores', 'aulas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $profesores = Profesor::all();
        $aulas = Aula::all(); // para seleccionar aula al crear

        return view('horarios.create', compact('profesores', 'aulas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'profesor_id' => 'required|exists:profesores,id',
            'aula_id' => 'required|exists:aulas,id', // validar aula
            'dia' => 'required|string',
            'hora' => 'required|string',
            'materia' => 'nullable|string|max:255',
        ]);

        Horario::create($request->only('profesor_id', 'aula_id', 'dia', 'hora', 'materia'));

        return redirect()->route('horarios.index')
                         ->with('success', 'Horario asignado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $horario = Horario::findOrFail($id);
        $profesores = Profesor::all();
        $aulas = Aula::all(); // para seleccionar aula al editar

        return view('horarios.edit', compact('horario', 'profesores', 'aulas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'profesor_id' => 'required|exists:profesores,id',
            'aula_id' => 'required|exists:aulas,id',
            'dia' => 'required|string',
            'hora' => 'required|string',
            'materia' => 'nullable|string|max:255',
        ]);

        $horario = Horario::findOrFail($id);
        $horario->update($request->only('profesor_id', 'aula_id', 'dia', 'hora', 'materia'));

        return redirect()->route('horarios.index')
                         ->with('success', 'Horario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();

        return redirect()->route('horarios.index')
                         ->with('success', 'Horario eliminado correctamente.');
    }
}
