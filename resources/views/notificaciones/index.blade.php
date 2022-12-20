
<x-app-layout>
    <x-slot name="header">
        <h2 class="mt-2 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-4xl font-bold text-center mb-10">   Notificaciones</h1>
                   
                <div class = "divide-y divide-gray-200">
                    @forelse (  $notificaciones as $notificacion)
                    <div class="p-5 border border-gray-200 lg:flex lg:justify-between lg:items-center">
                            <div class="">
                                <p> Nuevo candidato en:</p>
                                <span class="font-bold">{{$notificacion->data['id_vacante']}}</span>
                                <span>{{$notificacion->data['usuario_id']}}</span>
                                <p>Hace 
                                    <span>{{$notificacion->created_at->diffForHumans()}}</span>
                                </p>  
                            </div>
                            <div class="mt-5 lg:mt-0">
                                <a href="{{route('candidatos.index', $notificacion->data['id_vacante'])}}" class="text-blue-500 mb-4 text-sm font-bold rounded-lg border-2 border-blue-200 px-6 py-2">
                                    Ver candidatos
                                </a>
                            </div>
                    </div>
                </div>
                    @empty
                        <p class = "text-center text-gray-600">
                            No hay notificaciones nuevas
                        </p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
