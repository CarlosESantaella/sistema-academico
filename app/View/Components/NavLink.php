<?php

namespace App\View\Components;

use Illuminate\View\Component;

class NavLink extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $href = null, public $active)
    {
        
    }

    // public function validatePrincipalRoutes($principalLink)
    // {
    //     if($principalLink == 'alumnos'){

    //     }
    //     return '0';
    // }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.nav-link');
    }
}
