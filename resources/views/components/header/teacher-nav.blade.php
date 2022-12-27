<x-nav-link
    :href="route('teacher.index')"
    :active="request()->routeIs('teacher.index')"
    class="nav-link"
>
    Inicio
</x-nav-link>
<li class="nav-item dropdown">

    <x-nav-link
        href="#"
        :active="false"
        class="nav-link dropdown-toggle"
        role="button" 
        data-bs-toggle="dropdown"
    >
        Alumnos
    </x-nav-link>
    <ul class="dropdown-menu animate__animated animate__fadeIn">
        <li class="nav-item">
            <x-nav-link
                :href="route('teacher.search_students')"
                :active="request()->routeIs('teacher.search_students')"
                class="dropdown-item"
            >
                Buscar...
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                :href="route('teacher.create_student')"
                :active="request()->routeIs('teacher.create_student')"
                class="dropdown-item"

            >
                Registrar Nuevo
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                :href="route('teacher.registration')"
                :active="request()->routeIs('teacher.registration')"
                class="dropdown-item"

            >
                Matricula
            </x-nav-link>
        </li>
        {{-- <li>
            <hr class="dropdown-divider">
        </li> --}}
        {{-- <li>
            <x-nav-link
                :href="route('admins.licenses_plates')"
                :active="request()->routeIs('admins.licenses_plates')"
                class="dropdown-item"
            >
                Inscripciones por día
            </x-nav-link>
        </li> --}}
        {{-- <li>
            <x-nav-link
                :href="route('secretary.preregistrations')"
                :active="request()->routeIs('secretary.preregistrations')"
                class="dropdown-item"
            >
                Pre-inscripciones por día
            </x-nav-link>
        </li> --}}
    </ul>
</li>