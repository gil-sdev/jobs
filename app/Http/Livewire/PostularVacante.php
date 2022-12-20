<?php

namespace App\Http\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
/* A public property that is used to store the file that is uploaded. */
    public $cv;
    public $vacante;

    /* A trait that is used to upload files. */
    use WithFileUploads;

   /* A validation rule that is used to validate the file that is uploaded. */
    protected $rules = [
        'cv' => 'required|mimes:pdf',
    ];

    /* A method that is called when the component is mounted. It is used to pass data to the component. */
    public function mount(Vacante $vacante)
    {
        $this->vacante;
    }

    /* Validating the file that is uploaded and then storing it in the storage/app/public/cv directory. */
    public function postularme()
    {     

       $datos = $this->validate();
/* Storing the file in the storage/app/public/cv directory. */
       $cV = $this->cv->store('public/cv/');
       $datos['cv'] = str_replace('public/cv/','',$cV);

/* Creating a new candidate for the vacancy. */

       $this->vacante->candidatos()->create([
        'user_id' => auth()->user()->id,
        'cv' => $datos['cv'],
       ]);

   /* Sending a notification to the recruiter. */
       $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->id()));

       /* Used to display a message to the user. */
       session()->flash('mensaje', 'Postulación exitosa!');
      /* Used to redirect the user back to the previous page. */
       redirect()->back();
    }

   /* A method that is required by Livewire. It is responsible for rendering the view. */
    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
