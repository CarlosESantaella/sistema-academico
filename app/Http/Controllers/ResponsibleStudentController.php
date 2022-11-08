<?php

namespace App\Http\Controllers;

use App\Models\ResponsibleStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResponsibleStudentController extends Controller
{
    public function getByResponsibleAndStudent($cod_responsible, $cod_alumno) {
        $ra = ResponsibleStudent::where('codresponsable', '=', $cod_responsible)
            ->where('codalumno', '=', $cod_alumno)->get();
        echo $ra[0];
    }

    public function delete($id) {
        DB::table('ra')->where('id', $id)->delete();
    }
}
