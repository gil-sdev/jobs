<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{

   /* Listening for the event `eliminarVacante` and when it is triggered it will execute the function
   `eliminarVacante` */
    protected $listeners = ['eliminarVacante'];

/* Listening for the event `eliminarVacante` and when it is triggered it will execute the function
   `eliminarVacante` */
    public function eliminarVacante(Vacante $vacante)
    {
        $vacante->delete();
    }
    public function render()
    {
        /* Getting all the vacancies that belong to the logged in user. */
        $vacantes = Vacante::where('user_id',auth()->user()->id)->paginate(5);
       
        /* Returning the view of the component. */
        return view('livewire.mostrar-vacantes',[
            'vacantes'=>$vacantes,
        ]);
    }
}
