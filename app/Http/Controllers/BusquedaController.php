<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aula;
use App\Models\Profesor;
use App\Models\Objeto;

class BusquedaController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');

        // Buscamos en aulas, profesores y objetos (puedes ajustar)
        $aulas = Aula::where('nombre', 'like', "%$q%")->get();
        $profesores = Profesor::where('nombre', 'like', "%$q%")->get();
        $objetos = Objeto::where('nombre', 'like', "%$q%")->get();

        return view('buscar.index', compact('q', 'aulas', 'profesores', 'objetos'));
    }
}
