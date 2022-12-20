<div> 
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}         
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            @forelse ( $vacantes as $vacante )
                <div class="p-6 bg-white border-b border-gray-300">
                    <div class="space-y-3">
                        <a href="{{ route('vacantes.show',$vacante) }}" class="text-xl font-bold">
                            {{$vacante->titulo}}
                        </a>
                        <p class="text-sm text-gray-600 front-bold">
                            {{ $vacante->empresa }}
                        </p>
                        <p class = "text-sm text-gray-600 front-bold">
                            Ultimo dia: {{ $vacante->ultimo_dia }}
                        </p>
                    </div>

                    <div class="flex gap-3 items-center mt-5 md:mt-8">
                        <a href="{{ route('candidatos.index',$vacante) }}" class="items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Pustulados: {{$vacante->candidatos()->count()}}
                        </a>
                        <a href="{{ route('vacantes.edit',$vacante->id) }}" class="items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ">
                            Editar
                        </a>
                        {{-- El evento livewire de click llama la funcion eliminar pasanod la variable id --}}
                        <button wire:click="$emit('eliminar', {{ $vacante->id }})"              
                        class="items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-red-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 ">
                            ELiminar
                        </button>
                    </div>
                </div>               
            @empty
                <div class="leading-10 text-xl font-bold">      
                    {{'Sin registros'}}
                </div>
            @endforelse
        </div>
    </div>
    <div class="mt-10">
        {{--paginacion por laravel --}}
        {{ $vacantes->links() }}
    </div>
</div>

{{-- EL script solo se ejecutara caundo el componente sea llamdo --}}
@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    livewire.on('eliminar', vacanteId => {

    Swal.fire({
        title: '¿Esta seguro de eliminar la vacante?',
        text: "La información no se podra recuperar",
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        cancelButtonColor: '#3085d6',
        confirmButtonColor: '#d33',
        confirmButtonText: 'Eliminar'
        }).then((result) => {
        if (result.isConfirmed) {
            // respuesta del servidor 
            livewire.emit('eliminarVacante', vacanteId)
                Swal.fire(
                'Eliminado!',
                'La vacante ha sido eliminado',
                'success',

                )
            }
            })
    })
 
        
</script>
@endpush