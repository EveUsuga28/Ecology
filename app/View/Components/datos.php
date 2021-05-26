<?php

namespace App\View\Components;

use Illuminate\View\Component;

class datos extends Component
{

    public $datos;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($datos)
    {
        $this->datos = $datos;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.datos');
    }
}
