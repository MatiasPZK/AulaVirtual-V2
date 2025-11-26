<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aula;
use App\Models\Profesor;

class AulaController extends Controller
{
    // Mostrar formulario para crear aula
    public function create()
    {
        $profesores = Profesor::all();
        return view('aulas.create', compact('profesores'));
    }

    // Guardar nueva aula
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'nullable|integer',
            'profesor_id' => 'nullable|exists:profesores,id',
        ]);

        // Crear aula
        $aula = Aula::create([
            'nombre' => $data['nombre'],
            'capacidad' => $data['capacidad'] ?? null,
        ]);

        // Si se pasó profesor_id, asignarlo (guardamos aula_id en la tabla profesores)
        if (!empty($data['profesor_id'])) {
            $profesor = Profesor::find($data['profesor_id']);
            // Si ese profesor ya tenía otra aula, opcionalmente la sobrescribimos
            $profesor->aula_id = $aula->id;
            $profesor->save();
        }

        return redirect()->route('aulas.index')->with('success', 'Aula creada correctamente.');
    }

    // Editar aula (route-model binding)
    public function edit(Aula $aula)
    {
        // traer todos los profesores para el select
        $profesores = Profesor::all();
        return view('aulas.edit', compact('aula', 'profesores'));
    }

    // Actualizar aula (route-model binding)
    public function update(Request $request, Aula $aula)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'nullable|integer',
            'profesor_id' => 'nullable|exists:profesores,id',
        ]);

        // Actualizar datos del aula
        $aula->update([
            'nombre' => $data['nombre'],
            'capacidad' => $data['capacidad'] ?? null,
        ]);

        // --- Lógica para asignar/desasignar profesor ---
        // 1) Si se envió un profesor_id
        if (!empty($data['profesor_id'])) {
            $nuevo = Profesor::find($data['profesor_id']);

            // 2) Si otro profesor ya está asignado a esta aula y no es el mismo, lo desasignamos
            $actual = Profesor::where('aula_id', $aula->id)->first();
            if ($actual && $actual->id !== $nuevo->id) {
                $actual->aula_id = null;
                $actual->save();
            }

            // 3) Asignamos la aula al nuevo profesor
            $nuevo->aula_id = $aula->id;
            $nuevo->save();

        } else {
            // Si se envió vacío (se quiere quitar la asignación), desasignamos cualquier profesor que tuviera esta aula
            $actual = Profesor::where('aula_id', $aula->id)->first();
            if ($actual) {
                $actual->aula_id = null;
                $actual->save();
            }
        }

        return redirect()->route('aulas.index')->with('success', 'Aula actualizada correctamente.');
    }

    // Mostrar listado (ejemplo)
    public function index()
    {
        $aulas = Aula::with('profesor')->get();
        return view('aulas.index', compact('aulas'));
    }

    // Eliminar (opcional)
    public function destroy(Aula $aula)
    {
        // Antes de eliminar, desasignar profesores que referencian esta aula
        Profesor::where('aula_id', $aula->id)->update(['aula_id' => null]);

        $aula->delete();
        return redirect()->route('aulas.index')->with('success', 'Aula eliminada correctamente.');
    }
}
