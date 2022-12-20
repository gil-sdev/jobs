<x-app-layout>
    <x-slot name="header">
        <h2 class="mt-2 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modificar vacante: '.$vacante->titulo) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-4xl font-bold text-center mb-10"> </h1>
                    <div class="p-5 items-center">                
                            <livewire:editar-vacante :vacante="$vacante"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
