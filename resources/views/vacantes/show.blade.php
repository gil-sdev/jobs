<x-app-layout>
    <x-slot name="header">
        <h3 class="mt-2 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vacante: '.$vacante->titulo) }}
        </h3>
    </x-slot>

    <div class="py-12  sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <livewire:mostrar-vacante :vacante="$vacante"/>
        </div>
    </div>
</x-app-layout>
