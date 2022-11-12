<?php

namespace App\Http\Controllers;

use App\Models\LicensePlate;
use Illuminate\Http\Request;

class LicensePlateController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'gestion' => 'required',
            'codalumno' => 'required',
            'codcurso' => 'required',
            'codusuario' => 'required'
        ]);

        $lp = LicensePlate::create([
            "gestion" => $request->gestion,
            "codalumno" => $request->codalumno,
            "codcurso" => $request->codcurso,
            "codusuario" => $request->codusuario
        ]);

        return $lp;
    }
}
