<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Writer\Xlsx as Writer;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx as Reader;

class LicensesPlatesExport {

    public static function export($students)
    {

        $reader = new Reader();
        $spreadsheet = $reader->load("template-historial-matriculas.xlsx");
        $sheet = $spreadsheet->getActiveSheet();

        $writer = new Writer($spreadsheet);

        header("Content-Disposition: attachment; filename=historial-matriculas.xlsx");

        $students_arr = [];

        foreach ($students as $key => $s) {
            
            $responsible_1 = isset($s->student->responsibles[0]) ? $s->student->responsibles[0]: [];
            $responsible_2 = isset($s->student->responsibles[1]) ? $s->student->responsibles[1]: [];

            $students_arr[] = [
                $s->student->codigo, $s->student->rude, $s->student->ci, $s->student->exp_ci, 
                $s->student->pasaporte, $s->student->appaterno, $s->student->apmaterno,
                $s->student->nombres,  $s->student->appaterno ." ". $s->student->apmaterno ." ". $s->student->nombres,
                $s->student->sexo, $s->student->correo_institucional,
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
        
        $sheet->fromArray($students_arr, NULL, 'A2');

        $writer->save("historial-matriculas.xlsx");
        $content = file_get_contents("historial-matriculas.xlsx");
        exit($content);
    }
}
