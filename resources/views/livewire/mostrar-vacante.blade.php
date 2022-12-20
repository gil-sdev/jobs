<div class="p-10">
    <div class="mb-5">   
        <h2 class="font-bold text-3xl text-gray-800 my-3">
        {{ $vacante->titulo }}
    </h2>
        <div class="md:grid md:grid-cols-2 bg-gray-80 p-4 my-4">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Empresa: 
                <span class="normal-case font-normal">
                    {{ $vacante->empresa }}
                </span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Ultimo día para postularse: 
                <span class="normal-case font-normal">
                    {{ $vacante->ultimo_dia->toFormattedDateString() }}
                </span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Categoria: 
                <span class="normal-case font-normal">
                    {{ $vacante->categoria->categoria}}
                </span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">
                Salario: 
                <span class="normal-case font-normal">
                    {{ $vacante->salario->salario}}
                </span>
            </p>
        </div>
    </div>
    <div class="md:grid md:grid-cols-6">
        <div class="md:col-span-2">
            <img src="{{asset('storage/vacantesImg/'.$vacante->imagen)}}" alt="{{$vacante->titulo}}">
        </div>
        <div class="md:col-span-4">
        <h4 class="text-2xl font-bold mb-5"> Descripcion del puesto</h4>
        <p class="text-sm uppercase text-gray-800 my-3">
                {{ $vacante->descripcion}}
        </p>
        </div>
    </div>
    @guest
    <div class="mb-5 p-7 flex justify-center sm:grid  sm:grid-row-2 gap-2">
        <p class=" bg-red-500 border border-transparent rounded-md  text-white p-3 ">Para pustularse es necesario tener una cuenta!</p>
         <a href="{{ route('register') }}">  
        <button class="w-full justify-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ __('Registarme') }}
        </button>
         </a>
    </div>
    @endguest

    @auth
        {{-- directiva de permiso --}}
        @cannot('create', App\Models\Vacante::class)
            <livewire:postular-vacante :vacante="$vacante"/>
        @endcannot
    @endauth

</div>
