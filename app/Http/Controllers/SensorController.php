<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;

class SensorController extends Controller
{
    public function store(Request $request)
    {
        $sensor = new Sensor();
        $sensor->tipo = $request->tipo;
        $sensor->valor = $request->valor;
        $sensor->save();

        return response()->json([
            'message' => 'Dato guardado con éxito',
            'data' => $sensor
        ], 201);
    }
}
