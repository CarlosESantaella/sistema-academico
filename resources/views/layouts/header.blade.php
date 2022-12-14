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
                <x-header.student-nav />
            @elseif(auth()->user()->tipo == 2)
                <x-header.sec-nav />
            @elseif(auth()->user()->tipo == 1)
                <x-header.teacher-nav />
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












  