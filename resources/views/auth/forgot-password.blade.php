<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('¿Olvidaste tu contraseña?, Coloque su correo y se le enviara un link de recuperación.') }}
        </div>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex justify-between mt-5">
                <x-link :href="Route('login')">
                    Ingresar
                </x-link>

                <x-link :href="Route('register')">
                    Registrarme
                </x-link>
              </div>
                <div class="w-full justify-center"">
                    <x-primary-button>
                        {{ __('Enviar correo') }}
                    </x-primary-button>
                </div>
            </form>
    </x-auth-card>
</x-guest-layout>
