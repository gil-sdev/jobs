<x-app-layout>
    <x-slot name="header">
        <h2 class="mt-2 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
                <div class="font-bold p-2 my-3 border border-green-700 bg-green-100 text-teal-600">
                    {{ session('mensaje') }}
                </div>
            @endif
            
        <livewire:mostrar-vacantes/>

        </div>
    </div>
</x-app-layout>
