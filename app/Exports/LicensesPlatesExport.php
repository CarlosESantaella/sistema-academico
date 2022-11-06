<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\LicensePlate;
use Maatwebsite\Excel\Concerns\FromCollection;

class LicensesPlatesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($students)
    {
        $this->students = $students;
    }

    public function collection()
    {

        $students_arr = [];
        $students_arr[] = [
            "CODIGO", "RUDE", "CI", "EXP", "PASAPORTE", "AP. PATERNO", "AP. MATERNO", "NOMBRE",
            "APELLIDOS Y NOMBRES", "SEXO", "CORREO", "CORREO INST.", "CELULAR", "PAIS NAC.", 
            "DEP NAC.", "PROV NAC.", "LOC NAC.", "F. NAC", "OFICIALIA", "LIBRO", "PARTIDA",
            "FOLIO", "PROVINCIA", "SECCION", "LOCALIDAD", "ZONA", "CALLE", "NUMERO", "TELEFONO",
            "PERTENECE", "N. SALUD", "TRANSPORTE", "TIEMPO", "ESTADO", "SIE", "NOMBRE NIT",
            "NIT", 

            "CODIGO", "CI", "EXP", "NOMBRE", "AP. PATERNO", "AP.MATERNO", "F. NAC",
            "IDIOMA", "OCUPACION", "G. INSTRUCCION", "CELULAR", "TELEFONO", "EMAIL", "RELACION",

            "CODIGO", "CI", "EXP", "NOMBRE", "AP. PATERNO", "AP.MATERNO", "F. NAC",
            "IDIOMA", "OCUPACION", "G. INSTRUCCION", "CELULAR", "TELEFONO", "EMAIL", "RELACION",

            "CURSO", "TURNO", "NIVEL"

        ];
        $students_arr = collect($students_arr);


        foreach ($this->students as $key => $s) {
            
            $responsible_1 = isset($s->student->responsibles[0]) ? $s->student->responsibles[0]: [];
            $responsible_2 = isset($s->student->responsibles[1]) ? $s->student->responsibles[1]: [];

            $students_arr[] = [
                $s->student->codigo, $s->student->rude, $s->student->ci, $s->student->exp_ci, 
                $s->student->pasaporte, $s->student->appaterno, $s->student->apmaterno,
                $s->student->nombres,  $s->student->appaterno ." ". $s->student->apmaterno ." ". $s->student->nombres,
                $s->student->sexo, $s->student->correo_institucional, $s->correo_institucional, 
                $s->student->celular, $s->student->paisnac, $s->student->depnac, 
                $s->student->provnac, $s->student->locnac, $s->student->fnacimiento, 
                $s->student->oficialia, $s->student->libro, $s->student->partida, 
                $s->student->folia, $s->student->provincia, $s->student->seccion,
                $s->student->localidad, $s->student->zona, $s->student->calle, $s->student->numero, 
                $s->student->telefono, $s->student->pertenece, $s->student->nsalud,
                $s->student->transporte, $s->student->tiempo, $s->student->estado, 
                $s->student->sie, $s->student->fnombre, $s->student->nit,

                isset($responsible_1->codigo) ? $responsible_1->codigo: '', isset($responsible_1->ci) ? $responsible_1->ci: '',
                isset($responsible_1->exp_ci) ? $responsible_1->exp_ci: '', isset($responsible_1->nombres) ? $responsible_1->nombres: '', 
                isset($responsible_1->appaterno) ? $responsible_1->appaterno: '', isset($responsible_1->apmaterno) ? $responsible_1->apmaterno: '', 
                isset($responsible_1->fnacimiento) ? $responsible_1->fnacimiento: '', isset($responsible_1->idiomar) ? $responsible_1->idiomar: '', 
                isset($responsible_1->ocupacion) ? $responsible_1->ocupacion: '', isset($responsible_1->ginstruccion) ? $responsible_1->ginstruccion: '', 
                isset($responsible_1->celular) ? $responsible_1->celular: '', isset($responsible_1->telefono) ? $responsible_1->telefono: '', 
                isset($responsible_1->mail) ? $responsible_1->mail: '', isset($responsible_1->relacion) ? $responsible_1->relacion: '',

                isset($responsible_2->codigo) ? $responsible_2->codigo: '', isset($responsible_2->ci) ? $responsible_2->ci: '',
                isset($responsible_2->exp_ci) ? $responsible_2->exp_ci: '', isset($responsible_2->nombres) ? $responsible_2->nombres: '', 
                isset($responsible_2->appaterno) ? $responsible_2->appaterno: '', isset($responsible_2->apmaterno) ? $responsible_2->apmaterno: '', 
                isset($responsible_2->fnacimiento) ? $responsible_2->fnacimiento: '', isset($responsible_2->idiomar) ? $responsible_2->idiomar: '', 
                isset($responsible_2->ocupacion) ? $responsible_2->ocupacion: '', isset($responsible_2->ginstruccion) ? $responsible_2->ginstruccion: '', 
                isset($responsible_2->celular) ? $responsible_2->celular: '', isset($responsible_2->telefono) ? $responsible_2->telefono: '', 
                isset($responsible_2->mail) ? $responsible_2->mail: '', isset($responsible_2->relacion) ? $responsible_2->relacion: '',

                $s->course->paralelo, $s->course->turno, $s->course->nivel
            ];
        }

        return $students_arr;
    }
}
