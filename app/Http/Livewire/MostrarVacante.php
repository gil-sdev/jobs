<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarVacante extends Component
{
    /* A public property that is being used to pass data from the parent component to the child
    component. */
    public $vacante;
    public function render()
    {
        return view('livewire.mostrar-vacante');
    }
}
