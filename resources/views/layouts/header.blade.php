<!-- As a link -->
<header class="p-3 border-bottom bg-primary-custom">
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 me-3 text-dark text-decoration-none">
                <img src="{{asset('images/logo-salle.png')}}" alt="Logo la salle" width="30px" class="mr-2">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                @auth
                    @if(auth()->user()->tipo == 3)
                        <x-nav-link 
                            :href="route('students.edit', ['student'=>auth()->user()->clave])" 
                            :active="request()->routeIs('students.edit')"
                        >
                            Inicio
                        </x-nav-link>
                        {{-- <x-nav-link 
                            :href="route('students.edit', ['student'=>auth()->user()->codigo])" 
                            :active="request()->routeIs('students.edit')"
                        >
                            Notas
                        </x-nav-link> --}}
                        <x-nav-link 
                            :href="route('students.certs')" 
                            :active="request()->routeIs('students.certs')"
                        >
                            Certificados
                        </x-nav-link>
                    @endif
                @endauth
            </ul>

            <div class="text-end">
                @guest
                    {{-- <button type="button" class="btn btn-outline-primary me-2">Login</button> --}}
                    {{-- <button type="button" class="btn btn-primary-custom">Sign-up</button> --}}
                    {{-- <a href="{{ route('login.index') }}" class="btn btn-outline-primary me-2">Login</a> --}}
                @endguest
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <button type="submit" class="text-danger">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</header>