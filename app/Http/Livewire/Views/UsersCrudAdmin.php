<?php

namespace App\Http\Livewire\Views;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Livewire\ChangeImageUser;
use Illuminate\Support\Facades\Storage;

class UsersCrudAdmin extends Component
{

    use WithFileUploads;

    protected $listeners = ['refresh' => '$refresh'];
    
    public $users = [];
    public $user = '';
    public $ci;
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
        $this->users = User::where('tipo', '<>', 3)->get();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function cleanFields()
    {
        $this->ci = '';
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

        $this->is_update = false;
        $this->is_delete = false;
        $this->is_save = true;

        $this->resetErrorBag();
    }

    public function editUser($id)
    {

        $this->user = User::find($id);

        $this->ci = $this->user->ci;
        $this->appaterno = $this->user->appaterno;
        $this->apmaterno = $this->user->apmaterno;
        $this->nombres = $this->user->nombres;
        $this->direccion = $this->user->direccion;
        $this->telefono = $this->user->telefono;
        $this->fnacimiento = $this->user->fnacimiento;
        $this->mail = $this->user->mail;
        $this->clave = $this->user->clave;
        $this->tipo = $this->user->tipo;
        $this->codigo = $this->user->codigo;
        $this->image = '';


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

        $primeraLetraNombres = substr($this->nombres, 0, 1);
        $primeraLetraAppaterno = substr($this->appaterno, 0, 1);
        $this->clave = strtoupper($primeraLetraNombres).strtoupper($primeraLetraAppaterno).$this->ci;

        $userUpdate->ci = strtoupper($this->ci);
        $userUpdate->nombres = strtoupper($this->nombres);
        $userUpdate->appaterno = strtoupper($this->appaterno);
        $userUpdate->apmaterno = strtoupper($this->apmaterno);
        $userUpdate->mail = strtoupper($this->mail);
        $userUpdate->fnacimiento = $this->fnacimiento;
        $userUpdate->direccion = strtoupper($this->direccion);
        $userUpdate->telefono = strtoupper($this->telefono);
        $userUpdate->tipo = $this->tipo;
        $userUpdate->clave = strtoupper($this->clave);
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

        $this->users = User::where('tipo', '<>', 3)->get();
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
        $this->clave = strtoupper($primeraLetraNombres).strtoupper($primeraLetraAppaterno).$this->ci;

        User::create([
            'codigo' => strtoupper($this->ci),
            'appaterno' => strtoupper($this->appaterno),
            'apmaterno' => strtoupper($this->apmaterno),
            'nombres' => strtoupper($this->nombres),
            'ci' => $this->ci,
            'foto' => $filename,
            'direccion' => strtoupper($this->direccion),
            'telefono' => strtoupper($this->telefono),
            'fnacimiento' => $this->fnacimiento,
            'mail' => strtoupper($this->mail),
            'tipo' => $this->tipo,
            'clave' => strtoupper($this->clave)
        ]);

        session()->flash('message', 'Usuario Creado con Exito!');

        $this->ci = '';
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

        $this->is_update = false;
        $this->is_delete = false;
        $this->is_save = true;

        $this->resetErrorBag();

        $this->users = User::where('tipo', '<>', 3)->get();
        
        
    }

    public function eliminarUsuario($codigo = '')
    {
        if($codigo == ''){

        }else{
            User::find($codigo)->delete();
            session()->flash('message', 'Usuario Eliminado Correctamente');
            $this->ci = '';
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
    
            $this->is_update = false;
            $this->is_delete = false;
            $this->is_save = true;
    
            $this->resetErrorBag();
            $this->users = User::where('tipo', '<>', 3)->get();

        }
    }

    public function render()
    {
        return view('livewire.views.users-crud-admin');
    }
}
