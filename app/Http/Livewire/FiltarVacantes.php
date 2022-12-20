<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class FiltarVacantes extends Component
{

/* Declaring the variables that will be used in the component. */
    public  $salario, 
            $categoria,
            $termino;

 /* Emitting an event called buscar. */
    public function datosForm()
    {
        /* Emitting an event called buscar. */
        $this->emit('iniciarBusqueda', $this->termino, $this->categoria, $this->salario);
    }

    public function render()
    {
/* Getting all the salarios and categorias from the database. */
        $salarios = Salario::all();
        $categorias = Categoria::all();
        
/* Returning the view and passing the variables to the view. */
        return view('livewire.filtar-vacantes', [
            'salarios' => $salarios,
            'categorias' => $categorias,

        ]);
    }
}
