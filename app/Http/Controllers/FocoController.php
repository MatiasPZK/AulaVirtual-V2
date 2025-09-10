<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Foco;
use App\Models\Aula;

class FocoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $focos = Foco::with('aula')->get();
        return view('focos.index', compact('focos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aulas = Aula::all();
        return view('focos.create', compact('aulas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero_serie' => 'required|unique:focos,numero_serie',
            'tipo' => 'required|string|max:255',
            'aula_id' => 'required|exists:aulas,id',
            'luminosidad' => 'required|integer|min:0|max:100',
        ]);

        Foco::create($request->all());

        return redirect()->route('focos.index')->with('success', 'Foco agregado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foco = \App\Models\Foco::findOrFail($id); // <-- Traemos el foco a editar
        $aulas = \App\Models\Aula::all();          // <-- Para el select de aulas

        return view('focos.edit', compact('foco', 'aulas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        'numero_serie' => 'required|string|max:255',
        'tipo' => 'required|string|max:255',
        'aula_id' => 'required|exists:aulas,id',
        'luminosidad' => 'nullable|numeric|min:0|max:100',
    ]);

    // Traemos el foco a actualizar
    $foco = \App\Models\Foco::findOrFail($id);

    // Actualizamos los campos
    $foco->update($request->only('numero_serie', 'tipo', 'aula_id', 'luminosidad'));

    // Redirigimos a la lista con mensaje de éxito
    return redirect()->route('focos.index')
                     ->with('success', 'Foco actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foco = \App\Models\Foco::findOrFail($id);
        $foco->delete();

        return redirect()->route('focos.index')
                        ->with('success', 'Foco eliminado correctamente.');
    }
}
