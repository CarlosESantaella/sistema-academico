<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ChangeImageStudent extends Component
{
    public $image;

    use WithFileUploads;

    public function render()
    {
        return view('livewire.change-image-student');
    }
}
