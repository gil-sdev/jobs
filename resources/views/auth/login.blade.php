<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="items-center">
                <x-application-logo cases="w-20 h-20 fill-current text-gray-500 " />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex justify-between mt-5">
                    <x-link :href="Route('password.request')">
                        Recuperar contraseña
                    </x-link>

                    <x-link :href="Route('register')">
                        Registrarme
                    </x-link>
            </div>
            
            <x-primary-button class="w-full justify-center">
                {{-- La doble linea debajo indica que se puede traducir --}}
                {{ __('Ingresar') }}
            </x-primary-button>
        </form>
    </x-auth-card>
</x-guest-layout>
