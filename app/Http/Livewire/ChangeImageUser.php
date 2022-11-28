<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ChangeImageUser extends Component
{
    public $image;
    public $user;

    use WithFileUploads;

    public function render()
    {
        return view('livewire.change-image-user');
    }
}
