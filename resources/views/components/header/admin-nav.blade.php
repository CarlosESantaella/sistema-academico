<x-nav-link
    :href="route('admins.index')"
    :active="request()->routeIs('admins.index')"
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
                :href="route('admins.search_students')"
                :active="request()->routeIs('admins.search_students')"
                class="dropdown-item"
            >
                Buscar...
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                :href="route('admins.create_student')"
                :active="request()->routeIs('admins.create_student')"
                class="dropdown-item"

            >
                Registrar Nuevo
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                :href="route('admins.registration')"
                :active="request()->routeIs('admins.registration')"
                class="dropdown-item"

            >
                Matricula
            </x-nav-link>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <x-nav-link
                :href="route('admins.licenses_plates')"
                :active="request()->routeIs('admins.licenses_plates')"
                class="dropdown-item"
            >
                Inscripciones por día
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                :href="route('admins.preregistrations')"
                :active="request()->routeIs('admins.preregistrations')"
                class="dropdown-item"
            >
                Pre-inscripciones por día
            </x-nav-link>
        </li>
    </ul>
</li>
<li class="nav-item dropdown">

    <x-nav-link
        href="#"
        :active="false"
        class="nav-link dropdown-toggle"
        role="button" 
        data-bs-toggle="dropdown"
    >
        Utilidades
    </x-nav-link>
    <ul class="dropdown-menu animate__animated animate__fadeIn">
        <li class="nav-item">
            <x-nav-link
                :href="route('admins.users')"
                :active="request()->routeIs('admins.users')"
                class="dropdown-item"
            >
                Usuarios
            </x-nav-link>
        </li>
        {{-- <li>
            <x-nav-link
                :href="route('admins.create_student')"
                :active="request()->routeIs('admins.create_student')"
                class="dropdown-item"

            >
                Registrar Nuevo
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                :href="route('admins.registration')"
                :active="request()->routeIs('admins.registration')"
                class="dropdown-item"

            >
                Matricula
            </x-nav-link>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <x-nav-link
                :href="route('admins.licenses_plates')"
                :active="request()->routeIs('admins.licenses_plates')"
                class="dropdown-item"
            >
                Inscripciones por día
            </x-nav-link>
        </li>
        <li>
            <x-nav-link
                :href="route('admins.preregistrations')"
                :active="request()->routeIs('admins.preregistrations')"
                class="dropdown-item"
            >
                Pre-inscripciones por día
            </x-nav-link>
        </li> --}}
    </ul>
</li>