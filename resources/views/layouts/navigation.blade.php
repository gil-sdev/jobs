<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex justify-center">
                    <a href="{{ route('vacantes.index') }}">
                        <x-application-logo cases='w-10'/>
                    </a>
                </div>


                @auth           
                    <!-- Navigation Links -->
                   

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('vacantes.index')">
                            {{ __('Vacantes') }}                       
                        </x-nav-link>
                @can('create', App\Models\Vacante::class)
                        <x-nav-link :href="route('vacantes.create')">
                            {{ __('Crear nueva vacante') }}                       
                        </x-nav-link>

                            <x-nav-link :href="route('notificaciones')">
                                {{ __('Notificaciones') }} 
                                @php
                                    $numNotficaciones = 0;
                                    $numNotficaciones = Auth::user()->unreadNotifications->count();
                                @endphp
                                    @if ($numNotficaciones > 0)
                                    <span class=" top-0 right-2 bottom-auto 
                                            left-auto translate-x-2/4 -translate-y-1/2 rotate-0 skew-x-0
                                            skew-y-0 scale-x-100 scale-y-100 py-1 px-1.5 text-xs leading-none 
                                            text-center whitespace-nowrap align-baseline font-bold bg-red-600
                                                text-white rounded-full z-10">
                                            {{ $numNotficaciones }}
                                    </span>
                                    @endif
                         </x-nav-link>        
                        @endcan
                    </div>
                @endauth   

            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">

                @auth   
            
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Mi perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </x-dropdown-link>
                        </form>

                    </x-slot>
                </x-dropdown>
                @endauth
                @guest    
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Ingresar') }}                       
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Registrar') }}                       
                    </x-nav-link>
                </div>
                @endguest    
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
      
        @auth

            <div class="pt-5 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('vacantes.index')" :active="request()->routeIs('vacantes.index')">
                    {{ __('Vacantes') }}
                </x-responsive-nav-link>
            </div>

            @can('create', App\Models\Vacante::class)

            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('vacantes.create')" :active="request()->routeIs('vacantes.create')">
                    {{ __('Crear nueva vacante') }}
                </x-responsive-nav-link>
            </div>
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('notificaciones')" :active="request()->routeIs('notificaciones')">
                        {{ __('Notificaciones') }} 

                            @if ($numNotficaciones > 0)
                                <span class=" top-0 right-0 bottom-auto 
                                        left-auto translate-x-2/4 -translate-y-1/2 rotate-0 skew-x-0
                                        skew-y-0 scale-x-100 scale-y-100 py-1 px-1.5 text-xs leading-none 
                                        text-center whitespace-nowrap align-baseline font-bold bg-red-600
                                            text-white rounded-full z-10">
                                        {{ $numNotficaciones }}
                                </span>
                            @endif
                    </x-responsive-nav-link>
                </div>        
           @endcan
            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Mi perfil') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>              
        @endauth

    @guest
    <div class="space-y-1">
        <div class="mt-2 pt-2 pb-2 ">
            <x-responsive-nav-link :href="route('login')">
                {{ __('Ingresar') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-2 pb-2">
            <x-responsive-nav-link :href="route('register')">
                {{ __('Registarme') }}
            </x-responsive-nav-link>
        </div>
    </div>
    @endguest
    
    </div>
</nav>
