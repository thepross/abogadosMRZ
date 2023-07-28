<x-guest-layout>
    <div class="card">
        <div class="card-header pb-0 text-center">
            <div class="m-4">
                <i class="fa fa-user fa-4x text-primary"></i>
            </div>
          <h4 class="font-weight-bolder">Sistema Abogados</h4>
          <h5 class="font-weight-bolder">Registro</h5>
          <p class="mb-0">Ingresa los siguientes datos para poder registrarte en el sistema.</p>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div class="mb-3">
                    {{-- <x-input-label for="name" :value="__('Nombre')" /> --}}
                    <input type="text" class="form-control form-control-lg" placeholder="Nombre" aria-label="Nombre" id="name" name="name" :value="old('name')" required>
                    {{-- <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" /> --}}
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!-- Email Address -->
                <div class="mb-3">
                    {{-- <x-input-label for="email" :value="__('Correo')" /> --}}
                    <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" name="email" id="email" required>
                    {{-- <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" /> --}}
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <!-- Password -->
                <div class="mb-3">
                    {{-- <x-input-label for="password" :value="__('Contraseña')" /> --}}
        
                    <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" id="password" name="password"
                    required autocomplete="new-password" >
                    {{-- <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" /> --}}
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <!-- Confirm Password -->
                <div class="mb-3">
                    {{-- <x-input-label for="password_confirmation" :value="__('Confirma tu contraseña')" /> --}}
                    <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" >
                    {{-- <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" /> --}}
        
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
        
    
                <div class="text-center">
                    <button class="btn btn-primary btn-md w-50">
                        {{ __('Registrarse') }}
                    </button>
                  </div>
        
        
            </form>

        </div>
        <div class="card-footer text-center pt-0 px-lg-2 px-1">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Ya estas registrado?') }}
            </a>
            {{-- <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button> --}}
          
        </div>
        
      </div>
    

    
</x-guest-layout>
