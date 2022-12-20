<div class="bg-gray-100 py-10">
    <h2 class="text-2xl md:text-4xl text-gray-600 text-center font-extrabold my-5">
        Buscar 
    </h2>

    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent = 'datosForm'>
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label 
                        class="block mb-1 text-sm text-gray-700 text-normal font-semibold "
                        for="termino">Buscar
                    </label>
                    <input 
                        id="termino"
                        wire:model = 'termino'
                        type="text"
                        placeholder="promador"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                    />
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 font-semibold">Categoría</label>
                    <select 
                    id="categoria"
                    wire:model = 'categoria'
                    class="border-gray-300 p-2 w-full">
                        <option>--Seleccione--</option>
    
                        @foreach ($categorias as $categoria )
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 font-semibold">Salario Mensual</label>
                    <select 
                    id="salario"
                    wire:model = 'salario'
                    class="border-gray-300 p-2 w-full">
                        <option>-- Seleccione --</option>
                        @foreach ($salarios as $salario)
                            <option value="{{ $salario->id }}">{{$salario->salario}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <input 
                    type="submit"
                    class="bg-indigo-500 hover:bg-indigo-600 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                    value="Buscar"
                />
            </div>
        </form>
    </div>
</div>

