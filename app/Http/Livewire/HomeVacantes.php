<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{
    public  $salario, 
            $categoria,
            $termino;


/* Listening for the event `iniciarBusqueda` and when it is triggered it will call the method `buscar`. */
    protected $listeners = [
        'iniciarBusqueda' => 'buscar',

    ];



    public function buscar($termino, $categoria, $salario)
    {
/* Assigning the values of the parameters to the variables of the component. */
        $this->salario = $salario;
        $this->termino = $termino;
        $this->categoria = $categoria;
    }
    public function render()
    {  
/* A query that is going to be executed when the event `iniciarBusqueda` is triggered. */
      $vacantes = Vacante::when($this->termino, 
                    function($query)
                    {
                                    
                     /* Searching for the title of the job that contains the word that the user is
                     looking for. */
                     $query->orWhere('titulo', 'LIKE','%'.$this->termino.'%');
                    })->when($this->categoria, 
                    function($query){
                            $query->orWhere('categoria_id', $this->categoria);
                    })->when($this->salario, 
                    function($query){
                            $query->orWhere('salario_id', $this->categoria);
                    })->paginate(5);

      /* Returning the view of the component. */
        return view('livewire.home-vacantes', [
            'vacantes' => $vacantes,
        ]);
    }
}
