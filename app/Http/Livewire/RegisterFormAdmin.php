<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Carbon\Factory;
use App\Models\Course;
use App\Models\Student;
use Livewire\Component;
use Carbon\CarbonImmutable;
use App\Models\LicensePlate;
use App\Exports\ExportExcels;
use Illuminate\Support\Facades\Log;

class RegisterFormAdmin extends Component
{
    public $codigo;
    public $nombreCompleto;
    public $matriculas = [];
    public $ultimoAnoMatricula;
    public $ultimaMatricula;
    public $cursos = [];
    public $codigoSiguienteCurso;
    public $curso;
    public $flagRegister = false;
    public $filtroTurno = 'manana';
    public $matriculasPorTurno;
    public $counterMPT;
    public $matriculaAEliminar = 0;
    public $fecha;

    protected $listeners = ['cambiarTurno', 'searchStudent', 'eliminarMatricula'];


    public function mount($student = false)
    {
        if($student != false){
            $this->codigo = $student;
            $this->matriculaAEliminar = 0;

            $codigoActual = '';
            $codigoAux = '';
            $cursoActual = '';
            $cursoAux = '';
            $flagSearch = true;
            $student = Student::where('codigo', $this->codigo)->first();

            if($student){

                $this->nombreCompleto = $student->nombres.' '.$student->appaterno.' '.$student->apmaterno;
                // $this->matriculas = LicensePlate::where('codalumno', $student->codigo)->whereYear('finscripcion', date('Y'))->orderBy('finscripcion', 'desc')->get();
                $matriculas = LicensePlate::where('codalumno', $student->codigo)->orderBy('finscripcion', 'desc')->get();
                if($matriculas->first()){

                    $this->matriculas = $matriculas;
                }else{
                    $this->matriculas = [];
                }
                // $this->cursos = $this->matriculas;
        
                $this->ultimoAnoMatricula = LicensePlate::where('codalumno', $student->codigo)?->orderBy('finscripcion', 'desc')->first()?->finscripcion?->format('Y') ?? '';
        
                $ultimaMatricula = LicensePlate::where('codalumno', $student->codigo)?->orderBy('finscripcion', 'desc')->first();
        
                if($ultimaMatricula){
                    $this->ultimaMatricula = $ultimaMatricula;
                    $cursoActual = Course::find($this->ultimaMatricula->codcurso);
        
        
                    
        
                    if($cursoActual->nivel == 'Secundaria' && $cursoActual->grado == 'Sexto'){
                        $this->curso = $this->ultimaMatricula->codcurso;
                        $this->flagRegister = true;
                        
                    }else{
                        $cursoAux = Course::where([
                            ['nivel', '=', $cursoActual->nivel],
                            ['grado', '=', $cursoActual->grado],
                            ['paralelo', '=', $cursoActual->paralelo],
                            ['turno', '=', 'Mañana'],
                        ])->first();
                        
                        $cursoActual = $cursoAux;
                        $codigoAux = $cursoAux->codigo;
                        
                        while($flagSearch){
                            $codigoAux++;
                            $cursoAux = Course::find($codigoAux);
        
                            // if($cursoActual->gnumeral != $cursoAux->gnumeral && $cursoActual->paralelo == $cursoAux->paralelo){
                            if($cursoActual->gnumeral != $cursoAux->gnumeral){
                                $flagSearch = false;
                            }
                        }
                        // $this->codigoSiguienteCurso = $codigoAux;
                        if($this->ultimoAnoMatricula == date('Y')){
                            $this->flagRegister = false;
                            $this->curso = $this->ultimaMatricula->codcurso;
                        }else{
                            $this->flagRegister = true;
                            $this->curso = $codigoAux;
                        }
        
                    }
                }else{
                    $this->curso = Course::all()->first()->codigo;
                    $this->ultimoAnoMatricula = '';
                    $this->matriculas = [];
                    $this->ultimaMatricula = '';
                    $this->flagRegister = true;
                }
        
                $this->cursos = Course::all();
            }
            
        }
        $this->cursos = Course::all();
        $this->matriculasPorTurno = LicensePlate::with([
            'course' => function($query){
                $query->where('turno', '=', 'Mañana');
            }, 
            'student'
        ])
        ->whereDate('finscripcion', date('Y-m-d'))
        ->get() ?? [];
        $this->counterMPT = 0;
        

        Carbon::setLocale('es_BO');
        $current = Carbon::now()->locale('es_BO');
        $this->fecha = $current->isoFormat('LL');
        // die($this->matriculasPorTurno);
    }
    
