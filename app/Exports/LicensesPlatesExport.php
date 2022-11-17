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

        $cursos = [
            "Inicial" => "K",
            "Primario" => "P",
            "Secundaria" => "S"
        ];

        foreach ($students as $key => $s) {
            
            $responsible_1 = isset($s->student->responsibles[0]) ? $s->student->responsibles[0]: [];
            $responsible_2 = isset($s->student->responsibles[1]) ? $s->student->responsibles[1]: [];
            $gnumeral = $s->course->gnumeral;
            if ($gnumeral == "Kinder") $gnumeral = "1"; 
            if ($gnumeral == "Prekinder") $gnumeral = "2"; 
            if ($gnumeral == " Prekinder") $gnumeral = "2"; 
            $curso_procesado = $cursos[$s->course->nivel] . str_replace("°", "", $gnumeral).$s->course->paralelo;
            $students_arr[] = [
                $s->student->codigo, $s->student->rude, $s->student->ci, explode(" ", $s->student->exp_ci)[0], 
                $s->student->pasaporte, $s->student->appaterno, $s->student->apmaterno,
                $s->student->nombres,  $s->student->appaterno ." ". $s->student->apmaterno ." ". $s->student->nombres,
                $s->student->sexo, $s->student->correo_institucional,
                $s->student->celular, $s->student->paisnac, $s->student->depnac, 
                $s->student->provnac, $s->student->locnac, $s->student->fnacimiento, 
                $s->student->oficialia, $s->student->libro, $s->student->partida, 
                $s->student->folio, $s->student->provincia, $s->student->seccion,
                $s->student->localidad, $s->student->zona, $s->student->calle, $s->student->numero, 
                $s->student->telefono, $s->student->pertenece, $s->student->nsalud,
                $s->student->transporte, $s->student->tiempo, $s->student->estado, 
                $s->student->sie, $s->student->fnombre, $s->student->nit,

                isset($responsible_1->codigo) ? $responsible_1->codigo: '', isset($responsible_1->ci) ? $responsible_1->ci: '',
                isset($responsible_1->exp_ci) ? explode(" ", $responsible_1->exp_ci)[0]: '', isset($responsible_1->nombres) ? $responsible_1->nombres: '', 
                isset($responsible_1->appaterno) ? $responsible_1->appaterno: '', isset($responsible_1->apmaterno) ? $responsible_1->apmaterno: '', 
                isset($responsible_1->fnacimiento) ? $responsible_1->fnacimiento: '', isset($responsible_1->idioma) ? $responsible_1->idioma: '', 
                isset($responsible_1->ocupacion) ? $responsible_1->ocupacion: '', isset($responsible_1->ginstruccion) ? $responsible_1->ginstruccion: '', 
                isset($responsible_1->celular) ? $responsible_1->celular: '', isset($responsible_1->telefono) ? $responsible_1->telefono: '', 
                isset($responsible_1->mail) ? $responsible_1->mail: '', isset($responsible_1->relacion) ? $responsible_1->relacion: '',

                isset($responsible_2->codigo) ? $responsible_2->codigo: '', isset($responsible_2->ci) ? $responsible_2->ci: '',
                isset($responsible_2->exp_ci) ? explode(" ", $responsible_2->exp_ci)[0]: '', isset($responsible_2->nombres) ? $responsible_2->nombres: '', 
                isset($responsible_2->appaterno) ? $responsible_2->appaterno: '', isset($responsible_2->apmaterno) ? $responsible_2->apmaterno: '', 
                isset($responsible_2->fnacimiento) ? $responsible_2->fnacimiento: '', isset($responsible_2->idioma) ? $responsible_2->idioma: '', 
                isset($responsible_2->ocupacion) ? $responsible_2->ocupacion: '', isset($responsible_2->ginstruccion) ? $responsible_2->ginstruccion: '', 
                isset($responsible_2->celular) ? $responsible_2->celular: '', isset($responsible_2->telefono) ? $responsible_2->telefono: '', 
                isset($responsible_2->mail) ? $responsible_2->mail: '', isset($responsible_2->relacion) ? $responsible_2->relacion: '',

                $curso_procesado, $s->course->turno, $s->course->nivel
            ];
        }
        
        $sheet->fromArray($students_arr, NULL, 'A2');

        $writer->save("historial-matriculas.xlsx");
        $content = file_get_contents("historial-matriculas.xlsx");
        exit($content);
    }


    public static function exportPreRegistrations($students)
    {

        $reader = new Reader();
        $spreadsheet = $reader->load("template-historial-matriculas.xlsx");
        $sheet = $spreadsheet->getActiveSheet();

        $writer = new Writer($spreadsheet);

        header("Content-Disposition: attachment; filename=pre-inscripciones.xlsx");

        $students_arr = [];

        $cursos = [
            "Inicial" => "K",
            "Primario" => "P",
            "Secundaria" => "S"
        ];

        foreach ($students as $student) {
            $last_lp = $student->licenses_plates()->latest()->first();
                        
            if($last_lp){
                $course = $last_lp->course()->first();
                
                $gnumeral = match($course->gnumeral){
                    "Kinder" => '1',
                    "Prekinder" => '2',
                    " Prekinder" => '2',
                    default => $course->gnumeral
                };
                
                $curso_procesado = $cursos[$course->nivel] . str_replace("°", "", $gnumeral).$course->paralelo;
                $nivel = $course->nivel;
                $turno = $course->turno;
            }else{
                $curso_procesado = '';
                $nivel = '';
                $turno = '';

            }
            $responsibles = $student->responsibles()->get();
            $responsible_1 = isset($responsibles[0]) ? $responsibles[0]: [];
            $responsible_2 = isset($responsibles[1]) ? $responsibles[1]: [];
            // $gnumeral = $course->gnumeral;
            // if ($gnumeral == "Kinder") $gnumeral = "1"; 
            // if ($gnumeral == "Prekinder") $gnumeral = "2"; 
            // if ($gnumeral == " Prekinder") $gnumeral = "2"; 
            // $curso_procesado = $cursos[$course->nivel] . str_replace("°", "", $gnumeral).$course->paralelo;
            $students_arr[] = [
                $student->codigo, $student->rude, $student->ci, explode(" ", $student->exp_ci)[0], 
                $student->pasaporte, $student->appaterno, $student->apmaterno,
                $student->nombres,  $student->appaterno ." ". $student->apmaterno ." ". $student->nombres,
                $student->sexo, $student->correo_institucional,
                $student->celular, $student->paisnac, $student->depnac, 
                $student->provnac, $student->locnac, $student->fnacimiento, 
                $student->oficialia, $student->libro, $student->partida, 
                $student->folio, $student->provincia, $student->seccion,
                $student->localidad, $student->zona, $student->calle, $student->numero, 
                $student->telefono, $student->pertenece, $student->nsalud,
                $student->transporte, $student->tiempo, $student->estado, 
                $student->sie, $student->fnombre, $student->nit,

                isset($responsible_1->codigo) ? $responsible_1->codigo: '', isset($responsible_1->ci) ? $responsible_1->ci: '',
                isset($responsible_1->exp_ci) ? explode(" ", $responsible_1->exp_ci)[0]: '', isset($responsible_1->nombres) ? $responsible_1->nombres: '', 
                isset($responsible_1->appaterno) ? $responsible_1->appaterno: '', isset($responsible_1->apmaterno) ? $responsible_1->apmaterno: '', 
                isset($responsible_1->fnacimiento) ? $responsible_1->fnacimiento: '', isset($responsible_1->idioma) ? $responsible_1->idioma: '', 
                isset($responsible_1->ocupacion) ? $responsible_1->ocupacion: '', isset($responsible_1->ginstruccion) ? $responsible_1->ginstruccion: '', 
                isset($responsible_1->celular) ? $responsible_1->celular: '', isset($responsible_1->telefono) ? $responsible_1->telefono: '', 
                isset($responsible_1->mail) ? $responsible_1->mail: '', isset($responsible_1->relacion) ? $responsible_1->relacion: '',

                isset($responsible_2->codigo) ? $responsible_2->codigo: '', isset($responsible_2->ci) ? $responsible_2->ci: '',
                isset($responsible_2->exp_ci) ? explode(" ", $responsible_2->exp_ci)[0]: '', isset($responsible_2->nombres) ? $responsible_2->nombres: '', 
                isset($responsible_2->appaterno) ? $responsible_2->appaterno: '', isset($responsible_2->apmaterno) ? $responsible_2->apmaterno: '', 
                isset($responsible_2->fnacimiento) ? $responsible_2->fnacimiento: '', isset($responsible_2->idioma) ? $responsible_2->idioma: '', 
                isset($responsible_2->ocupacion) ? $responsible_2->ocupacion: '', isset($responsible_2->ginstruccion) ? $responsible_2->ginstruccion: '', 
                isset($responsible_2->celular) ? $responsible_2->celular: '', isset($responsible_2->telefono) ? $responsible_2->telefono: '', 
                isset($responsible_2->mail) ? $responsible_2->mail: '', isset($responsible_2->relacion) ? $responsible_2->relacion: '',

                $curso_procesado, $turno, $nivel
            ];
        }
        
        $sheet->fromArray($students_arr, NULL, 'A2');

        $writer->save("pre-inscripciones.xlsx");
        $content = file_get_contents("pre-inscripciones.xlsx");
        exit($content);
    }
}
