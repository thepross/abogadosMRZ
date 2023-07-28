<x-guest-layout>
    <div class="card">
        <div class="card-header pb-0 text-center">
            <div class="m-4">
                <i class="fa fa-user fa-4x text-primary"></i>
            </div>
          <h4 class="font-weight-bolder">Sistema Abogados</h4>
          <h5 class="font-weight-bolder">Inicio de Sesión</h5>
          <p class="mb-0">Ingresa los siguientes datos para poder iniciar sesión en el sistema.</p>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('login') }}">
                @csrf
        
                <!-- Email Address -->
                <div class="mb-4">
                    <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" name="email" id="email" required>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <!-- Password -->
                <div class="mb-4">
                    <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" id="password" name="password"
                            required autocomplete="new-password" >
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <div class=" text-center mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            {{-- href="{{ route('password.request') }}"> --}} href="#">
                            {{ __('Olvidaste tu contraseña?') }}
                        </a>
                    @endif
        
                </div>
        
                <div class=" text-center mt-4 mb-2">
                    <button class="btn btn-primary btn-md w-50">
                        {{ __('Iniciar Sesión') }}
                    </button>
                    {{-- <x-primary-button class="btn btn-lg">
                    </x-primary-button> --}}
                </div>
            </form>

        </div>
      </div>
    
</x-guest-layout>

