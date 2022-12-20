<div>

<livewire:filtar-vacantes />

    <div class="py-4">
        <div class="max-w-7xl mx-auto">
            <h5 class="font-semibold text-xl text-gray-800  mb-8">
                    Vacantes disponibles
            </h5>
            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divede-gray-300">
            @forelse ( $vacantes as $vacante )



                <div class="md:flex md:justify-between md:items-center py-5">

                    <div class="md:flex-1">
                        <p class="text-gray-600 text-sm">
                            Publicado {{ $vacante->created_at->diffForHumans() }}
                        </p>
                        <p class="text-2xl font-extrabold text-gray-500">
                            {{ $vacante->titulo }}
                        </p>
                        <p class="text-base text-gray-600 mb-2">
                            {{ $vacante->empresa }}
                        </p>
                        <p class="text-gray-600 mb-2 text-sm">
                          Ultimo día para postularse    {{ $vacante->ultimo_dia->format('d/n/y') }}
                         </p>
                    </div>

                    <div>
                        <a 
                        class="text-blue-500 text-sm font-bold rounded-lg border-2 border-blue-200 px-3 py-1"
                        href="{{ route('vacantes.show', $vacante->id) }}"
                        >
                            Ver detalles
                        </a>
                    </div>
                </div>
            @empty
                <h5 class="p-3 text-center text-sm text-gray-6">
                    Sin vacantes por hoy
                </h5>
            @endforelse
            </div> 
        </div>
    </div>

</div>
