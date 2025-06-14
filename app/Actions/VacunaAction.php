<?php

namespace App\Actions;
use App\Models\Vacuna;
use Illuminate\Http\Request;
class VacunaAction
{ public static function executeStore(Request $request): void
    {

        Vacuna::create([
            'id'        => $request->id,
            'nombre' => $request->nombre,
        ]);
    } }