    public function searchStudent()
    {
        $this->matriculaAEliminar = 0;

        $codigoActual = '';
        $codigoAux = '';
        $cursoActual = '';
        $cursoAux = '';
        $flagSearch = true;
        $student = Student::where('codigo', $this->codigo)->first();

        if($student){

            $this->nombreCompleto = $student->nombres.' '.$student->appaterno.' '.$student->apmaterno;
            // $this->matriculas = LicensePlate::where('codalumno', $student->codigo)->whereYear('finscripcion', date('Y'))->orderBy('finscripcion', 'desc')->get();
            $matriculas = LicensePlate::where('codalumno', $student->codigo)->orderBy('finscripcion', 'desc')->get();
            if($matriculas->first()){

                $this->matriculas = $matriculas;
            }else{
                $this->matriculas = [];
            }
            // $this->cursos = $this->matriculas;
    
            $this->ultimoAnoMatricula = LicensePlate::where('codalumno', $student->codigo)?->orderBy('finscripcion', 'desc')->first()?->finscripcion?->format('Y') ?? '';
    
            $ultimaMatricula = LicensePlate::where('codalumno', $student->codigo)?->orderBy('finscripcion', 'desc')->first();
    
            if($ultimaMatricula){
                $this->ultimaMatricula = $ultimaMatricula;
                $cursoActual = Course::find($this->ultimaMatricula->codcurso);
    
      
                
    
                if($cursoActual->nivel == 'Secundaria' && $cursoActual->grado == 'Sexto'){
                    $this->curso = $this->ultimaMatricula->codcurso;
                    $this->flagRegister = true;
                    
                }else{
                    $cursoAux = Course::where([
                        ['nivel', '=', $cursoActual->nivel],
                        ['grado', '=', $cursoActual->grado],
                        ['paralelo', '=', $cursoActual->paralelo],
                        ['turno', '=', 'Mañana'],
                    ])->first();
                    
                    $cursoActual = $cursoAux;
                    $codigoAux = $cursoAux->codigo;
                    
                    while($flagSearch){
                        $codigoAux++;
                        $cursoAux = Course::find($codigoAux);
    
                        // if($cursoActual->gnumeral != $cursoAux->gnumeral && $cursoActual->paralelo == $cursoAux->paralelo){
                        if($cursoActual->gnumeral != $cursoAux->gnumeral){
                            $flagSearch = false;
                        }
                    }
                    // $this->codigoSiguienteCurso = $codigoAux;
                    if($this->ultimoAnoMatricula == date('Y')){
                        $this->flagRegister = false;
                        $this->curso = $this->ultimaMatricula->codcurso;
                    }else{
                        $this->flagRegister = true;
                        $this->curso = $codigoAux;
                    }
    
                }
            }else{
                $this->curso = Course::all()->first()->codigo;
                $this->ultimoAnoMatricula = '';
                $this->matriculas = [];
                $this->ultimaMatricula = '';
                $this->flagRegister = true;
            }
    
            $this->cursos = Course::all();
        }


        
    }

    public function crearMatricula()
    {
        $student = Student::find($this->codigo);

        if($student){

            $curso = Course::find($this->curso);
            // $responsable1 = $curso->responsable ?? NULL;
            
            $register = LicensePlate::create([
                'codigo' => NULL,
                'finscripcion' => date('Y-m-d H:i:s'),
                'gestion' => date('Y'),
                'codalumno' => $this->codigo,
                'codcurso' => $this->curso,
                'codusuario' => auth()->user()->codigo
            ]);
            $this->flagRegister = false;

            $this->ultimoAnoMatricula = $register->finscripcion->format('Y');
            
            $matriculas = LicensePlate::where('codalumno', $student->codigo)->orderBy('finscripcion', 'desc')->get();

            if($matriculas->first()){
                $this->matriculas = LicensePlate::where('codalumno', $student->codigo)->orderBy('finscripcion', 'desc')->get();
            }else{
                $this->matriculas = [];
            }

            $student = Student::find($this->codigo);

            $student->estado = -1;

            $student->save();



            $this->cursos = Course::all();
            
        }else{
            session()->flash('messageCreateRegisterError', 'Código de estudiante incorrecto.');
        }
    }
    
    public function cambiarTurno()
    {
        $this->matriculasPorTurno = [];
        $this->counterMPT = 0;
        if($this->filtroTurno == 'manana'){
            $this->matriculasPorTurno = LicensePlate::with([
                'course' => function($query){
                    $query->where('turno', '=', 'Mañana');
                }, 
                'student'
            ])
            ->whereDate('finscripcion', date('Y-m-d'))
            ->get() ?? [];
        }else if($this->filtroTurno == 'tarde'){
            $this->matriculasPorTurno = LicensePlate::with([
                'course' => function($query){
                    $query->where('turno', '=', 'Tarde');
                }, 
                'student'
            ])
            ->whereDate('finscripcion', date('Y-m-d'))
            ->get() ?? [];
        }else if($this->filtroTurno == 'noche'){
            $this->matriculasPorTurno = LicensePlate::with([
                'course' => function($query){
                    $query->where('turno', '=', 'Noche');
                }, 
                'student'
            ])
            ->whereDate('finscripcion', date('Y-m-d'))
            ->get() ?? [];
        }

    }

    public function seleccionarMatricula($codigoMatricula)
    {
        if($codigoMatricula != 0){
            if($this->matriculaAEliminar == 0){
                $this->matriculaAEliminar = $codigoMatricula;
            }else{
                $this->matriculaAEliminar = 0;
            }
        }
    }

    public function eliminarMatricula($matriculaId = 0)
    {
        if($matriculaId == 0){

        }else{
            $this->matriculaAEliminar = 0;
            // $this->emit('searchStudent');
            // dd($matriculaId);
            try {
                $matricula_aux = LicensePlate::findOrFail($matriculaId);
                if($matricula_aux->gestion == date('Y')){
                        $this->ultimoAnoMatricula = '';
                        $this->flagRegister = true;
                }
    
                $matricula_aux->delete();

            } catch(\Throwable $e) {
                Log::error($e);
            }
            // $this->emit('searchStudent');
            
            
            // dd($this->codigo);
            $matriculas_aux = LicensePlate::where('codalumno', $this->codigo)->orderBy('finscripcion', 'desc')->get();

            if($matriculas_aux->first()){
                // dd('hola mundo');
                $this->matriculas = $matriculas_aux;
            }else{
                $this->matriculas = [];
                $this->curso = Course::all()->first()->codigo;
                $this->ultimoAnoMatricula = '';
                $this->matriculas = [];
                $this->ultimaMatricula = '';
                $this->flagRegister = true;
            }
            // dd($this->matriculas);


        }
        

    // dd(implode(', ', Carbon::getAvailableLocales()));  
    }



    public function render()
    {
        $this->emit('cambiarTurno');

        return view('livewire.register-form-admin');
    }
}
