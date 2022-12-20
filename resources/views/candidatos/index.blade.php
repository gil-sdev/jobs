<x-app-layout>
    <x-slot name="header">
        <h2 class="mt-2 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Candidatos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-bold text-center text-sm mb-10"> 
                        Postulaciones: {{($vacante->titulo)}}
                    </h3>
                    <div class="md:file: md:justify-center p-5">
                    <ul class="divide-y divide-gray-200 w-full">
                        @forelse ($vacante->candidatos as $candidato)
                            <li class="p-3 flex items-center">
                                <div class="flex-1">
                                    <p class="text-xl font-medium text-gray-700">
                                            {{ $candidato->user->name }}
                                    </p>
                                    <p class="text-sm font-medium text-gray-600">
                                          {{ $candidato->user->email }}
                                    </p>
                                    <p class="text-sm font-medium text-gray-600">
                                      Postulado   {{ $candidato->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <div>
                                    <a href="{{ asset('storage/cv/').$candidato->cv}}" 
                                        target="_black"
                                        rel="noreferrer noopener nofollow"
                                        class="text-blue-500 mb-4 text-sm font-bold rounded-lg border-2 border-blue-200 px-6 py-2">
                                        Ver Corrilum vitae
                                    </a>
                                </div>                          
                            </li>
                        @empty
                            <li>
                                <p class="p-3 text-center text-sm text-gray-600">
                                    Sin candidatos
                                </p>
                            </li>
                        @endforelse
                     
                    </ul>   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
