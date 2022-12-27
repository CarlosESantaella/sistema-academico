<?php

namespace App\Http\Livewire\Views;

use App\Models\User;
use App\Models\Course;
use App\Models\Dictate;
use App\Models\Subject;
use Livewire\Component;
use App\Models\LicensePlate;
use App\Exports\ExportExcels;
use Livewire\WithFileUploads;
use App\Http\Livewire\ChangeImageUser;
use Illuminate\Support\Facades\Storage;

class UsersCrudAdmin extends Component
{

    use WithFileUploads;

    protected $listeners = [
        'refresh' => '$refresh', 
        'cleanFields', 
        'agregarCursoAEliminar', 
        'agregarCurso', 
        'cambiarFiltroUsuarios'
    ];
    
    public $users = [];
    public $user = '';
    public $ci;
    public $exp_ci;
    public $appaterno;
    public $apmaterno;
    public $nombres;
    public $direccion;
    public $telefono;
    public $fnacimiento;
    public $mail;
    public $tipo;
    public $clave;
    public $image;
    public $codigo;
    public $rda;
    public $celular;
    public $correo_institucional;
    public $especialidad = '';
    public $flagEspecialidad = true;
    public $flagUserSelected = -1;
    public $flagCursosModal = false;

    public $filtroUsuarios = 'todos';
    public $cursosProfesor = [];
    public $cursoAEliminar = 0;
    public $cursosSeleccionables = [];
    public $cursoAAgregar;

    public $materiasProfesor = [];
    public $materiaSelected = '';
    public $textMateriasModal = 'Crear';
    public $cursosListaModal = [];
    public $materiasListaModal = [];
    public $materiaSelectedModal = '';
    public $cursoSelectedModal = '';
    public $periodos = '';
    public $materiaAEditar = 0;

    public $is_save = true;
    public $is_update = false;
    public $is_delete = false;
    // public $is_save = true;
    // public $is_update = false;
    // public $is_delete = false;

    protected $rules = [
        'user' => '',
        'ci' => 'required',
        'appaterno' => 'required',
        'nombres' => 'required',
        'tipo' => 'required',
        'fnacimiento' => 'required'
    ];

