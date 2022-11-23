<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Student;
use Livewire\Component;
use App\Models\LicensePlate;

class RegisterFormAdmin extends Component
{
    public $codigo;
    public $nombreCompleto;
    public $matriculas = [];
    public $ultimoAnoMatricula;
    public $cursos;


    public function mount()
    {
        $this->cursos = Course::all();
    }
    
    public function searchStudent()
    {
        $student = Student::where('codigo', $this->codigo)->first();

        $this->nombreCompleto = $student->nombres.' '.$student->appaterno.' '.$student->apmaterno;
        $this->matriculas = LicensePlate::where('codalumno', $student->codigo)->whereYear('finscripcion', date('Y'))->orderBy('finscripcion', 'desc')->get();

        $this->ultimoAnoMatricula = LicensePlate::where('codalumno', $student->codigo)?->whereYear('finscripcion', date('Y'))?->orderBy('finscripcion', 'desc')->first()?->finscripcion?->format('Y') ?? '';

        
    }

    public function render()
    {


        return view('livewire.register-form-admin');
    }
}
