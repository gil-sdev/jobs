<div class="bg-gray-100 p-5 mt-18  justify-center items-center grid gap-4 grid-cols-1"> 
   @if (session()->has('mensaje'))
       <p class="border border-green-600 bg-green-100 
       text-green-600 text-sm font-bold p-2">
          {{ session('mensaje') }}
        </p>
      @else
        <form wire:submit.prevent='postularme' class="w-96 mt-5">
        <div>
            <x-input-label for="cv" :value="__('Subir CV')"/>
                
            <x-text-input 
                class="flex justify-center"
                id="cv"
                type="file"
                wire:model="cv"
                class="block mt-1 w-full"      
                accept=".pdf"
            />
            
            @error('cv')
            <x-input-error :messages="$errors->get('cv')" class="mt-2" />

            @enderror
        </div>
            <div class="items-center flex justify-center">
                <x-primary-button class="w-auto justify-center">
                    {{ __('Postularme') }}
                </x-primary-button>
            </div>
        </form>
    </div>
@endif
</div>
