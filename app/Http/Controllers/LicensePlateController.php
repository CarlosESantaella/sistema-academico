<?php

namespace App\Http\Controllers;

use App\Models\LicensePlate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            "finscripcion" => date('Y-m-d h:i:s'),
            "gestion" => $request->gestion,
            "codalumno" => $request->codalumno,
            "codcurso" => $request->codcurso,
            "codusuario" => $request->codusuario
        ]);

        return $lp;
    }

    public function destroy($codigo)
    {
        return DB::table('matricula')->where('codigo', $codigo)->delete();
    }
}
