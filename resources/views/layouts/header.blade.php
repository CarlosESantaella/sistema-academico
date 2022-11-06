{{-- <!-- As a link -->
<header class="p-3 border-bottom bg-primary-custom">
    <nav class="navbar navbar-expand-lg navbar-dark" id="main_navbar">
        <div class=" w-100">
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
                            <x-nav-link 
                                :href="route('students.certs')" 
                                :active="request()->routeIs('students.certs')"
                            >
                                Certificados
                            </x-nav-link>
                        @elseif(auth()->user()->tipo == 0)
                        <x-nav-link
                            :href="route('admins.index')"
                            :active="request()->routeIs('admins.index')"
                        >
                            Inicio
                        </x-nav-link>
                        <x-nav-link
                            :href="route('admins.index')"
                            :active="null"
                            principalLink='alumnos'
                        >
                            Alumnos
                        </x-nav-link>
                        @endif
                    @endauth
                </ul>

                <div class="text-end ms-auto">
                    @guest
                        
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
    </nav>
</header> --}}

<nav class="navbar navbar-expand-lg navbar-dark btn-primary-custom " id="main_navbar">
    <div class="container-fluid">
    <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 me-3 text-dark text-decoration-none">
        <img src="{{asset('images/logo-salle.png')}}" alt="Logo la salle" width="50px" class="mr-2">
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @auth
            @if(auth()->user()->tipo == 3)
                <x-nav-link 
                    :href="route('students.edit', ['student'=>auth()->user()->clave])" 
                    :active="request()->routeIs('students.edit')"
                    class="nav-link"
                >
                    Inicio
                </x-nav-link>
                <x-nav-link 
                    :href="route('students.certs')" 
                    :active="request()->routeIs('students.certs')"
                    class="nav-link"
                >
                    Certificados
                </x-nav-link>
            @elseif(auth()->user()->tipo == 0)
                <x-header.admin-nav />
            @endif
        @endauth

        </ul>
        <div class="text-end ms-auto">
            @guest
                
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
  </nav>












  