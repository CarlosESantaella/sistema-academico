<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Subject;
use Livewire\Component;
use App\Models\SubjectArea;
use Illuminate\Support\Facades\DB;

class ManageSubjects extends Component
{
    //variables cursos
    public $cursos = [];
    public $cursoSeleccionado = 0;
    public $nivelCurso = '';
    public $gradoCurso = '';
    public $gnumeralCurso = '';
    public $paraleloCurso = '';
    public $turnoCurso = '';
    public $cursoAEliminar = '';
    

    //variables materias
    public $areas = [];
    public $materiaSeleccionada = 0;
    public $descripcionMateria = '';
    public $siglaMateria = '';
    public $areaMateria = '';
    public $descripcionArea = '';
    public $materiaAEliminar = '';
    public $areaAEliminar = '';


    public function mount()
    {
        $this->cursos = Course::all();
        $this->areas = SubjectArea::all();
    }

    public function limpiarCamposMaterias()
    {
        $this->areas = [];
        $this->materiaSeleccionada = 0;
        $this->descripcionMateria = '';
        $this->siglaMateria = '';
        $this->areaMateria = '';
        $this->descripcionArea = '';
        $this->materiaAEliminar = '';
        $this->areaAEliminar = '';
    }

    public function limpiarCamposCursos()
    {
        $this->cursos = [];
        $this->cursoSeleccionado = 0;
        $this->nivelCurso = '';
        $this->gradoCurso = '';
        $this->gnumeralCurso = '';
        $this->paraleloCurso = '';
        $this->turnoCurso = '';
    }

    public function seleccionarMateria($codmateria)
    {
        if($this->materiaSeleccionada == $codmateria){
            $this->materiaSeleccionada = 0;
        }else{
            $this->materiaSeleccionada = $codmateria;
        }
    }

    public function seleccionarCurso($codcurso)
    {
        if($this->cursoSeleccionado == $codcurso){
            $this->cursoSeleccionado = 0;
        }else{
            $this->cursoSeleccionado = $codcurso;
        }
    }

    public function anadirMateriaACurso()
    {
        if($this->materiaSeleccionada != 0 && $this->cursoSeleccionado != 0){
            $flagCuMa = DB::table('cu_ma')->where([
                ['codcurso', '=', $this->cursoSeleccionado],
                ['codmateria', '=', $this->materiaSeleccionada],
            ])->first();
            
            if(!$flagCuMa){
                DB::table('cu_ma')->insert([
                    'codmateria' => $this->materiaSeleccionada,
                    'codcurso' => $this->cursoSeleccionado,
                ]);
            }
        }
    }
    public function quitarMateriaACurso()
    {
        if($this->materiaSeleccionada != 0 && $this->cursoSeleccionado != 0){
            DB::table('cu_ma')->where([
                ['codcurso', '=', $this->cursoSeleccionado],
                ['codmateria', '=', $this->materiaSeleccionada]
            ])->delete();
        }
    }

    public function abrirAnadirMateriaModal()
    {
        $this->dispatchBrowserEvent('show-add-subject-modal');
    }
    public function crearMateria()
    {
        if($this->descripcionMateria != '' && $this->siglaMateria != '' && $this->areaMateria != ''){
            Subject::create([
                'descripcion' => $this->descripcionMateria,
                'sigla' => $this->siglaMateria,
                'codarea'=> $this->areaMateria
            ]);
            session()->flash('messageMateriaS', 'Asignatura creada correctamente.');
            $this->descripcionMateria = '';
            $this->siglaMateria = '';
            $this->areaMateria = '';
            $this->areas = SubjectArea::all();
            
        }else{
            session()->flash('messageMateriaE', 'rellene todos los campos, por favor.');
        }
    }

    public function eliminarMateria()
    {
        if($this->materiaAEliminar != ''){
            Subject::find($this->materiaAEliminar)->delete();
            session()->flash('messageMateriaS', 'Asignatura eliminada correctamente.');
            $this->materiaAEliminar = '';
            $this->areas = SubjectArea::all();
        }else{
            session()->flash('messageMateriaE', 'rellene todos los campos, por favor.');
        }
    }
    public function crearArea()
    {
        if($this->descripcionArea != ''){
            SubjectArea::create([
                'descripcion' => $this->descripcionArea
            ]);
            session()->flash('messageAreaS', 'Area creada correctamente.');
            $this->descripcionArea = '';
            $this->areas = SubjectArea::all();

        }else{
            session()->flash('messageAreaE', 'rellene todos los campos, por favor.');
        }
    }
    public function eliminarArea()
    {
        if($this->areaAEliminar != ''){
            Subject::where('codarea', '=', $this->areaAEliminar)->delete();
            SubjectArea::find($this->areaAEliminar)->delete();
            session()->flash('messageAreaS', 'Area eliminada correctamente.');
            $this->areaAEliminar = '';
            $this->areas = SubjectArea::all();
        }else{
            session()->flash('messageAreaE', 'rellene todos los campos, por favor.');
        }
    }

    public function abrirCursosModal()
    {
        $this->dispatchBrowserEvent('show-courses-modal');
    }

    public function crearCurso()
    {
        if($this->nivelCurso != '' && $this->gradoCurso != '' && $this->gnumeralCurso != '' && $this->paraleloCurso != '' && $this->turnoCurso != ''){
            Course::create([
                'nivel' => $this->nivelCurso,
                'grado' => $this->gradoCurso,
                'gnumeral' => $this->gnumeralCurso,
                'paralelo' => $this->paraleloCurso,
                'turno' => $this->turnoCurso,
            ]);
            session()->flash('messageCursoS', 'Curso creado correctamente.');
            $this->nivelCurso = '';
            $this->gradoCurso = '';
            $this->gnumeralCurso = '';
            $this->paraleloCurso = '';
            $this->turnoCurso = '';
            $this->cursos = Course::all();
        }else{
            session()->flash('messageCursoE', 'rellene todos los campos, por favor.');
        }
    }

    public function eliminarCurso()
    {
        if($this->cursoAEliminar != ''){
            DB::table('cu_ma')->where('codcurso', '=', $this->cursoAEliminar)->delete();
            Course::find($this->cursoAEliminar)->delete();
            session()->flash('messageCursoS', 'Curso eliminado correctamente.');
            if($this->cursoAEliminar == $this->cursoSeleccionado){

                $this->cursoSeleccionado = 0;
            }
            $this->cursoAEliminar = '';
            $this->cursos = Course::all();
        }else{
            session()->flash('messageCursoE', 'rellene todos los campos, por favor.');
        }
    }
    
    public function render()
    {
        return view('livewire.manage-subjects');
    }
}
