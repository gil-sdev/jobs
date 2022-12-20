<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
   /* A property that is used to validate the form. */
   protected $rules = [
        'titulo' => 'required|string',
        'salario_id' => 'required',
        'categoria_id' => 'required',
        'empresa' => 'required',
        'descripcion' => 'required',
        'ultimo_dia' => 'required',
        'imagenNueva' => 'nullable|image|max:1024',

        ];


/* A property that is used to store the data of the vacancy that is being edited. */
    public $vacante;

/* Declaring the properties that will be used in the component. */
    public $vacante_id,
           $titulo,
           $salario_id, 
           $categoria_id, 
           $empresa,
           $ultimo_dia, 
           $descripcion, 
           $imagen;

    public $imagenNueva;

/* A trait that is used to upload files. */
    use WithFileUploads;

    /* A function that is called when the component is mounted. */
    public function mount(Vacante $vacante)
    {
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario_id = $vacante->salario_id;
        $this->categoria_id = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
          /* Parsing the date. */
        $this->ultimo_dia = Carbon::parse( $vacante->ultimo_dia )->format("Y-m-d");
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    public function editarVacante()
    {
        /* Validating the data that is being sent from the form. */
        $data = $this->validate();

        if($this->imagenNueva) 
        {
            $imagen = $this->imagenNueva->store('public/vacantesImg/');
            $data['imagen'] = str_replace('public/vacantesImg/','',$imagen);
        }

       /* Finding the vacancy that is being edited. */
        $vacante =  Vacante::find($this->vacante_id);

        /* Assigning the data that is being sent from the form to the vacancy that is being edited. */
        $vacante->titulo = $data['titulo'];
        $vacante->salario_id = $data['salario_id'];
        $vacante->categoria_id = $data['categoria_id'];
        $vacante->empresa = $data['empresa'];
        $vacante->descripcion = $data['descripcion'];
        $vacante->ultimo_dia = $data['ultimo_dia'];
        $vacante->imagen = $data['imagen'] ?? $vacante->imagen;
        /* Saving the changes that are being made to the vacancy. */
        $vacante->save();

        /* Saving a message in the session that will be displayed in the view. */
        session()->flash('mensaje', 'La sea han realizado los cambio correctamente');

        /* Redirecting the user to the index page of the vacancies. */
        return redirect()->route('vacantes.index');
    }


    /* Returning the view that will be used for the component. */
    public function render()
    {
        $catVacante = Categoria::all(['id','categoria']);
        $salarios = Salario::all(['id','salario']);
       /* Returning the view that will be used for the component. */
        return view('livewire.editar-vacante',[
            'salarios' => $salarios,
            'categorias' => $catVacante,
            
        ]);
    }
}
