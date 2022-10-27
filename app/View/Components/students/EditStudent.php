<?php

namespace App\View\Components\students;

use Illuminate\View\Component;

class EditStudent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $student, public $responsibles)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.students.edit-student');
    }
}
