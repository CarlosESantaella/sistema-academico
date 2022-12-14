<?php

namespace App\Http\Controllers;

use DateTime;

use App\Models\User;
use App\Models\Course;
use App\Models\Student;
use App\Models\LicensePlate;
use Illuminate\Http\Request;
use App\Exports\ExportExcels;
use App\Models\PreRegistration;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class AdminController extends Controller
{
    public function pruebas()
    {
        // $students = Student::whereHas('licenses_plates', function (Builder $query){
        //     $query->whereYear('finscripcion', date('Y'));
        // })->get();

        // foreach($students as $student)
        // {
        //     $student->estado = -1;
        //     $student->save();
        // }

        // $preRegistrations = PreRegistration::all();

        // foreach($preRegistrations as $preRegistration){
        //     $preRegistration->delete();
        // }

        $users = User::all();

        foreach($users as $user){
            $username_a = explode(' ', $user->nombres);
            $first_letter_names = '';

            foreach($username_a as $letter){
                $letter_a = str_split($letter, 1);
                $first_letter_names .= $letter_a[0];
            }
            
            $username = $first_letter_names.str_replace(" ", "", $user->appaterno);

            $user->usuario = $username;
            $user->save();
        }
        
        die();
    }

    public function index() {
        return view('admins.index');
    }

    public function getLicencePlatesByFilter(Request $request, $year=false) 
    {
        $year = $request->gestion ? $request->gestion : $year;
        $startDate = $request->startDate ?? false;
        $endDate = $request->endDate ?? false;
        $curso = $request->curso ?? false;
        $curso_parse = [];
        if ($curso) {
            $curso_parse = explode(" ", $curso);
        }
        $nivel = $request->nivel ?? false;
        $turno = $request->turno ?? false;
        $search_by = $request->search_by ?? false;
        $search_value = $request->search_value ?? false;
        $students = LicensePlate::with([
            "course",
            "student",
            "student.responsibles"
        ])->when(
            $startDate,
            function ($query) use ($startDate) {
                return $query->where('finscripcion', '>=', $startDate);
            }
        )->when(
            $endDate,
            function ($query) use ($endDate) {
                return $query->where('finscripcion', '<=', $endDate);
            }
        )->when(
            !$startDate && $year,
            function ($query) use ($year) {
                return $query->whereYear('finscripcion', $year);
            }
        )->get();
        // $students = $students->where('student.estado', 1);

        $results = [];

        // Filter
        foreach ($students as $key => $student) {
            if ($curso) {
                if ($student->course->gnumeral != $curso_parse[0] || 
                    $student->course->paralelo != $curso_parse[1]) {
                        continue;
                }
            }
            if ($nivel) {
                if ($student->course->nivel != $nivel) continue;
            }
            if ($turno) {
                if ($student->course->turno != $turno) continue;
            }
            if ($search_by && $search_value) {
                if ($student->student->$search_by != $search_value) continue;
            }
            $results[] = $student;
        }

        return $results;
    }
    public function getPreRegistrationsByFilter(Request $request, $year=false) 
    {
        $year = $request->gestion ? $request->gestion : $year;
        $startDate = $request->startDate ?? false;
        $endDate = $request->endDate ?? false;
        
        $curso = $request->curso ?? false;
        $curso_parse = [];
        if ($curso) {
            $curso_parse = explode(" ", $curso);
        }
        $nivel = $request->nivel ?? false;
        $turno = $request->turno ?? false;
        $search = $request->search ?? false;
        $search_value = $request->search_value ?? false;
        // die(now()->year(date('Y')));

        // $students = Student::whereHas('pre_registrations', function (Builder $query){
        //     $query->whereYear('created_at', date('Y'));
        // })

        $students = PreRegistration::with('student')
                                        // ->where('codigo', )
        // ,'student.licenses_plates' => function($query) use ($search){
        //     if(trim($search) != ''){
        //         return $query->whereYear('finscripcion', date('Y'));
                
        //     }else{
        //         return $query->whereYear('finscripcion', date('Y'));

        //     }

        // }
        // ,'student.licenses_plates.course' => function($query) use ($search){
        //     if(trim($search) != ''){
        //         return $query->where('nivel', 'like', "%{$search}%");
                
        //     }
        // }
        // ])
        ->get();

        if(trim($search) != ''){
            // $students = DB::table('preinscripciones')
            //                 ->join('alumno', 'preinscripciones.fk_alumno', '=', 'alumno.codigo')
            //                 ->join('matricula', 'matricula.codalumno', '=', 'alumno.codigo')
            //                 ->join('curso', 'curso.codigo', '=', 'matricula.codcurso')
            //                 // ->whereYear('matricula.finscripcion', date('Y'))
            //                 ->whereYear('preinscripciones.created_at', date('Y'))
            //                 // ->where('matricula.gestion', '2022')
            //                 ->where(function($query) use ($search){
            //                     $query->where('alumno.codigo', 'like', "%{$search}%")
            //                     ->orWhere('alumno.nombres', 'like', "%{$search}%")
            //                     ->orWhere('alumno.appaterno', 'like', "%{$search}%")
            //                     ->orWhere('alumno.apmaterno', 'like', "%{$search}%")
            //                     ->orWhere('alumno.sexo', 'like', "%{$search}%")
            //                     ->orWhere('curso.nivel', 'like', "%{$search}%");
            //                 })
            //                 // ->select('usu.nombres as usu.usu_nombres')
            //                 ->get();
            $students = PreRegistration::whereYear('created_at', date('Y'))
            ->with(['student', 'student.licenses_plates' => function($query){
                    $query->whereYear('finscripcion', date('Y'));
                }, 'student.licenses_plates.course'])
            ->get();
            // ->withWhereHas('student', function($query) use ($search){
                
            //     $query->where(function($query) use ($search){
            //         $query->where('nombres', 'like', "%{$search}%")
            //             ->orWhere('appaterno', 'like', "%{$search}%")
            //             ->orWhere('apmaterno', 'like', "%{$search}%")
            //             ->orWhere('codigo', 'like', "%{$search}%")
            //             ->orWhere('sexo', 'like', "%{$search}%");
            //     })
            //     ->orWhere(function($query) use ($search){
                    
            //         $query->whereHas('licenses_plates', function($query) use ($search){
            //             $query->whereHas('course', function($query) use ($search){
            //                     $query->where('nivel', 'like', "%{$search}%");

            //                 });
            //         });
            //     })    
            //     ->where(function($query) use ($search){
                    
            //         $query->whereHas('licenses_plates', function($query) use ($search){
            //             $query->whereYear('finscripcion', date('Y'));
            //         });
            //     });    
            // })->with(['student.licenses_plates' => function($query){
            //     $query->whereYear('finscripcion', date('Y'));
            // }
            // , 'student.licenses_plates.course'])
            // ->get();

        }else{
            // $students = PreRegistration::withWhereHas('student', function($query){
            //     $query->with([
            //                     'licenses_plates' => function($query){
            //                         $query->whereYear('finscripcion', date('Y'));
            //                     }
            //                     , 'licenses_plates.course'
            //                 ]);
            // })
            $students = PreRegistration::whereYear('created_at', date('Y'))
            ->with(['student', 'student.licenses_plates' => function($query){
                    $query->whereYear('finscripcion', date('Y'));
                }, 'student.licenses_plates.course'])
            ->get();
        }

        
        // $students = $students->where('student', '<>', null);
            



        // $results = [];

        // // Filter
        // foreach ($students as $student) {
            
        //     $results[] = $student;
        // }


        return $students;
    }

    public function viewLicencePlates(Request $request) 
    {
        $year = date('Y', strtotime(date('Y')));
        $students = $this->getLicencePlatesByFilter($request, $year);
        return view('admins.licenses-plates', [
            'students' => $students, 'startDate' => $request->startDate, 
            'endDate' => $request->endDate, 'curso' => $request->curso,
            'nivel' => $request->nivel, 'turno' => $request->turno
        ]);
    }

    public function exportLicensePlates(Request $request) 
    {
        $year = date('Y', strtotime(date('Y')));
        $students = $this->getLicencePlatesByFilter($request, $year);
        return ExportExcels::export($students);
    }

    public function exportPreRegistrations(Request $request) 
    {
        $year = date('Y', strtotime(date('Y')));
        $students = $this->getPreRegistrationsByFilter($request, $year);

        return ExportExcels::exportPreRegistrations($students);
    }
    public function exportSubjectsProfessor(Request $request) 
    {
        if($request->professorId == 0){
            echo "<script languaje='javascript' type='text/javascript'>window.close();</script>";
            die();
        }else{
            return ExportExcels::exportarMateriasProfesor($request->professorId);
        }

    }

    public function searchStudents(Request $request)
    {
        $students = Student::all();
        return view('admins.search-students', [
            "students" => $students, "search_by" => $request->search_by, 
            "search_value" => $request->search_value, "gestion" => $request->gestion
        ]);
    }

    public function createStudent()
    {
        
        return view('admins.create-student');
    }

    public function preregistrations(Request $request)
    {
        $year = date('Y', strtotime(date('Y')));
        $students = $this->getPreRegistrationsByFilter($request, $year);
        // $students = Student::all();
        
        return view('admins.preregistrations', [
            'students' => $students
        ]);
    }

    public function registration(Request $request)
    {
        
        
        return view('admins.registration');
    }

    public function users()
    {

        // die('hola mundo');
        return view('admins.users');
    }

    public function storeUser(Request $request)
    {
        // if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalName();
            dd($filename);
        // }
        // dd("doesn't work");
    }

    public function viewUploadCerts()
    {


        return view('admins.upload-certs');
    }

    public function uploadCerts(Request $request)
    {
        $files = $request->file('files');

        foreach($files as $file){
            $name = $file->getClientOriginalName();
            $file->storeAs(
                'public/students/certs',
                $name
            );
        }

        return redirect()->back()->with('message', 'Certificados subidos correctamente');

    }

    public function subjects()
    {


        return view('admins.subjects');
    }


}
