<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
<h1>DATOS DE LA VACANTE</h1>

{{-- wire:submit habilita la opcion de eviar datos del formulario hacia el modelo --}}
<form class="md:w-1/2 space-x-5" wire:submit.prevent='crearVacante'>
    <div></div>
    <div>
        <x-input-label for="titulo" :value="__('Titulo del vacante')"/>
         <x-text-input  id="titulo" class="block mt-1 w-full"
        type="text" 
        {{-- wire comando livewire permite conectar con el modelo automaticamnte --}}
        wire:model="titulo" 
        :value="old('titulo')" 
        placeholder="Ejemplo: programador jr"
         />

        {{-- etiqueta de laravel, para ver el valor de error returnado 
          -- del modelo  de acuerdo a las validaciones colocadas en ella           --}}
        @error('titulo')       
          <livewire:mostrar-alerta :message="$message"/>
        @enderror

    </div>

{{-- Mostrar salarios --}}
    <div>
        <x-input-label for="salario_id" :value="__('Salario Mensual')"/>
        <select 
        {{-- wire comando livewire comunicara con el modelo para validacion supliendo el atributo name html--}}
            id="salario_id" 
            wire:model="salario_id"
            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                @forelse ($salarios as $salario )
                <option value="{{$salario->id}}"> {{ $salario->salario}}</option>   
                @empty
                <option>-- No hay registros ---</option>    
                @endforelse
        </select>

        @error('salario_id')       
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>
    
    <div>
        <x-input-label for="categoria_id" :value="__('Categoria')"/>
        <select 
            id="categoria_id" 
            wire:model="categoria_id"
            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            @forelse ($catVacante as $catVacante )
                <option value="{{$catVacante->id}}"> {{ $catVacante->categoria}}</option>   
            @empty
                <option>-- No hay registros ---</option>    
            @endforelse
        
        </select>
        @error('categoria_id')       
           <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Nombre empresa')"/>
         <x-text-input  id="empresa" class="block mt-1 w-full"
        type="text" 
        wire:model="empresa" 
        :value="old('empresa')" 
        placeholder="Ejemplo: NASAQ"
         />
         @error('empresa')       
           <livewire:mostrar-alerta :message="$message"/>
         @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo día de postulación')"/>
         <x-text-input  id="ultimo_dia" class="block mt-1 w-full"
        type="date" 
        wire:model="ultimo_dia" 
        :value="old('ultimo_dia')" 
         />
         @error('ultimo_dia')       
           <livewire:mostrar-alerta :message="$message"/>
         @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripción de la vacante')"/>
         <textarea 
         id="descripcion"
         type = "textarea"
         wire:model = "descripcion"       
         placeholder="Funciones del puesto">

         </textarea>
         @error('descripcion')       
           <livewire:mostrar-alerta :message="$message"/>
         @enderror
    </div>

    <div>
        <x-input-label for="imagen" :value="__('Imagen')"/>
        <x-text-input 
        id="imagen"
        type="file"
        wire:model="imagen"
        class="block mt-1 w-full"      
        accept="image/png, image/jpeg"
        />
        <div class="my-5 w-80">
            @if ($imagen)
                imagen:
                {{-- permite visualizar la imagen a subir al servidor --}}
                <img src="{{ $imagen->temporaryUrl() }}">
            @endif
        </div>

        @error('imagen')       
          <livewire:mostrar-alerta :message="$message"/>
        @enderror
    </div>

  
    <x-primary-button class="w-full justify-center">
        {{-- La doble linea debajo indica que se puede traducir --}}
        {{ __('Registrar') }}
    </x-primary-button>

</form>

</div>
