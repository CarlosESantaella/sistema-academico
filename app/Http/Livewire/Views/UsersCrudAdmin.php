<?php

namespace App\Http\Livewire\Views;

use App\Models\User;
use Livewire\Component;

class UsersCrudAdmin extends Component
{
    public $users = [];
    public $user_edit;
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
    public $is_save = true;
    public $is_update = false;
    public $is_delete = false;
    // public $is_save = true;
    // public $is_update = false;
    // public $is_delete = false;

    protected $rules = [
        'user_edit' => '',
        'ci' => 'required',
        'appaterno' => 'required',
        'nombres' => 'required',
        'tipo' => 'required'
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

        $this->is_update = false;
        $this->is_delete = false;
        $this->is_save = true;

        $this->resetErrorBag();
    }

    public function editUser($id)
    {
        $this->user_edit = User::find($id);

        $this->ci = $this->user_edit->ci;
        $this->appaterno = $this->user_edit->appaterno;
        $this->apmaterno = $this->user_edit->apmaterno;
        $this->nombres = $this->user_edit->nombres;
        $this->direccion = $this->user_edit->direccion;
        $this->telefono = $this->user_edit->telefono;
        $this->fnacimiento = $this->user_edit->fnacimiento;
        $this->mail = $this->user_edit->mail;
        $this->clave = $this->user_edit->clave;
        $this->tipo = $this->user_edit->tipo;

        $this->is_update = true;
        $this->is_delete = true;
        $this->is_save = false;

        $this->resetErrorBag();
    }

    public function saveUser()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.views.users-crud-admin');
    }
}
