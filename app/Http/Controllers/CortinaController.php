<?php

namespace App\Http\Controllers;

use App\Models\Cortina;
use App\Models\Aula;
use Illuminate\Http\Request;

class CortinaController extends Controller
{
    // ------------------- WEB -------------------
    public function index()
    {
        $cortinas = Cortina::with('aula')->get();
        return view('cortinas.index', compact('cortinas'));
    }

    public function create()
    {
        $aulas = Aula::all();
        return view('cortinas.create', compact('aulas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'aula_id' => 'required|exists:aulas,id',
            'hora_apertura' => 'nullable',
            'hora_cierre' => 'nullable',
            'dias' => 'nullable|array',
            'estado' => 'boolean',
            'automatica' => 'boolean',
        ]);

        Cortina::create($request->all());

        return redirect()->route('cortinas.index')->with('success', 'Cortina creada correctamente');
    }

    public function edit(Cortina $cortina)
    {
        $aulas = Aula::all();
        return view('cortinas.edit', compact('cortina', 'aulas'));
    }

    public function update(Request $request, Cortina $cortina)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'aula_id' => 'required|exists:aulas,id',
            'hora_apertura' => 'nullable',
            'hora_cierre' => 'nullable',
            'dias' => 'nullable|array',
            'estado' => 'boolean',
            'automatica' => 'boolean',
        ]);

        $cortina->update($request->all());

        return redirect()->route('cortinas.index')->with('success', 'Cortina actualizada correctamente');
    }

    public function destroy(Cortina $cortina)
    {
        $cortina->delete();
        return redirect()->route('cortinas.index')->with('success', 'Cortina eliminada correctamente');
    }

    // ------------------- API -------------------
    // GET -> el ESP32 consulta estado
    public function apiShow(Cortina $cortina)
    {
        return response()->json([
            'id' => $cortina->id,
            'estado' => $cortina->estado ? 'abierta' : 'cerrada',
            'automatica' => (bool) $cortina->automatica,
            'hora_apertura' => $cortina->hora_apertura,
            'hora_cierre' => $cortina->hora_cierre,
            'aula' => $cortina->aula->nombre ?? null,
        ]);
    }

    // POST/PUT -> el ESP32 actualiza estado
    public function apiUpdate(Request $request, Cortina $cortina)
    {
        $request->validate([
            'estado' => 'required|string|in:abierta,cerrada',
            'temperatura' => 'nullable|numeric',
            'luz' => 'nullable|numeric',
        ]);

        // Guardar estado en BD
        $cortina->estado = $request->estado === 'abierta';
        $cortina->save();

        return response()->json([
            'message' => 'Estado actualizado',
            'estado' => $request->estado,
            'temperatura' => $request->temperatura,
            'luz' => $request->luz,
        ]);
    }
}
