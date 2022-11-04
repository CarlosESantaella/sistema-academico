<!-- As a link -->
<header class="p-3 border-bottom bg-primary-custom">
    <div class="container-fluid">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                <img src="{{asset('images/logo-salle.png')}}" alt="Logo la salle" width="30px" class="mr-2">
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                @auth
                    @if(auth()->user()->tipo == 3)
                        <li><a href="#" class="nav-link px-2 text-dark">Inicio</a></li>
                        <li><a href="#" class="nav-link px-2 text-dark">Alumnos</a></li>
                        <li><a href="#" class="nav-link px-2 text-dark">Notas</a></li>
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

                        <button type="submit" class="text-primary">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</header>