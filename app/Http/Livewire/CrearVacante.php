<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
   
    // atributos del modelo
    public  $titulo, 
            $salario_id,
            $categoria_id, 
            $empresa,
            $descripcion,
            $ultimo_dia,
            $imagen;
          
    use WithFileUploads;

    // reglas de los atributos recibidadas desde la vista
    protected $rules = [
        'titulo' => 'required|string',
        'salario_id' => 'required',
        'categoria_id' => 'required',
        'empresa' => 'required',
        'descripcion' => 'required',
        'ultimo_dia' => 'required',
        'imagen' => 'required|image|max:1024',
        ];

    public function crearVacante()
    {
        // funcion que valida los datos de la vista, mediante las reglas
        // establecidas en $rules
           $datos = $this->validate();
   
           //Almacenar la imagen
           $imgSrc = $this->imagen->store('public/vacantesImg');
           $datos['imagen'] = str_replace('public/vacantesImg/','',$imgSrc); 
          

           //creando la vacante
        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario_id'],
            'categoria_id'  => $datos['categoria_id'],
            'empresa'  => $datos['empresa'],
            'descripcion'  => $datos['descripcion'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);

        //crear mensaje
        session()->flash('mensaje', 'La vacante se creo correctamente');

        // redireccion
        return redirect()->route('vacantes.index');

    }
    public function render()
    {
        //cosnultar bases de datos 
        $catVacante = Categoria::all();
        $salarios = Salario::all();
        return view('livewire.crear-vacante',[
            'salarios'=>$salarios,
            'catVacante' => $catVacante,

        ]);
    }
}