    public function mount()
    {
        $this->users = User::where('tipo', '<>', 3)->orderBy('tipo', 'asc')->get();
        // $this->filtroUsuarios = 'todos';
        $this->cursosListaModal = Course::orderByDesc('turno')->get();
        $this->materiasListaModal = Subject::all();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function cleanFields()
    {
        $this->ci = '';
        $this->exp_ci = '';
        $this->appaterno = '';
        $this->apmaterno = '';
        $this->nombres = '';
        $this->direccion = '';
        $this->telefono = '';
        $this->fnacimiento = '';
        $this->mail = '';
        $this->clave = '';
        $this->tipo = '';
        $this->image = '';
        $this->codigo = '';
        $this->user = '';
        $this->rda = '';
        $this->celular = '';
        $this->especialidad = '';
        $this->correo_institucional = '';
        $this->flagUserSelected = -1;
        $this->flagCursosModal = false;
        $this->materiaSelected = '';
        

        $this->cursosProfesor = [];
        $this->cursoAEliminar = 0;
        $this->cursoAAgregar = 0;
        // $this->cursosListaModal = [];
        // $this->materiasListaModal = [];
        $this->materiaSelectedModal = '';
        $this->cursoSelectedModal = '';
        $this->periodos = '';
        $this->materiaAEditar = 0;
        $this->materiasProfesor = [];

        $this->is_update = false;
        $this->is_delete = false;
        $this->is_save = true;
        $this->flagEspecialidad = true;
        $this->flagCursosModal = false;

        // $this->emit('cambiarFiltroUsuarios');
        // $this->filtroUsuarios = 'todos';
        // $this->cursosListaModal = Course::orderByDesc('turno')->get();
        // $this->materiasListaModal = Subject::all();

        $this->resetErrorBag();
    }

    public function editUser($id)
    {

        $this->user = User::find($id);

        $this->flagUserSelected = $id;

        $this->ci = $this->user->ci;
        $this->exp_ci = $this->user->exp_ci;
        $this->appaterno = $this->user->appaterno;
        $this->apmaterno = $this->user->apmaterno;
        $this->nombres = $this->user->nombres;
        $this->direccion = $this->user->direccion;
        $this->telefono = $this->user->telefono;
        $this->fnacimiento = $this->user->fnacimiento;
        $this->mail = $this->user->mail;
        $this->clave = $this->user->clave;
        $this->tipo = $this->user->tipo;
        $this->image = '';
        $this->codigo = $this->user->codigo;
        $this->rda = $this->user->rda;
        $this->celular = $this->user->celular;
        $this->correo_institucional = $this->user->correo_institucional;

        $this->cursoAEliminar = 0;
        $this->cursoAAgregar = 0;
        $this->materiaSelected = '';
        $this->materiaSelectedModal = '';
        $this->cursoSelectedModal = '';
        $this->periodos = '';
        $this->materiaAEditar = 0;
        $this->materiasProfesor = [];



        if($this->user->tipo == 1){
            $this->flagEspecialidad = false;
            $this->especialidad = $this->user->especialidad;
            $this->flagCursosModal = true;
            $codigo = (int)$this->user->codigo;
            $this->cursosProfesor = Course::where('responsable', '=', $codigo)->get();
            if(!$this->cursosProfesor){
                $this->cursosProfesor = [];
            }
            $this->materiasProfesor = [];

            $materiasProfesor = Dictate::where('idusuario', '=', $this->user->codigo)->get() ?? [];
            if($materiasProfesor){
                $this->materiasProfesor = $materiasProfesor;
            }else{
                $this->materiasProfesor = [];
            }
        }else{
            $this->especialidad = '';
            $this->flagEspecialidad = true;
            $this->flagCursosModal = false;
            $this->cursosProfesor = [];

        }


        $this->is_update = true;
        $this->is_delete = true;
        $this->is_save = false;

        $this->resetErrorBag();
    }

    public function crearClave()
    {
        $primeraLetraNombres = substr($this->nombres, 0, 1);
        $primeraLetraAppaterno = substr($this->appaterno, 0, 1);
        $this->clave = strtoupper($primeraLetraNombres).strtoupper($primeraLetraAppaterno).$this->ci;
    }

    public function updateUser()
    {
        $userUpdate = User::find($this->codigo);

        // $primeraLetraNombres = substr($this->nombres, 0, 1);
        // $primeraLetraAppaterno = substr($this->appaterno, 0, 1);
        // $this->clave = strtoupper($primeraLetraNombres).strtoupper($primeraLetraAppaterno).$this->ci;

        $userUpdate->ci = strtoupper($this->ci);
        $userUpdate->exp_ci = $this->exp_ci;
        $userUpdate->nombres = strtoupper($this->nombres);
        $userUpdate->appaterno = strtoupper($this->appaterno);
        $userUpdate->apmaterno = strtoupper($this->apmaterno);
        $userUpdate->mail = strtoupper($this->mail);
        $userUpdate->fnacimiento = $this->fnacimiento;
        $userUpdate->direccion = strtoupper($this->direccion);
        $userUpdate->telefono = strtoupper($this->telefono);
        $userUpdate->tipo = $this->tipo;
        $userUpdate->rda = strtoupper($this->rda);
        $userUpdate->celular = strtoupper($this->celular);
        $userUpdate->correo_institucional = strtoupper($this->correo_institucional);
        $userUpdate->clave = strtoupper($this->clave);
        if($this->tipo == 1){
            $userUpdate->especialidad = strtoupper($this->especialidad);
        }
        if($this->image == ''){

        }else{
            $img_path = $this->image->store('public/users/img');
            $filename = str_replace('public/users/img/', '', $img_path);
            if(Storage::exists('public/users/img/'.$userUpdate->foto)){
                Storage::delete('public/users/img/'.$userUpdate->foto);
            }
            $userUpdate->foto = $filename;
        }

        $userUpdate->save();

        session()->flash('message', 'Usuario actualizado correctamente');

        $this->resetErrorBag();

        $this->users = User::where('tipo', '<>', 3)->orderBy('tipo', 'asc')->get();
    }

    public function saveUser()
    {
        $this->validate();

        if($this->image == ''){
            $filename = '';
        }else{
            $img_path = $this->image->store('public/users/img');
            $filename = str_replace('public/users/img/', '', $img_path);

        }

        $primeraLetraNombres = substr($this->nombres, 0, 1);
        $primeraLetraAppaterno = substr($this->appaterno, 0, 1);

        $username_a = explode(' ', $this->nombres);
        $first_letter_names = '';

        foreach($username_a as $letter){
            $letter_a = str_split($letter, 1);
            $first_letter_names .= $letter_a[0];
        }
        
        $username = $first_letter_names.str_replace(" ", "", $this->appaterno);

        $this->clave = strtoupper($primeraLetraNombres).strtoupper($primeraLetraAppaterno).$this->ci;
        if($this->tipo == 1){
            User::create([
                'codigo' => strtoupper($this->ci),
                'appaterno' => strtoupper($this->appaterno),
                'apmaterno' => strtoupper($this->apmaterno),
                'nombres' => strtoupper($this->nombres),
                'ci' => $this->ci,
                'exp_ci' => $this->exp_ci,
                'foto' => $filename,
                'direccion' => strtoupper($this->direccion),
                'telefono' => strtoupper($this->telefono),
                'fnacimiento' => $this->fnacimiento,
                'especialidad' => strtoupper($this->especialidad),
                'mail' => strtoupper($this->mail),
                'tipo' => $this->tipo,
                'rda' => strtoupper($this->rda),
                'celular' => strtoupper($this->celular),
                'correo_institucional' => strtoupper($this->correo_institucional),
                'usuario' => $username,
                'clave' => strtoupper($this->clave)
            ]);
        }else{

            User::create([
                'codigo' => strtoupper($this->ci),
                'appaterno' => strtoupper($this->appaterno),
                'apmaterno' => strtoupper($this->apmaterno),
                'nombres' => strtoupper($this->nombres),
                'ci' => $this->ci,
                'exp_ci' => $this->exp_ci,
                'foto' => $filename,
                'direccion' => strtoupper($this->direccion),
                'telefono' => strtoupper($this->telefono),
                'fnacimiento' => $this->fnacimiento,
                'mail' => strtoupper($this->mail),
                'tipo' => $this->tipo,
                'rda' => strtoupper($this->rda),
                'celular' => strtoupper($this->celular),
                'correo_institucional' => strtoupper($this->correo_institucional),
                'usuario' => $username,
                'clave' => strtoupper($this->clave)
            ]);
        }
        $this->ci = '';
        $this->exp_ci = '';
        $this->appaterno = '';
        $this->apmaterno = '';
        $this->nombres = '';
        $this->direccion = '';
        $this->telefono = '';
        $this->fnacimiento = '';
        $this->mail = '';
        $this->clave = '';
        $this->tipo = '';
        $this->image = '';
        $this->codigo = '';
        $this->user = '';
        $this->rda = '';
        $this->celular = '';
        $this->especialidad = '';
        $this->correo_institucional = '';
        $this->flagUserSelected = -1;
        $this->flagCursosModal = false;
        $this->materiaSelected = '';
        
        
        $this->cursosProfesor = [];
        $this->cursoAEliminar = 0;
        $this->cursoAAgregar = 0;
        // $this->cursosListaModal = [];
        // $this->materiasListaModal = [];
        $this->materiaSelectedModal = '';
        $this->cursoSelectedModal = '';
        $this->periodos = '';
        $this->materiaAEditar = 0;
        $this->materiasProfesor = [];

        if($this->filtroUsuarios == 'todos'){
            $this->users = User::where('tipo', '<>', 3)->orderBy('tipo', 'asc')->get();
        }else if($this->filtroUsuarios == 'administrador'){
            $this->users = User::where('tipo', '=', 0)->get();
        }else if($this->filtroUsuarios == 'profesor'){
            $this->users = User::where('tipo', '=', 1)->get();
        }else if($this->filtroUsuarios == 'secretaria'){
            $this->users = User::where('tipo', '=', 2)->get();
        }
        
        $this->is_update = false;
        $this->is_delete = false;
        $this->is_save = true;
        $this->flagEspecialidad = true;
        $this->flagCursosModal = false;
        // $this->filtroUsuarios = 'todos';
        $this->cursosListaModal = Course::orderByDesc('turno')->get();
        $this->materiasListaModal = Subject::all();
        
        $this->resetErrorBag();

        session()->flash('message', 'Usuario Creado con Exito!');

        // $this->emit('cleanFields');
        // $this->emit('cambiarFiltroUsuarios');

        // $this->users = User::where('tipo', '<>', 3)->orderBy('tipo', 'asc')->get();
        
        
    }

    public function eliminarUsuario(User $user)
    {
        if(!$user){

        }else{
            // User::find($codigo)->delete();
            $dictates = Dictate::where('idusuario', '=', $user->codigo)->get();

            foreach($dictates as $dictate){
                $dictate->delete();
            }
            $user->delete();
            $this->ci = '';
            $this->exp_ci = '';
            $this->appaterno = '';
            $this->apmaterno = '';
            $this->nombres = '';
            $this->direccion = '';
            $this->telefono = '';
            $this->fnacimiento = '';
            $this->mail = '';
            $this->clave = '';
            $this->tipo = '';
            $this->image = '';
            $this->codigo = '';
            $this->user = '';
            $this->rda = '';
            $this->celular = '';
            $this->especialidad = '';
            $this->correo_institucional = '';
            $this->flagUserSelected = -1;
            $this->flagCursosModal = false;
            $this->materiaSelected = '';
            
            
            $this->cursosProfesor = [];
            $this->cursoAEliminar = 0;
            $this->cursoAAgregar = 0;
            // $this->cursosListaModal = [];
            // $this->materiasListaModal = [];
            $this->materiaSelectedModal = '';
            $this->cursoSelectedModal = '';
            $this->periodos = '';
            $this->materiaAEditar = 0;
            $this->materiasProfesor = [];

            if($this->filtroUsuarios == 'todos'){
                $this->users = User::where('tipo', '<>', 3)->orderBy('tipo', 'asc')->get();
            }else if($this->filtroUsuarios == 'administrador'){
                $this->users = User::where('tipo', '=', 0)->get();
            }else if($this->filtroUsuarios == 'profesor'){
                $this->users = User::where('tipo', '=', 1)->get();
            }else if($this->filtroUsuarios == 'secretaria'){
                $this->users = User::where('tipo', '=', 2)->get();
            }
            
            $this->is_update = false;
            $this->is_delete = false;
            $this->is_save = true;
            $this->flagEspecialidad = true;
            $this->flagCursosModal = false;
            // $this->filtroUsuarios = 'todos';
            $this->cursosListaModal = Course::orderByDesc('turno')->get();
            $this->materiasListaModal = Subject::all();
            
            $this->resetErrorBag();
            // $this->emit('cleanFields');
            // $this->emit('cambiarFiltroUsuarios');
            session()->flash('message', 'Usuario Eliminado Correctamente');
            
        }
    }
    
    public function cambiarFiltroUsuarios()
    {
        if($this->filtroUsuarios == 'todos'){
            $this->users = User::where('tipo', '<>', 3)->orderBy('tipo', 'asc')->get();
        }else if($this->filtroUsuarios == 'administrador'){
            $this->users = User::where('tipo', '=', 0)->get();
        }else if($this->filtroUsuarios == 'profesor'){
            $this->users = User::where('tipo', '=', 1)->get();
        }else if($this->filtroUsuarios == 'secretaria'){
            $this->users = User::where('tipo', '=', 2)->get();
        }
    }

    public function cambiarTipoForm()
    {
        if($this->tipo == 1){
            $this->flagEspecialidad = false;
            $this->flagCursosModal = true;

        }else{
            $this->especialidad = '';
            $this->flagEspecialidad = true;
        }
    }

    public function agregarCursoModal()
    {
        $user = User::find($this->codigo);

        if($this->codigo != '' && $user->tipo == 1){

            $contador = Course::where('responsable', '=', $this->codigo)->get()->count();
            if($contador == 2){
                session()->flash('message_top', 'Ya este profesor tiene 2 cursos adjudicados.');
            }else if($contador == 1){
                $curso = Course::where('responsable', '=', $this->codigo)->first();
                
                if($curso->turno == 'Mañana'){

                    $this->cursosSeleccionables = Course::where([
                        ['responsable', '=', NULL],
                        ['turno', '<>', $curso->turno],
                    ])->orderByDesc('turno')->get();
                }else{
                    $this->cursosSeleccionables = Course::where([
                        ['responsable', '=', NULL],
                        ['turno', '<>', $curso->turno],
                    ])->orderBy('turno')->get();
                }
                $this->dispatchBrowserEvent('show-cursos-modal');
            }else{
                $cursosSeleccionablesMañana = Course::where([
                    ['responsable', '=', NULL],
                    ['turno', '=', 'Mañana'],
                ])->get();
                $cursosSeleccionablesTarde = Course::where([
                    ['responsable', '=', NULL],
                    ['turno', '=', 'Tarde'],
                ])->get();
                $cursosSeleccionablesNoche = Course::where([
                    ['responsable', '=', NULL],
                    ['turno', '=', 'Noche'],
                ])->get();
                $result = $cursosSeleccionablesMañana->merge($cursosSeleccionablesTarde);
                $result = $result->merge($cursosSeleccionablesNoche);
                $this->cursosSeleccionables = $result;
                $this->dispatchBrowserEvent('show-cursos-modal');
            }
        }

    }

    public function agregarCursoAEliminar($cursoId)
    {
        $cursoId = (int)$cursoId;
        $curso = Course::find($cursoId);

        if($this->cursoAEliminar == 0){
            $this->cursoAEliminar = $curso->codigo;
        }else{
            $this->cursoAEliminar = 0;
        }
        
    }

    public function eliminarCurso($cursoId)
    {

        $curso = Course::find($cursoId);
        if($curso){

            $curso->responsable = NULL;
            $curso->save();
            $cursosProfesor = Course::where('responsable', '=', $this->codigo)->get();
            if($cursosProfesor){
                $this->cursosProfesor = $cursosProfesor;
            }else{
                $this->cursosProfesor = [];
            }
        }

    }

    public function agregarCursoAAgregar($cursoId)
    {
        $this->cursoAAgregar = $cursoId;
        $this->dispatchBrowserEvent('delete-backdrop-cursos-modal');
        $this->dispatchBrowserEvent('show-cursos-modal');

    }

    public function asignarCurso($cursoId)
    {
        $curso = Course::find($cursoId);
        if($curso){
            $curso->responsable = $this->codigo;
            $curso->save();
            $cursosProfesor = Course::where('responsable', '=', $this->codigo)->get();
            if($cursosProfesor){
                $this->cursosProfesor = $cursosProfesor;
            }else{
                $this->cursosProfesor = [];
            }
            $this->dispatchBrowserEvent('delete-backdrop-cursos-modal');

        }
    }

    public function selectMateriaList($materiaId)
    {
        if($materiaId == $this->materiaSelected){
            $this->materiaSelected = '';
            $this->materiaAEditar = 0;

        }else{
            $this->materiaSelected = $materiaId;
            $this->materiaAEditar = $materiaId;
        }
    }

    public function materiaSelectModal($materiaId)
    {
        if($materiaId == $this->materiaSelectedModal){
            $this->materiaSelectedModal = '';
        }else{
            $this->materiaSelectedModal = $materiaId;
        }
        // $this->dispatchBrowserEvent('delete-backdrop-cursos-modal');
        // $this->dispatchBrowserEvent('show-materias-modal');

    }

    public function cursoSelectModal($cursoId)
    {
        if($cursoId == $this->cursoSelectedModal){
            $this->cursoSelectedModal = '';
        }else{
            $this->cursoSelectedModal = $cursoId;
        }
        // $this->dispatchBrowserEvent('delete-backdrop-cursos-modal');
        // $this->dispatchBrowserEvent('show-materias-modal');
    }

    public function crearEditarMateria()
    {

        if($this->textMateriasModal == 'Crear'){
            $dicta = Dictate::where([
                ['idusuario', '=', $this->codigo],
                ['idmateria', '=', $this->materiaSelectedModal],
                ['idcurso', '=', $this->cursoSelectedModal],
            ])->get();
            // dd($dicta);
            if($dicta->first()){
                session()->flash('messageModalMateriasE', 'Ya exite esta materia y curso vinculado a este profesor.');
            }else{
                $flagEmpty = false;

                if($this->materiaSelectedModal == ''){
                    $flagEmpty = true;
                    session()->flash('messageModalMateriasE', 'Seleccione una materia.');

                }else if($this->cursoSelectedModal == ''){
                    $flagEmpty = true;
                    session()->flash('messageModalMateriasE', 'Seleccione un curso.');

                }else if(trim($this->periodos) == ''){
                    $flagEmpty = true;
                    session()->flash('messageModalMateriasE', 'Ingrese un valor en el campo periodos.');

                }else{

                    $dictaM = Dictate::create([
                        'idusuario' => $this->codigo,
                        'idmateria' => $this->materiaSelectedModal,
                        'idcurso' => $this->cursoSelectedModal,
                        'periodo' => $this->periodos,
                    ]);
                    $this->materiasProfesor = Dictate::where('idusuario', '=', $this->codigo)->get() ?? [];
                    session()->flash('messageModalMaterias', 'Materia adjuntada con exito!');
                }

                
            }
        }else{
            if($this->materiaSelectedModal == ''){
                $flagEmpty = true;
                session()->flash('messageModalMateriasE', 'Seleccione una materia.');

            }else if($this->cursoSelectedModal == ''){
                $flagEmpty = true;
                session()->flash('messageModalMateriasE', 'Seleccione un curso.');

            }else if(trim($this->periodos) == ''){
                $flagEmpty = true;
                session()->flash('messageModalMateriasE', 'Ingrese un valor en el campo periodos.');

            }else{


                $dictaM = Dictate::find($this->materiaAEditar);
                if($dictaM){

                    $dictaM->idmateria = $this->materiaSelectedModal;
                    $dictaM->idcurso = $this->cursoSelectedModal;
                    $dictaM->periodo = $this->periodos;
                    $dictaM->save();
    
                    $this->materiasProfesor = Dictate::where('idusuario', '=', $this->codigo)->get() ?? [];
                    session()->flash('messageModalMaterias', 'Materia Editada con exito!');
                }
                
            }
        }

    }

    public function openModalMaterias($crearOEditar, $materia = false)
    {

        $this->textMateriasModal = $crearOEditar;

        if($this->tipo == 1){

            if($crearOEditar == 'Crear' && $this->user != ''){
                $this->materiaAEditar = 0;
                $this->materiaSelected = '';
                $this->materiaSelectedModal = '';
                $this->cursoSelectedModal = '';
                $this->dispatchBrowserEvent('show-materias-modal');
                
    
            }else{
                if($materia != false && $materia != 0){
                    $materiaM = Dictate::where('id', '=', $materia)->first();
                    $this->materiaAEditar = $materia;
                    $this->materiaSelectedModal = $materiaM->idmateria;
                    $this->cursoSelectedModal = $materiaM->idcurso;
                    $this->periodos = $materiaM->periodo;
                    $this->dispatchBrowserEvent('show-materias-modal');
                }
            }
    
        }
    }

    public function eliminarDicta($dictaId = false)
    {
        if(trim($dictaId) != '' && $dictaId != false){
            $dicta = Dictate::find($dictaId);
            $dicta->delete();
            $materiasProfesor = Dictate::where('idusuario', '=', $this->codigo)->get();

            if($materiasProfesor->first()){
                $this->materiasProfesor = Dictate::where('idusuario', '=', $this->codigo)->get();
            }else{
                $this->materiasProfesor = [];
            }
            $this->emit('cleanFields');

        }
    }


    public function render()
    {

        return view('livewire.views.users-crud-admin');
    }
}
