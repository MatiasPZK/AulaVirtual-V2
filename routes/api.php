<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Foco;
use App\Models\Cortina;
use App\Models\Aire;

Route::post('/sensores', [SensorController::class, 'store']);

Route::get('/config', function () {
    return response()->json([
        "wifi_ssid" => "Wokwi-GUEST",
        "wifi_password" => "",
        "modo" => "automatico",
        "estado" => "cerrada"
    ]);
});

// ✅ Estado de usuario (si se necesita)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// ---------- FOCOS ----------
Route::get('/focos/{id}', function ($id) {
    $foco = Foco::findOrFail($id);
    return response()->json($foco);
});

Route::post('/focos/{id}', function (Request $request, $id) {
    $foco = Foco::findOrFail($id);
    $foco->estado = $request->input('estado', $foco->estado);
    $foco->luminosidad = $request->input('luminosidad', $foco->luminosidad);
    $foco->save();

    return response()->json(['success' => true, 'foco' => $foco]);
});

// ---------- CORTINAS ----------
Route::get('/cortinas/{id}', function ($id) {
    $cortina = Cortina::findOrFail($id);
    return response()->json($cortina);
});

Route::post('/cortinas/{id}', function (Request $request, $id) {
    $cortina = Cortina::findOrFail($id);
    $cortina->estado = $request->input('estado', $cortina->estado); // ej: "abierta" / "cerrada"
    $cortina->save();

    return response()->json(['success' => true, 'cortina' => $cortina]);
});

// ---------- AIRE ACONDICIONADO ----------
Route::get('/aires/{id}', function ($id) {
    $aire = Aire::findOrFail($id);
    return response()->json($aire);
});

Route::post('/aires/{id}', function (Request $request, $id) {
    $aire = Aire::findOrFail($id);
    $aire->estado = $request->input('estado', $aire->estado); // encendido / apagado
    $aire->temperatura = $request->input('temperatura', $aire->temperatura);
    $aire->save();

    return response()->json(['success' => true, 'aire' => $aire]);
});
